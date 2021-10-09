@extends($activeTemplate.'layouts.frontend')

@section('content')

@php
    $contact = getContent('contact_us.content', true);
    $contacts = getContent('contact_us.element');
@endphp

<section class="pt-100 pb-100">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <h2 class="mb-3">{{ __(@$contact->data_values->heading) }}</h2>
          <p>{{ __(@$contact->data_values->sub_heading) }}</p>
        </div>
      </div>
      <div class="row justify-content-between mt-5 gy-4">
        <div class="col-lg-4">
          <div class="row gy-4">

            @foreach($contacts as $singleContact)
                <div class="col-lg-12">
                    <div class="contact-info-card rounded-3">
                        <h6 class="title mb-3">{{ __($singleContact->data_values->address_type) }}</h6>
                        <div class="contact-info d-flex">
                            @php echo $singleContact->data_values->icon; @endphp
                            <p>{{ __($singleContact->data_values->address) }}</p>
                        </div>
                    </div>
                </div>
            @endforeach

          </div><!-- row end -->
        </div>
        <div class="col-lg-8 ps-lg-5">
          <div class="contact-wrapper rounded-3">
            <h2 class="mb-3">@lang('Contact Us')</h2>
            <form class="contact-form" method="post" action="">
                @csrf
              <div class="row">
                <div class="col-lg-6 form-group">
                  <label>@lang('Name')</label>
                  <div class="custom--field">
                    <input name="name" type="text" class="form--control" value="@if(auth()->user()) {{ auth()->user()->fullname }} @else {{ old('name') }} @endif" @if(auth()->user()) readonly @endif required>
                    <i class="las la-user"></i>
                  </div>
                </div><!-- form-group end -->
                <div class="col-lg-6 form-group">
                  <label>@lang('Email')</label>
                  <div class="custom--field">
                    <input name="email" type="email" class="form--control" value="@if(auth()->user()) {{ auth()->user()->email }} @else {{old('email')}} @endif" @if(auth()->user()) readonly @endif required>
                    <i class="las la-envelope"></i>
                  </div>
                </div><!-- form-group end -->
                <div class="col-lg-12 form-group">
                  <label>@lang('Subject')</label>
                  <div class="custom--field">
                    <input name="subject" type="text" class="form--control" value="{{old('subject')}}" required>
                    <i class="las la-sticky-note"></i>
                  </div>
                </div><!-- form-group end -->
                <div class="col-lg-12 form-group">
                  <label>@lang('Message')</label>
                  <div class="custom--field">
                    <textarea name="message" class="form--control">{{old('message')}}</textarea>
                    <i class="las la-sms"></i>
                  </div>
                </div><!-- form-group end -->
                <div class="col-lg-12 form-group">
                  <button type="submit" class="btn btn--base">@lang('Submit Now')</button>
                </div><!-- form-group end -->
              </div><!-- row end -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
