@extends($activeTemplate.'layouts.master')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card section-bg">
                    <div class="card-header">
                        <h5 class="title m-0 text-center text-white">
                            {{ __($page_title) }}

                        <a href="{{route('ticket') }}" class="btn btn-sm btn-success float-right">
                            @lang('My Support Ticket')
                        </a>
                        </h5>
                    </div>

                    <div class="card-body">

                        <form  action="{{route('ticket.store')}}"  method="post" enctype="multipart/form-data" onsubmit="return submitUserForm();">
                            @csrf
                            <div class="row ">
                                <div class="form-group col-md-6">
                                    <label for="name">@lang('Name')</label>
                                    <input type="text"  name="name" value="{{@$user->firstname . ' '.@$user->lastname}}" class="form-control form-control-lg" placeholder="@lang('Enter Name')" required>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="email">@lang('Email address')</label>
                                    <input type="email"  name="email" value="{{@$user->email}}" class="form-control form-control-lg" placeholder="@lang('Enter your Email')" required>
                                </div>

                                <div class="form-group col-md-12">
                                    <label for="website">@lang('Subject')</label>
                                    <input type="text" name="subject" value="{{old('subject')}}" class="form-control form-control-lg" placeholder="@lang('Subject')" >
                                </div>

                                <div class="col-12 form-group">
                                    <label for="inputMessage">@lang('Message')</label>
                                    <textarea name="message" id="inputMessage" rows="6" class="form-control form-control-lg">{{old('message')}}</textarea>
                                </div>
                            </div>

                            <div class="d-flex form-group ">
                                <div class="file-upload mr-2">
                                    <label for="inputAttachments">@lang('Attachments')</label>
                                    <input type="file" name="attachments[]" id="inputAttachments" class="form-control img_up_input mb-2" />
                                    <div id="fileUploadsContainer"></div>
                                    <p class="ticket-attachments-message text-muted">
                                        @lang("Allowed File Extensions: .jpg, .jpeg, .png, .pdf, .doc, .docx")
                                    </p>
                                </div>

                                <div>
                                    <label class="d-block" for="0">&nbsp;</label>
                                    <button type="button" class="btn btn-success btn-sm add__btn" onclick="extraTicketAttachment()">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                            </div>

                            <div class="row form-group justify-content-center">
                                <div class="col-md-6">
                                    <button class="btn btn-success" type="submit" id="recaptcha" ><i class="fa fa-paper-plane"></i>&nbsp;@lang('Submit')</button>
                                   
                                </div>

                                <div class="col-md-6">
                                    <button class=" btn btn-danger" type="button" onclick="formReset()">&nbsp;@lang('Cancel')</button>
                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('script')
    <script>
        'use strict';
        
        function extraTicketAttachment() {
            $("#fileUploadsContainer").append('<input type="file" name="attachments[]" class="form-control my-3" required />')
        }
        function formReset() {
            window.location.href = "{{url()->current()}}"
        }
    </script>
@endpush

