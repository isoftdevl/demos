@php
    $payment = getContent('payment.content', true);
    $paymentDatas = getContent('payment.element');
    $allPayment = App\Models\Gateway::where('status', 1)->get();
@endphp

 <!-- payment brand section start -->
    <section class="pt-50 pb-100" id="gateway">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <div class="section-header">
                <div class="section-top-title">@lang('Payment Gateway')</div>
                <h2 class="section-title">{{ __($payment->data_values->heading) }}</h2>
                <p class="mt-3">{{ __($payment->data_values->sub_heading) }}</p>
              </div>
            </div>
          </div><!-- row end -->
          <div class="row justify-content-center">
            <div class="col-lg-8">
              <div class="payment-slider">

                @foreach($allPayment as $singleValue)
                    <div class="single-slide">
                        <div class="brand-item">
                            <img src="{{ getImage(imagePath()['gateway']['path'].'/'. $singleValue->image,imagePath()['gateway']['size']) }}" alt="image">
                        </div><!-- brand-item end -->
                    </div>
                @endforeach

              </div><!-- payment-slider end -->
            </div>

          </div><!-- row end -->

          <div class="row justify-content-center mt-5">
            <div class="col-lg-12 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.3s">
              <div class="subscribe-wrapper bg_img" data-background="assets/images/bg/bg-5.jpg">
                <div class="row align-items-center">

                @foreach($paymentDatas as $singleRow)
                  <div class="col-lg-3 counter-item">
                    <h4 class="counter-item__number text--base">{{ __($singleRow->data_values->text) }}</h4>
                    <p class="caption">{{ __($singleRow->data_values->title) }}</p>
                  </div>
                @endforeach

                </div>
              </div><!-- subscribe-wrapper end -->
            </div>
          </div>
        </div>
      </section>
      <!-- payment brand section end -->
