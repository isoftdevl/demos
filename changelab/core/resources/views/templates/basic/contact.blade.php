@extends($activeTemplate.'layouts.frontend')
@php
    $contact = getContent('contact_us.content',true)
@endphp
@section('content')
 <!--=======Contact-Section Starts Here=======-->
    <section class="contact-section padding-top padding-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-header left-style text-left margin-olpo">
                        <h2 class="title">{{$contact->data_values->title}}</h2>
                        <p>
                            {{$contact->data_values->short_details}}
                        </p>
                    </div>
                    <form class="contact-form" id="contact_form" method="post" action="">
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('Your Name')</label>
                            <input name="name" class="form-control" type="text" placeholder="@lang('Your Name')"
                           value="{{ old('name') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('Email Address')</label>
                            <input name="email" type="text" placeholder="@lang('Enter E-Mail Address')" class="form-control"
                           value="{{old('email')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">@lang('Subject')</label>
                             <input name="subject" type="text" placeholder="@lang('Write your subject')" class="form-control"
                           value="{{old('subject')}}" required>
                        </div>
                        <div class="form-group">
                            <label for="message">@lang('Your Message')</label>
                            <textarea name="message" wrap="off" placeholder="@lang('Write your message')"
                              class="form-control">{{old('message')}}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Send Message">
                        </div>
                    </form>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <img class="wow slideInRight" src="{{asset('assets/images/frontend/contact_us/'.$contact->data_values->image)}}" alt="@lang('contact')">
                </div>
            </div>
        </div>
    </section>
    <!--=======Contact-Section Ends Here=======-->
@endsection


@push('style')
    <style>
        .form-group input,
        .input-group input {

            -webkit-border-radius: 0;
            -moz-border-radius: 0;
            border-radius: 0;
            height: 60px;
            padding: 0 25px;
            color: #ffffff;
            font-size: 20px;
            background: #0E0D35;
        }

        .form-group textarea{
             color: #ffffff;
            font-size: 20px;
            background: #0E0D35;
        }

        .card-header {
            background: #0e0d35;
            padding: 23px;
        }

        .card-body {
            background: #13114a;
        }

        .table {
            color: #ffffff;
        }


        input[type=submit] {
            background: #3fcc71;
        }

    </style>
@endpush