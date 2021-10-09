<?php

namespace App\Http\Controllers;

use App\Lib\GoogleAuthenticator;
use App\Models\CommissionLog;
use App\Models\Currency;
use App\Models\Deposit;
use App\Models\Exchange;
use App\Models\GatewayCurrency;
use App\Models\GeneralSetting;
use App\Models\Transaction;
use App\Models\User;
use App\Models\Withdrawal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;
use Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->activeTemplate = activeTemplate();
    }
    public function home()
    {
        $data['pending_exchange_count'] = Exchange::where('user_id', auth()->user()->id)->where('status', 0)->count();
        $data['accpted_exchange_count'] = Exchange::where('user_id', auth()->user()->id)->where('status', 1)->count();
        $data['refunded_exchange'] = Exchange::where('user_id', auth()->user()->id)->where('status', 3)->latest()->get();
        $data['current_balance'] = User::find(auth()->user()->id);
        $data['total_transaction'] = Exchange::where('user_id', auth()->user()->id)->where('status', 2)->count();
        $data['refferal_bonus'] = CommissionLog::where('user_id', auth()->user()->id)->sum('amount');
        $data['refferal_commissions'] = CommissionLog::where('user_id', auth()->user()->id)->get();
        $data['page_title'] = "Dashboard";
        $data['empty_message'] = "No Transaction Has Made Yet";
        return view($this->activeTemplate . 'user.dashboard', $data);
    }

    public function profile()
    {
        $data['page_title'] = "Profile Setting";
        $data['user'] = Auth::user();
        return view($this->activeTemplate. 'user.profile-setting', $data);
    }

    public function submitProfile(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:50',
            'lastname' => 'required|string|max:50',
            'address' => "sometimes|required|max:80",
            'state' => 'sometimes|required|max:80',
            'zip' => 'sometimes|required|max:40',
            'city' => 'sometimes|required|max:50',
            'image' => 'mimes:png,jpg,jpeg'
        ],[
            'firstname.required'=>'First Name Field is required',
            'lastname.required'=>'Last Name Field is required'
        ]);


        $in['firstname'] = $request->firstname;
        $in['lastname'] = $request->lastname;

        $in['address'] = [
            'address' => $request->address,
            'state' => $request->state,
            'zip' => $request->zip,
            'country' => $request->country,
            'city' => $request->city,
        ];

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '_' . $user->username . '.jpg';
            $location = 'assets/images/user/profile/' . $filename;
            $in['image'] = $filename;

            $path = './assets/images/user/profile/';
            $link = $path . $user->image;
            if (file_exists($link)) {
                @unlink($link);
            }
            $size = imagePath()['profile']['user']['size'];
            $image = Image::make($image);
            $size = explode('x', strtolower($size));
            $image->resize($size[0], $size[1]);
            $image->save($location);
        }
        $user->fill($in)->save();
        $notify[] = ['success', 'Profile Updated successfully.'];
        return back()->withNotify($notify);
    }

    public function changePassword()
    {
        $data['page_title'] = "CHANGE PASSWORD";
        return view($this->activeTemplate . 'user.password', $data);
    }

    public function submitPassword(Request $request)
    {

        $this->validate($request, [
            'current_password' => 'required',
            'password' => 'required|min:5|confirmed'
        ]);
        try {
            $user = auth()->user();
            if (Hash::check($request->current_password, $user->password)) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
                $notify[] = ['success', 'Password Changes successfully.'];
                return back()->withNotify($notify);
            } else {
                $notify[] = ['error', 'Current password not match.'];
                return back()->withNotify($notify);
            }
        } catch (\PDOException $e) {
            $notify[] = ['error', $e->getMessage()];
            return back()->withNotify($notify);
        }
    }

    /*
     * Deposit History
     */
    public function depositHistory()
    {
        $page_title = 'Deposit History';
        $empty_message = 'No history found.';
        $logs = auth()->user()->deposits()->with(['gateway'])->latest()->paginate(getPaginate());
        return view($this->activeTemplate . 'user.deposit_history', compact('page_title', 'empty_message', 'logs'));
    }

    /*
     * Withdraw Operation
     */

    public function show2faForm()
    {
        $gnl = GeneralSetting::first();
        $ga = new GoogleAuthenticator();
        $user = auth()->user();
        $secret = $ga->createSecret();
        $qrCodeUrl = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $secret);
        $prevcode = $user->tsc;
        $prevqr = $ga->getQRCodeGoogleUrl($user->username . '@' . $gnl->sitename, $prevcode);
        $page_title = 'Two Factor';
        return view($this->activeTemplate.'user.twofactor', compact('page_title', 'secret', 'qrCodeUrl', 'prevcode', 'prevqr'));
    }

    public function create2fa(Request $request)
    {
        $user = auth()->user();
        $this->validate($request, [
            'key' => 'required',
            'code' => 'required',
        ]);

        $ga = new GoogleAuthenticator();
        $secret = $request->key;
        $oneCode = $ga->getCode($secret);

        if ($oneCode === $request->code) {
            $user->tsc = $request->key;
            $user->ts = 1;
            $user->tv = 1;
            $user->save();


            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_ENABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);


            $notify[] = ['success', 'Google Authenticator Enabled Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->withNotify($notify);
        }
    }


    public function disable2fa(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
        ]);

        $user = auth()->user();
        $ga = new GoogleAuthenticator();

        $secret = $user->tsc;
        $oneCode = $ga->getCode($secret);
        $userCode = $request->code;

        if ($oneCode == $userCode) {

            $user->tsc = null;
            $user->ts = 0;
            $user->tv = 1;
            $user->save();


            $userAgent = getIpInfo();
            $osBrowser = osBrowser();
            notify($user, '2FA_DISABLE', [
                'operating_system' => @$osBrowser['os_platform'],
                'browser' => @$osBrowser['browser'],
                'ip' => @$userAgent['ip'],
                'time' => @$userAgent['time']
            ]);


            $notify[] = ['success', 'Two Factor Authenticator Disable Successfully'];
            return back()->withNotify($notify);
        } else {
            $notify[] = ['error', 'Wrong Verification Code'];
            return back()->with($notify);
        }
    }



    public function exchange(Request $request)
    {
        session()->forget('Track');

        $receive = Currency::find($request->receive);
        $send = Currency::find($request->send);

       

        if ($receive == null) {
            $notify[] = ['error', 'Select any method that we send u the money'];
            return back()->withNotify($notify);
        }

        if ($send == null) {
            $notify[] = ['error', 'Select any method that we get money'];
            return back()->withNotify($notify);
        }

        $field = json_decode($receive->user_input);

        $validate_array = [
            'send' => 'required|numeric',
            'send_amount' => 'required|numeric|gt:0',
            'receive' => 'required|numeric',
            'receive_amount' => 'required|numeric|gt:0',

        ];
        foreach ($field as $value) {
            if (strtolower($value->type) === 'email') {
                $validate_array[$value->field_name] = "sometimes|{$value->validation}|email";
                continue;
            }

            $validate_array[$value->field_name] = "sometimes|{$value->validation}";
        }

        $this->validate($request, $validate_array);


        // new Calculation for covert amount 

        $percentCharge = ($request->send_amount * $send->percent_charge) / 100;

        $totalCharge = $percentCharge + $send->fixed_charge;

        $totalSendAmount = $request->send_amount - $totalCharge;

        $sendAmountConvertInBaseCurrency =  $totalSendAmount * $send->buy_at;

        $userReceiveAmount = $sendAmountConvertInBaseCurrency / $receive->sell_at;


        $reserve = $receive->reserve;
        $exchange_id = md5(getTrx());

        if ($request->send_amount < $send->min_exchange) {
            $notify[] = ['error', 'Min exchange for this currency ' . $send->min_exchange];
            return back()->withNotify($notify);
        }

        if ($request->send_amount > $send->max_exchange) {
            $notify[] = ['error', 'Max exchange for this currency ' . $send->max_exchange];
            return back()->withNotify($notify);
        }



        if ($userReceiveAmount > $reserve) {
            $notify[] = ['error', 'Reserve Limit Exceed'];
            return back()->withNotify($notify);
        }


        $exchange = Exchange::create([
            'user_id' => auth()->id() ?? null,
            'payment_from' => $request->send,
            'get_amount' => $request->send_amount,
            'buy_rate' => $send->buy_at,
            'payment_to' => $request->receive,
            'send_amount' => $userReceiveAmount,
            'sell_rate' => $receive->sell_at,
            'charge' => $totalCharge,
            'exchange_id' => $exchange_id
        ]);

        session()->put('Track', $exchange->exchange_id);


        return redirect()->route('user.exchange.preview');
    }

    public function exchangepreview()
    {

        $page_title = 'Exchange Preview';

        if (!session()->has('Track')) {
            return redirect()->route('home');
        }

        $data = Exchange::where('exchange_id', session('Track'))->first();

        $userSendData = Currency::findOrFail($data->payment_from);

        $userReceiveData = Currency::findOrFail($data->payment_to);

        return view($this->activeTemplate . 'user.exchange.exchangepreview', compact('page_title', 'userSendData', 'userReceiveData', 'data'));
    }

    public function exchangeConfirm(Request $request)
    {

        $trnx = session('Track');

        $exchange = Exchange::where('exchange_id', $trnx)->first();

        $flag = 1; //autometic payment



        $cur_sym = $exchange->payment_from_getway->cur_sym;

        try {

            $code = $exchange->payment_from_getway->gateway_currency->code;

            $availableGateway = GatewayCurrency::where('method_code', $code)->where('currency', $cur_sym)->first();
        } catch (\Throwable $th) {
            $flag = 0;
        }


        if ($exchange->payment_from_getway->payment_type_buy > 0 && $availableGateway != null && $flag == 1) {


            $validate = [];

            foreach (json_decode($exchange->payment_to_getway->user_input) as $input) {

                $inputField = str_replace(' ', '_', strtolower($input->field_name));

                if ($input->type == 'email') {
                    $validate[$inputField] = "{$input->validation}|email";
                    $exchange->email = request($inputField);
                }

                if ($input->type == 'text') {
                    $validate[$inputField] = "{$input->validation}|max:500";
                    $exchange->wallet_id = request($inputField);
                }
            }

            $this->validate($request, $validate);

            $depo['user_id'] = auth()->user()->id;
            $depo['exchange_id'] = $exchange->id;
            $depo['method_code'] = $exchange->payment_from_getway->gateway_currency->code;
            $depo['method_currency'] = strtoupper($exchange->payment_from_getway->cur_sym);
            $depo['amount'] = $exchange->get_amount;
            $depo['charge'] = $exchange->charge;
            $depo['rate'] = $exchange->buy_rate;
            $depo['final_amo'] = getAmount($exchange->get_amount);
            $depo['send_currency'] = $exchange->payment_to_getway->cur_sym;
            $depo['btc_amo'] = 0;
            $depo['btc_wallet'] = "";
            $depo['trx'] = $exchange->exchange_id;
            $depo['try'] = 0;
            $depo['status'] = 0;
            $data = Deposit::create($depo);

            $exchange->deposit_id = $data->id;
            $exchange->save();
            session()->put('Track', $data['trx']);

            return redirect()->route('user.deposit.confirm');
        }

        if ($exchange->payment_from_getway->payment_type_buy == 0 || $availableGateway == null || $flag == 0) {

            $validate = [];

            foreach (json_decode($exchange->payment_to_getway->user_input) as $input) {

                $inputField = str_replace(' ', '_', strtolower($input->field_name));

                if ($input->type == 'email') {
                    $validate[$inputField] = "{$input->validation}|email";
                    $exchange->email = request($inputField);
                }

                if ($input->type == 'text') {
                    $validate[$inputField] = "{$input->validation}|max:500";
                    $exchange->wallet_id = request($inputField);
                }
            }


            $this->validate($request, $validate);

            $exchange->save();

            return redirect()->route('user.exchange.trnx');
        }
    }

    public function transactionConfirmByTrx()
    {

        $page_title = 'transaction';

        $data = session('Track');

        $exchange = Exchange::where('exchange_id', $data)->first();

        if (!$exchange) {
            $notify[] = ['error', 'Please make a new Transaction'];
            return redirect()->route('home')->withNotify($notify);
        }


        $currency = $exchange->payment_from_getway;


        return view($this->activeTemplate . 'user.exchange.transaction', compact('page_title', 'exchange', 'currency'));
    }

    public function transactionConfirmByTrxAdd(Request $request)
    {

        $trnx = session('Track');

        $exchange = Exchange::where('exchange_id', $trnx)->first();


        $validate = [];
        $user_proof_details = [];

        foreach (json_decode($exchange->payment_from_getway->user_proof) as $proof) {

            $inputField = str_replace(' ', '_', strtolower($proof->field_name));

            if ($proof->type == 'text') {
                $validate[$inputField] = "{$proof->validation}|max:500";
                $user_proof_details[$inputField] = request($inputField);
            }

            if ($proof->type == 'file') {
                $validate[$inputField] = "{$proof->validation}|image|mimes:jpg,png,jpeg";
                $user_proof_details[$inputField] = request($inputField);
                $image = $inputField;
            }

            if ($proof->type == 'textarea') {
                $validate[$inputField] = "{$proof->validation}|max:500";
                $user_proof_details[$inputField] = request($inputField);
            }
        }


        $this->validate($request, $validate);



        $path = imagePath()['exchange']['path'];
        $size = imagePath()['exchange']['size'];
        $data = $user_proof_details;

        if (isset($image)) {
            if ($request->hasFile($image)) {
                try {
                    $filename = uploadImage($user_proof_details[$image], $path, $size);
                    unset($user_proof_details[$image]);
                    $data = array_merge($user_proof_details, ['img_' . $image => $filename]);
                } catch (\Exception $exp) {
                    $notify[] = ['errors', 'Image could not be uploaded.'];
                    return back()->withNotify($notify);
                }
            }
        }



        $exchange->user_proof = json_encode($data);
        $exchange->save();


        $transaction = new Transaction();
        $transaction->user_id = $exchange->user_id;
        $transaction->amount = getAmount($exchange->get_amount);
        $transaction->post_balance = 0;
        $transaction->charge = getAmount($exchange->charge);
        $transaction->trx_type = 'send';
        $transaction->details = 'send ' . getAmount($exchange->get_amount) . ' by ' . $exchange->payment_from_getway->name;
        $transaction->trx =  $exchange->exchange_id;
        $transaction->save();


        $notify[] = ['success', 'Admin Will review your request'];
        return redirect()->route('user.transaction.success')->withNotify($notify);
    }

    public function transactionSuccess()
    {


        $page_title = 'Success Transaction';
        if (!session()->has('Track')) {
            $notify[] = ['error', 'Please make the Transaction First'];
            return redirect()->route('home')->withNotify($notify);
        }

        $exchange = Exchange::where('exchange_id', session('Track'))->first();

        session()->forget('Track');

        return view(activeTemplate() . 'user.exchange.successfull', compact('page_title', 'exchange'));
    }


    public function ajaxCode(Request $request)
    {
        $gateway = GatewayCurrency::where('method_code', $request->data)->first();

        if ($gateway) {
            return response()->json(['status' => 'success']);
        }

        return response()->json(['error' => 'error']);
    }


    public function cancledExchange()
    {
        $page_title = 'Cancled Exchange';
        $empty_message = 'No Exchange Cancled';
        $exchanges =  Exchange::where('user_id', auth()->id())->where('status', 2)->paginate(getPaginate());

        return view(activeTemplate() . 'user.exchange.cancled', compact('page_title', 'empty_message', 'exchanges'));
    }

    public function pendingExchange()
    {
        $page_title = 'Pending Exchange';
        $empty_message = 'No Exchange Pending';
        $exchanges =  Exchange::where('user_id', auth()->id())->where('status', 0)->paginate(getPaginate());

        return view(activeTemplate() . 'user.exchange.pending', compact('page_title', 'empty_message', 'exchanges'));
    }

    public function exchangeDetails(Exchange $exchange)
    {
        $page_title = 'Exchange Details';

        return view(activeTemplate() . 'user.exchange.details', compact('page_title', 'exchange'));
    }

    public function approvedExchange()
    {
        $page_title = 'Approved Exchange';
        $empty_message = 'No Exchange Approved';
        $exchanges =  Exchange::where('user_id', auth()->id())->where('status', 1)->paginate(getPaginate());

        return view(activeTemplate() . 'user.exchange.approved', compact('page_title', 'empty_message', 'exchanges'));
    }

    public function refundedExchange()
    {
        $page_title = 'Refunded Exchange';
        $empty_message = 'No Exchange Refunded';
        $exchanges =  Exchange::where('user_id', auth()->id())->where('status', 3)->paginate(getPaginate());

        return view(activeTemplate() . 'user.exchange.refunded', compact('page_title', 'empty_message', 'exchanges'));
    }


    public function withdrawForm()
    {
        $page_title = 'Withdraw Balance';
        $currencys = Currency::where('available_for_buy', 1)->get();

        return view(activeTemplate() . 'user.withdraw.methods', compact('page_title', 'currencys'));
    }

    public function withdrawAjax(Request $request)
    {
        $currency = Currency::findOrFail($request->currency);

        $exchange['min'] = $currency->min_exchange * $currency->buy_at;
        $exchange['max'] = $currency->max_exchange * $currency->buy_at;
        $exchange['user_input'] = json_decode($currency->user_input);
        $exchange['status'] = $currency->payment_type_buy;
        $exchange['cur_sym'] = $currency->cur_sym;

        return $exchange;
    }

    public function withdrawAjaxInput(Request $request)
    {
        $inputValue =  $request->inputValue;

        $optionValue = Currency::findOrFail($request->option);

        $returnValue = $inputValue / $optionValue->sell_at;

        $charge = $optionValue->fixed_charge + (($returnValue * $optionValue->percent_charge) / 100);

        $returnValue -= $charge;

        return $returnValue;
    }

    public function withdrawFormSubmit(Request $request)
    {
        $request->validate([
            'currency' => 'required|numeric|exists:currencies,id',
            'send' => 'required|numeric',
            'get_amount' => 'required|numeric',
            'wallet_info' => 'required'
        ]);

        $general = GeneralSetting::first();
        $currency = Currency::findOrFail($request->currency);


        if ($request->send > auth()->user()->balance) {
            $notify[] = ['error', 'You have not enough balance'];
            return redirect()->back()->withNotify($notify);
        }
        if ($request->send < ($currency->min_exchange * $currency->buy_at)) {
            $notify[] = ['error', 'Please send At least Minimum Amount'];
            return redirect()->back()->withNotify($notify);
        }

        if ($request->get_amount > $currency->max_exchange * $currency->buy_at) {
            $notify[] = ['error', 'Maximum Amount limit Reached'];
            return redirect()->back()->withNotify($notify);
        }

        $trx = getTrx();

        $returnValue = $request->send / $currency->buy_at;

        $charge = $currency->fixed_charge + (($returnValue * $currency->percent_charge) / 100);

        $finalAmount = $returnValue -  $charge;

        $wallet = $request->wallet_info;

        $withdraw = Withdrawal::create([
            'method_id' => $currency->id,
            'user_id' => auth()->user()->id,
            'get_amount' => $request->send,
            'get_currency' => $general->cur_sym,
            'send_amount' => $returnValue,
            'send_currency' => $currency->cur_sym,
            'rate' => $currency->buy_at,
            'charge' => $charge,
            'trx' => $trx,
            'final_amount' => $finalAmount,
            'withdraw_information' => $wallet,
            'status' => 2,

        ]);

        $user = User::findOrFail($withdraw->user_id);
        $user->balance = $user->balance - $withdraw->get_amount;
        $user->save();

        $transaction = new Transaction();
        $transaction->user_id = $withdraw->user_id;
        $transaction->amount = $withdraw->get_amount;
        $transaction->post_balance = getAmount($user->balance);
        $transaction->charge = $charge;
        $transaction->trx_type = 'Withdraw Amount';
        $transaction->details = 'send' . getAmount($withdraw->send_amount) . ' ' . $withdraw->send_currency;
        $transaction->trx = $withdraw->trx;
        $transaction->save();


        notify($user, 'WITHDRAW_REQUEST', [
            'method_name' => $withdraw->method->name,
            'method_currency' => $withdraw->send_currency,
            'method_amount' => getAmount($withdraw->final_amount),
            'amount' => getAmount($withdraw->get_amount),
            'charge' => getAmount($withdraw->charge),
            'currency' => $withdraw->get_currency,
            'rate' => getAmount($withdraw->rate),
            'trx' => $withdraw->trx,
            'post_balance' => getAmount($user->balance),
        ]);




        session()->put('withdraw_trx', $withdraw->trx);
        $notify[] = ['success', 'Please Wait Admin will review your request'];
        return redirect()->route('user.withdraw.preview')->withNotify($notify);
    }

    public function withdrawPreview(Request $request)
    {
        if (!session()->has('withdraw_trx')) {
            $notify[] = ['error', 'Please make withdraw first'];
            return redirect()->route('user.withdraw')->withNotify($notify);
        }

        $page_title = 'Withdraw Preview';
        $withdraw = Withdrawal::where('trx', session('withdraw_trx'))->first();

        session()->forget('withdraw_trx');
        return view(activeTemplate() . 'user.withdraw.preview', compact('page_title', 'withdraw'));
    }

    public function withdrawLog()
    {
        $page_title = 'Withdraw Log';
        $withdraws = Withdrawal::where('user_id', auth()->user()->id)->latest()->paginate(getPaginate());
        $empty_message = 'No withdraw Made Yet';
        return view(activeTemplate() . 'user.withdraw.log', compact('page_title', 'withdraws', 'empty_message'));
    }

    public function refferLog()
    {
        $page_title = 'Refferal Commission';
        $empty_message = 'No Refferal Commission';
        $commission =  CommissionLog::where('user_id', auth()->id())->latest()->paginate(getPaginate());

        return view(activeTemplate() . 'user.affiliate.log', compact('page_title', 'empty_message', 'commission'));
    }


}
