@php
    $feature = getContent('feature.content', true);
    $features = getContent('feature.element');
@endphp

 <!-- feature section start -->
    <section class="pt-100 pb-100 section--bg border-top border-bottom" id="feature">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="section-header">
                <h2 class="section-title">{{ __(@$feature->data_values->heading) }}</h2>
              </div>
            </div>
          </div><!-- row end -->
          <div class="row justify-content-center gy-4">
            @foreach($features as $singleFeature)
                <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                    <div class="feature-card rounded-3">
                        <div class="feature-card__icon text--base text-shadow--base">
                            @php echo $singleFeature->data_values->icon; @endphp
                        </div>
                        <div class="feature-card__content mt-4">
                            <h3 class="title">{{ __(@$singleFeature->data_values->title) }}</h3>
                        <p class="mt-3">{{ __(@$singleFeature->data_values->text) }}</p>
                        </div>
                    </div><!-- feature-card end -->
                </div>
            @endforeach

          </div>
        </div>
      </section>
      <!-- feature section end -->
