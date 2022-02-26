@extends('layouts.app')
@section('custom_styles')
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
            margin-bottom: 10px;
        }
        .error_block {
            margin-bottom: 15px;
        }
        .btn-sqr{
            padding: 12px 10px;
        }
        .checkout-page-wrapper {
            max-width: 800px;
        }
        </style>
@endsection
@section('content')
    <main>
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper container section-padding pt-4">
            <div class="container" id="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Appointment</h1>
                <h4 class="contact-title mb-3">On {{ request()->date }} at {{ request()->time }}</h4>
            </div>
                <!-- google map end -->

            <!-- contact area start -->
            <div class="contact-area section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-message">

                                <form id="appointment_form"  class="contact-form" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label>First Name<span style="color:yellow">*</span></label>
                                            <input name="firstname" id="firstname" type="text" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label>Last Name<span style="color:yellow">*</span></label>
                                            <input name="lastname" id="lastname" type="text" required>
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label>Email<span style="color:yellow">*</span></label>
                                            <input name="email" id="email" type="text" required>
                                        </div>
                                        <div class="col-lg-6 col-md-6 col-sm-6">
                                            <label>Phone<span style="color:yellow">*</span></label>
                                            <input name="phone" id="phone" type="text" required>
                                        </div>

                                        <div class="col-12">
                                            <div class="contact2-textarea">
                                                <label>Message(s)</label>
                                                <textarea  name="message" id="message"  class="form-control2" style="margin-bottom: 10px"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <p style="margin-bottom: 10px"><span style="color:yellow;">*</span> All Fields are Required</p>
                                        </div>

                                        <div class="col-12 mt-2">
                                            <div class="contact-btn">
                                                <button class="btn btn-sqr btn-submit" type="submit">Confirm Appointment</button>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="date" value="{{ request()->final_date }}">
                                    <input type="hidden" name="time" value="{{ request()->time }}">
<!--                                    <input type="hidden" name="recaptcha" id="recaptcha">-->
                                </form>
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
            $form = $("#appointment_form");
            $.ajax({
                type: "POST",
                url: "{{ route('send_appointment')  }}",
                data: $("#appointment_form").serialize(),
                success: function (data) {
                    $("#container").css('display','none');
                    $form.find(".row").html("<div class=\"col-lg-12\" style='padding-top:120px;text-align: center'><p>"+data+"</p></div>");
                    setTimeout(function () {
                        $("#myModal").fadeOut("slow");
                        ifModalClosed = 1;
                    }, 3000);
                },
                error: function (message) {
                    var errordata = JSON.parse(message.responseText);
                    $form.find(":input").each(function () {
                        var fieldname = $(this).attr('name');
                        $("#"+fieldname).parent().find(".error_block").remove();
                        if(errordata.errors !== undefined) {
                            if (errordata.errors[fieldname]) {

                                $("#" + fieldname).parent().append('<span class="error_block">' + errordata.errors[fieldname][0] + '</span>');
                            }
                        }
                    })
                },
            });
        });
    });
</script>


@endsection

