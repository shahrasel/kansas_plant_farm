@extends('layouts.app')
@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
    <style>
        .nice-select{
            height: 47px;
            line-height:45px;
            width: 100px;
        }
        .error{
            margin-bottom: 10px;
            display: inline-block;
        }
        .contact-message form input {
            margin-bottom: 20px;
        }
        .btn-sqr{
            padding: 12px 10px;
        }
        </style>
@endsection
@section('content')
    <main>
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding pt-4">
            <div class="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Contact Us</h1>

                <div class="map-area section-padding">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3102.3704760108944!2d-95.29555894909285!3d38.96120777946054!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x87bf6eb75d1294a5%3A0xeee692dd0894aaf8!2s1210%20Lakeview%20Ct%2C%20Lawrence%2C%20KS%2066049%2C%20USA!5e0!3m2!1sen!2sde!4v1627820899226!5m2!1sen!2sde" width="100%" height="450" style="border:0;" allowfullscreen loading="lazy"></iframe>
            </div>
                </div>
                <!-- google map end -->

                <!-- contact area start -->
                <div class="contact-area section-padding pt-0">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="contact-message">
                                    <h4 class="contact-title">Contact Us</h4>
                                    <form id="contact-form"  class="contact-form" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Name<span style="color:yellow">*</span></label>
                                                <input name="name" type="text" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Street Address<span style="color:yellow">*</span></label>
                                                <input name="street_address" type="text">
                                            </div>
                                            <div class="d-flex justify-content-center">
                                                <div class="mx-3">
                                                    <label>City<span style="color:yellow">*</span></label>
                                                    <input name="city" type="text">
                                                </div>
                                                <div class="mx-3">
                                                    <label>State<span style="color:yellow">*</span></label>
                                                    <select name="state" style="height: 47px">
                                                        @foreach($global_state_lists as $key=>$global_state_list)
                                                            <option value="{{ $key }}" @if($key=='KS') selected @endif>{{ $key }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mx-3">
                                                    <label>Zip<span style="color:yellow">*</span></label>
                                                    <input name="zip" type="text">
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Email<span style="color:yellow">*</span></label>
                                                <input name="email" type="text" required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Phone<span style="color:yellow">*</span></label>
                                                <input name="phone" type="text" required>
                                            </div>

                                            <div class="col-12">
                                                <p><span style="color:yellow">*</span> All Fields are Required</p>
                                            </div>

                                            <div class="col-12">
                                                <div class="contact2-textarea">
                                                    <label>Additional Comment(s)</label>
                                                    <textarea  name="comment" class="form-control2" ></textarea>
                                                </div>
                                                <div class="contact2-textarea">
                                                    <label>Plant Requests</label>
                                                    <textarea  name="plant_req" class="form-control2" ></textarea>
                                                </div>
                                            </div>


                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <h6 style="margin-bottom:10px;margin-top:10px;">Please check all that apply:</h6>
                                                <label style="width: 100%;cursor: pointer;height: 30px;">
                                                    <input type="checkbox" name="checklist[]" style="width: 5%" class="ids" value="schedule_shopping_appointment">&nbsp;{{ $settings_info->check_label_1 }}
                                                </label>
                                                <label style="width: 100%;cursor: pointer;height: 30px;">
                                                    <input type="checkbox" name="checklist[]" style="width: 5%" class="ids" value="add_email_to_notify">&nbsp;{{ $settings_info->check_label_2 }}
                                                </label>
                                                <label style="width: 100%;cursor: pointer;height: 30px;">
                                                    <input type="checkbox" name="checklist[]" style="width: 5%" class="ids" value="request_to_buy_plants">&nbsp;{{ $settings_info->check_label_3 }}
                                                </label>
                                                <label style="width: 100%;cursor: pointer;height: 30px;">
                                                    <input type="checkbox" name="checklist[]" style="width: 5%" class="ids" value="wish_to_shoot_portraits">&nbsp;{{ $settings_info->check_label_4 }}
                                                </label>
                                                <label style="width: 100%;cursor: pointer;height: 30px;">
                                                    <input type="checkbox" name="checklist[]" style="width: 5%" class="ids" value="req_a_private_garden">&nbsp;{{ $settings_info->check_label_5 }}
                                                </label>
                                                <label style="width: 100%;cursor: pointer;height: 30px;">
                                                    <input type="checkbox" name="checklist[]" style="width: 5%" class="ids" value="req_a_gift_cert">&nbsp;{{ $settings_info->check_label_6 }}
                                                </label>
                                            </div>

                                            <div class="col-12">
                                                <div class="contact-btn">
                                                    <button class="btn btn-sqr btn-submit" type="submit">Send Message</button>
                                                </div>
                                            </div>

                                            <div id="contact_success_message" class="col-12 justify-content-center my-5" style="display: none">
                                                <p class="form-messege" style="color: #fff;font-size: 1.1rem;text-align: center;border: 1px solid #00ff00;padding: 10px;">Thank you for contacting us! We will respond within 24-48 hrs.</p>
                                            </div>
                                        </div>
                                        <input type="hidden" name="recaptcha" id="recaptcha">
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="contact-info">
                                    <h4 class="contact-title">KANSAS PLANT FARM</h4>
                                    <ul>
                                        <li><i class="fa fa-fax"></i> Address : {{ $settings_info->address }}</li>
                                        <li><i class="fa fa-envelope-o"></i> E-mail:&nbsp;<a href="mailto:{{ $settings_info->email }}" style="color:#7fbc03">{{ $settings_info->email }}</a></li>
                                        <li><i class="fa fa-phone"></i> <a href="tel:(785) 218-7475" style="color:#7fbc03">{{ $settings_info->phone }}</a></li>
                                    </ul>
                                    <div class="working-time">
                                        <h5>Nursery Hours</h5>
                                        <p>{{ $settings_info->nursery_hours }}</p>
                                    </div>
                                    <br/>
                                    <h5>Downloads</h5>
                                    <div class="d-flex justify-content-center">
                                        <div class="m-3" style="margin-left: 0px !important;">
                                            <a class="btn btn-sqr text-white" href="{{ asset('storage/uploads/'.$settings_info->pricing_sheet_link) }}" target="_blank">KPF PRICING SHEET</a>
                                        </div>
                                        <div class="m-3" style="margin-left: 0px !important;">
                                            <a class="btn btn-sqr text-white" href="{{ asset('storage/uploads/'.$settings_info->order_form_link) }}" target="_blank">KPF ORDER FORM</a>
                                        </div>
                                        <div class="m-3" style="margin-left: 0px !important;">
                                            <a class="btn btn-sqr text-white" href="{{ asset('storage/uploads/'.$settings_info->nursery_link) }}" target="_blank">NURSERY MAP FORM</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection
@section('javascript')

    <script>

        $(document).ready(function() {

            $(".btn-submit").click(function(e){

                e.preventDefault();

                var _token = $("input[name='_token']").val();

                var name = $("input[name='name']").val();
                var email = $("input[name='email']").val();
                var phone = $("input[name='phone']").val();

                var street_address = $("input[name='street_address']").val();
                var city = $("input[name='city']").val();
                var state = $("select[name='state']").val();
                var zip = $("input[name='zip']").val();


                var comment = $('textarea[name="comment"]').val();
                var plant_req = $("textarea[name='plant_req']").val();

                var recaptcha = $("input[name='recaptcha']").val();

                var ids = new Array();
                $('input[name="checklist[]"]:checked').each(function(){
                    ids.push($(this).val());
                });

                //alert(ids);

                var checklist = JSON.stringify(ids);

                $.ajax({
                    url: "{{ route('send-contact-message') }}",
                    type: 'POST',

                    data: {
                        _token: _token,
                        name: name,
                        email: email,
                        phone: phone,
                        street_address: street_address,
                        city: city,
                        state: state,
                        zip: zip,
                        comment: comment,
                        recaptcha: recaptcha,
                        plant_req: plant_req,
                        checklist: checklist,
                    },

                    success: function (data) {
                        if(data == 'done') {
                            /*alert('done');*/
                            $("#contact-form").trigger("reset");
                            $("#contact_success_message").css('display','block');
                        }

                    },
                    error: function (err) {
                        if (err.status == 422) {
                            //$(".contact-message form input").css('margin-bottom','10px');

                            //printErrorMsg(err.errors);
                            console.log(err.responseJSON);
                            //$('#success_message').fadeIn().html(err.responseJSON.message);

                            // you can loop through the errors object and show it to the user
                            console.warn(err.responseJSON.errors);
                            // display errors on each form field

                            //var thisClass = $(this).attr("error");
                            $('span.error').remove();

                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="'+i+'"]');
                                if(error[0]=='The p first name field is required.')
                                    error[0] = 'The first name field is required';
                                if(error[0]=='The p last name field is required.')
                                    error[0] = 'The last name field is required';
                                if(error[0]=='The p email address field is required.')
                                    error[0] = 'The email field is required';
                                if(error[0]=='The p phone field is required.')
                                    error[0] = 'The phone field is required';

                                el.after($('<span style="color: red;" class="error">'+error[0]+'</span>'));
                            });
                        }
                    }




                });



            });
        });
    </script>


@endsection

