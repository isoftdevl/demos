@php
    $tppInvestor = getContent('topInvestor.content', true);
    $tppInvestors = getContent('topInvestor.element');
@endphp


<!-- latest member section start -->
    <section class="pt-50 pb-50">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="section-header">
                <h2 class="section-title">{{ __(@$tppInvestor->data_values->heading) }}</h2>
              </div>
            </div>
          </div><!-- row end -->
          <div class="row justify-content-center gy-4">

            @foreach($tppInvestors as $singleInvestor)
                <div class="col-xl-3 col-lg-4 col-sm-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                <div class="member-card rounded-3">
                    <div class="member-card__thumb">
                        <img src="{{ getImage( 'assets/images/frontend/topInvestor/' .@$singleInvestor->data_values->image, '300x250') }}" alt="image">
                    </div>
                    <div class="member-card__content">
                        <h5 class="name">{{ __($singleInvestor->data_values->name) }}</h5>
                        <p class="fs--14px text--base mt-1">{{ __($singleInvestor->data_values->country) }}</p>
                        <p class="fs--14px text-white-50 mt-1">{{ $singleInvestor->data_values->date }}</p>
                    </div>
                </div><!-- member-card end -->
                </div>
            @endforeach

          </div>
        </div>
      </section>
      <!-- latest member section end -->
