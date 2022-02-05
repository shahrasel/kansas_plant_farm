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
<!--            <div class="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Appointment</h1>
            </div>-->
                <!-- google map end -->

            <!-- contact area start -->
            <div class="contact-area section-padding pt-0">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="contact-message" style="margin-top: 100px">
                                <h4 class="contact-title" style="line-height: 30px">Your appointment on {{ date('l, F j',strtotime($appointment->date)) }} at {{ $appointment->time }} cancelled successfully!!</h4>
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
                    $form.find(".row").html("<div class=\"col-lg-12\" style='padding-top:120px;text-align: center'><h3>Thank You</h3><p>Your information is successfully inserted into our database.</p></div>");
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

