@php
    $about = getContent('about.content', true);
    $aboutDatas = getContent('about.element');
@endphp
  <!-- about section start -->
    <section class="pt-50 pb-100 border-bottom about-section" id="about">
        <div class="wave-1"><img src="{{ asset($activeTemplateTrue. 'images/bg/wave.svg') }}" alt="image"></div>
        <div class="wave-2"><img src="{{ asset($activeTemplateTrue. 'images/bg/wave2.svg') }}" alt="image"></div>
        <div class="container">
          <div class="row align-items-center">
            <div class="col-lg-6">
              <div class="section-header">
                <div class="section-top-title text--base">@lang('Welcome') {{ __($general->sitename) }}</div>
                <h2 class="section-title">{{ __(@$about->data_values->heading) }}</h2>
                <p>{{ __(@$about->data_values->sub_heading) }}</p>
              </div>
              <div class="row gy-4">
                @foreach($aboutDatas as $aboutData)
                    <div class="col-xl-8 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                        <div class="info-card">
                            <div class="info-card__icon">
                                @php echo $aboutData->data_values->icon; @endphp
                            </div>
                            <div class="info-card__content">
                                <h3 class="title">{{ __($aboutData->data_values->title) }}</h3>
                            <p class="mt-2">{{ __($aboutData->data_values->text) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
              </div>
            </div>
            <div class="col-lg-6 d-lg-block d-none">
              <div class="about-thumb">
                <img src="{{ getImage('assets/images/frontend/about/' .@$about->data_values->image, '635x560') }}" alt="About-Image">
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- about section end -->
