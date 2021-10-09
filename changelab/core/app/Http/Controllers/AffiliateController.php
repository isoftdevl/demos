<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AffiliateController extends Controller
{
    public function affiliate()
    {
        $page_title = "Affilaite";

        return view(activeTemplate().'user.affiliate.affiliate',compact('page_title'));
    }


    public function affiliateSend(Request $request)
    {
        $request->validate([
            'reffer_link' => 'required',
            'email' => 'required|email',
        ]);

        if(auth()->user()->email == $request->email){
            $notify[] = ['error', 'You can not reffer yourself'];
            return back()->withNotify($notify)->withInput();
        }

        $user = [
            'email' => $request->email,
            'username' => auth()->user()->username,
        ];

        $user = json_decode(json_encode($user),false);

        

        notify($user, 'REFFERAL_LINK',[
            'username' => $user->username,
            'link' => $request->reffer_link
        ]);


        $notify[] = ['success', 'successfully send email to ' . $user->email];
        return back()->withNotify($notify)->withInput();
        
    }


}
