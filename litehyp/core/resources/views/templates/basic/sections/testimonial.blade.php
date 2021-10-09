@php
    $testimonial = getContent('testimonial.content', true);
    $testimonials = getContent('testimonial.element');
@endphp

  <!-- testimonial section start -->
    <section class="pt-50 pb-50">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-header text-center">
                <h2 class="section-title">{{ __(@$testimonial->data_values->heading) }}</h2>
                <p class="mt-3">{{ __(@$testimonial->data_values->sub_heading) }}</p>
              </div>
            </div>
          </div><!-- row end -->
          <div class="testimonial-slider">

            @foreach($testimonials as $singleData)
                <div class="single-slide">
                    <div class="testimonial-item rounded-3">
                        <div class="ratings">

                        @for($i = 0; $i < $singleData->data_values->number_of_star; $i++)
                            <i class="las la-star"></i>
                        @endfor

                        </div>
                        <p class="text-white mt-2">{{ __($singleData->data_values->say) }}</p>
                        <div class="client-details d-flex align-items-center mt-4">
                        <div class="thumb">
                            <img src="{{ getImage( 'assets/images/frontend/testimonial/' .@$singleData->data_values->image, '300x250') }}" alt="image">
                        </div>
                        <div class="content">
                            <h4 class="name text-white">{{ __($singleData->data_values->name) }}</h4>
                            <span class="designation text-white-50 fs--14px">
                                {{ __($singleData->data_values->designation) }}
                            </span>
                        </div>
                        </div>
                    </div><!-- testimonial-item end -->
                </div><!-- single-slide end -->
            @endforeach

          </div><!-- testimonial-slider end -->
        </div>
      </section>
      <!-- testimonial section end -->
