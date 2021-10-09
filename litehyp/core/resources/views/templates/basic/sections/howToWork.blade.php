@php
    $work = getContent('howToWork.content', true);
    $works = getContent('howToWork.element', false, null, true);
@endphp

<!-- how work section start -->
    <section class="pt-100 pb-100 border-top section--bg">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-header text-center">
                <h2 class="section-title">{{ __(@$work->data_values->heading) }}</h2>
                <p class="mt-3">{{ __(@$work->data_values->sub_heading) }}</p>
              </div>
            </div>
          </div><!-- row end -->
          <div class="row gy-4">
            @foreach($works as $singleWork)
                <div class="col-lg-3 col-sm-6 how-work-item wow fadeInLeft" data-wow-duration="0.5s" data-wow-delay="0.9s">
                    <div class="how-work-card">
                        <div class="how-work-card__step text--base text-shadow--base">{{ $loop->index + 1 }}</div>
                            <h3 class="title mt-4">{{ __($singleWork->data_values->title) }}</h3>
                        <p class="mt-2">{{ __($singleWork->data_values->text) }}</p>
                    </div><!-- how-work-card end -->
                </div>
            @endforeach
          </div>
        </div>
      </section>
      <!-- how work section end -->
