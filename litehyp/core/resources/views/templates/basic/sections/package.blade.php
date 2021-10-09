@php
    $package = getContent('package.content', true);
    $plans = App\Models\Plan::where('status', 1)->get();
@endphp

<!-- latest package section start -->
    <section class="pt-100 pb-100" id="plan">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="section-header">
                <h2 class="section-title pb-4">{{ __(@$package->data_values->heading) }}</h2>
              </div>
            </div>
          </div><!-- row end -->
          <div class="row justify-content-center mb-none-70">
            @forelse($plans as $singlePlan)
                <div class="col-xl-3 col-lg-4 col-sm-6 mb-70 wow fadeInUp" data-wow-duration="0.5s" data-wow-delay="0.7s">
                    <div class="package-card text-center bg_img" style="background-image: url('{{ asset($activeTemplateTrue. 'images/bg/plan.jpg') }}');">
                        <h4 class="package-card__title">{{ __($singlePlan->name) }}</h4>
                        <div class="package-card__range mt-4 base--color">
                        {{ $general->cur_sym }}{{ showAmount($singlePlan->min_amount, 0) }}
                        -
                        {{ $general->cur_sym }}{{ showAmount($singlePlan->max_amount, 0) }}
                        </div>
                            <ul class="package-card__features mt-3">
                                <li>
                                    @lang('Return')
                                    {{ showAmount($singlePlan->interest_amount) }}
                                    {{ $singlePlan->interest_type == 0 ? 'Fixed' : '%' }}
                                </li>
                                <li>@lang('Every Day')</li>
                                <li>@lang('For') {{ $singlePlan->total_return }} @lang('Times')</li>
                            </ul>
                        <a href="#0"
                        data-name="{{ __($singlePlan->name) }}"
                        data-id="{{ $singlePlan->id }}"
                        class="btn btn-md btn--base mt-4 planModal"
                        data-bs-toggle="modal"
                        data-bs-target="{{ Auth::user() ? '#planModal' : '#loginModal' }}">
                            @lang('Invest Now')
                        </a>
                    </div><!-- package-card end -->
                </div>
            @empty
                <h2 class="text-center">@lang('Plan Not Found')</h2>
            @endforelse
          </div><!-- row end -->
        </div>
      </section>
      <!-- latest package section end -->


@auth
 <!-- Modal -->
  <div class="modal fade" id="planModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="planModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
            <h3 class="modal-title method-name" id="planModalLabel"></h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
            <i class="las la-times"></i>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{route('user.investment')}}" method="post" class="account-form login-form">
            @csrf

            <div class="form-group">
                <input type="hidden" name="id" required>
            </div>

            <div class="form-group">
                <label>@lang('Enter Amount')<sup class="text-danger">*</sup></label>
                <div class="input-group">
                    <input id="amount" type="text" class="form--control" name="amount" placeholder="@lang('Amount')" required  value="{{old('amount')}}" onkeyup="this.value = this.value.replace (/^\.|[^\d\.]/g, '')">
                    <span class="input-group-text bg--base">{{__($general->cur_text)}}</span>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 mb-2">
                    <button type="submit" class="btn btn--base w-100 bg-danger" data-bs-dismiss="modal">@lang('Close')</button>
                </div>
                <div class="col-lg-6">
                    <button type="submit" class="btn btn--base w-100">@lang('Confirm')</button>
                </div>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endauth



@auth
    @push('script')
    <script>
        (function ($) {
            "use strict";
            $('.planModal').on('click', function () {
                var modal = $('#planModal');
                modal.find('input[name=id]').val($(this).data('id'));
                modal.find($('#planModalLabel').text($(this).data('name')));
            });
        })(jQuery);
    </script>
    @endpush
@endauth
