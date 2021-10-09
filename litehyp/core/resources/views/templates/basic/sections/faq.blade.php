@php
    $faq = getContent('faq.content', true);
    $faqDatas = getContent('faq.element');
@endphp

 <!-- faq section start -->
    <section class="pt-100 pb-50" id="faq">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6">
              <div class="section-header text-center">
                <h2 class="section-title">{{ __(@$faq->data_values->heading) }}</h2>
              </div>
            </div>
          </div>
          <div class="row align-items-center justify-content-between gy-4">
            <div class="accordion custom--accordion" id="faqAccordion">
              <div class="row gy-4">

            @foreach($faqDatas as $singleFaq)
                <div class="col-lg-6">
                  <div class="accordion-item">
                    <h2 class="accordion-header" id="h-{{ $singleFaq->id }}">
                      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-{{ $singleFaq->id }}" aria-expanded="false" aria-controls="c-{{ $singleFaq->id }}">
                        {{ __($singleFaq->data_values->question) }}
                      </button>
                    </h2>
                    <div id="c-{{ $singleFaq->id }}" class="accordion-collapse collapse" aria-labelledby="h-{{ $singleFaq->id }}" data-bs-parent="#faqAccordion">
                      <div class="accordion-body">
                        <p>{{ __($singleFaq->data_values->answer) }}</p>
                      </div>
                    </div>
                  </div><!-- accordion-item-->
                </div>
            @endforeach

              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- faq section end -->
