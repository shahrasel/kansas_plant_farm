@extends('layouts.app')
@section('custom_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('custom_styles')
    <style>
        .nice-select {
            width: 100% !important;
            height: 45px !important;
            line-height: 45px !important;
        }
        .custom-control-label.remove::before {
            background-color:#000 !important;
            border: none !important;
        }
        .contact-message form input, .contact-message form textarea{
            background-color: #fff !important;
        }
        /*p{
            color: #fff !important;
        }
        #card-fields-container {
            background-color: #fff !important;
        }*/
        .contact-message form input, .contact-message form textarea {
            margin-bottom: 15px;
        }

    </style>
@endsection
@section('content')
    <main>
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding">
            <div class="container">
<!--                <div class="row">
&lt;!&ndash;                    <div class="col-12">
                        &lt;!&ndash; Checkout Login Coupon Accordion Start &ndash;&gt;
                        <div class="checkoutaccordion" id="checkOutAccordion">
&lt;!&ndash;                            <div class="card">
                                <h6>Returning Customer? <span data-toggle="collapse" data-target="#logInaccordion">Click
                                            Here To Login</span></h6>
                                <div id="logInaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <p>If you have shopped with us before, please enter your details in the boxes
                                            below. If you are a new customer, please proceed to the Billing &amp;
                                            Shipping section.</p>
                                        <div class="login-reg-form-wrap mt-20">
                                            <div class="row">
                                                <div class="col-lg-7 m-auto">
                                                    <form action="#" method="post">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="single-input-item">
                                                                    <input type="email" placeholder="Enter your Email" required />
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="single-input-item">
                                                                    <input type="password" placeholder="Enter your Password" required />
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <div class="login-reg-form-meta d-flex align-items-center justify-content-between">
                                                                <div class="remember-meta">
                                                                    <div class="custom-control custom-checkbox">
                                                                        <input type="checkbox" class="custom-control-input" id="rememberMe" required />
                                                                        <label class="custom-control-label" for="rememberMe">Remember
                                                                            Me</label>
                                                                    </div>
                                                                </div>

                                                                <a href="#" class="forget-pwd">Forget Password?</a>
                                                            </div>
                                                        </div>

                                                        <div class="single-input-item">
                                                            <button class="btn btn-sqr">Login</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>&ndash;&gt;

&lt;!&ndash;                            <div class="card">
                                <h6>Have A Coupon? <span data-toggle="collapse" data-target="#couponaccordion">Click
                                            Here To Enter Your Code</span></h6>
                                <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                    <div class="card-body">
                                        <div class="cart-update-option">
                                            <div class="apply-coupon-wrapper">
                                                <form action="#" method="post" class=" d-block d-md-flex">
                                                    <input type="text" placeholder="Enter Your Coupon Code" required />
                                                    <button class="btn btn-sqr">Apply Coupon</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>&ndash;&gt;
                        </div>
                        &lt;!&ndash; Checkout Login Coupon Accordion End &ndash;&gt;
                    </div>&ndash;&gt;
                </div>-->

                    <div class="row">
                    <!-- Checkout Billing Details -->
<!--                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">Billing Details</h5>
                            <div class="billing-form-wrap">
                                <form action="#">

                                    <div class="single-input-item">
                                        <label for="com-name">Company Name</label>
                                        <input type="text" id="com-name" placeholder="Company Name" />
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="f_name" class="required">First Name</label>
                                                <input type="text" id="f_name" placeholder="First Name" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="single-input-item">
                                                <label for="l_name" class="required">Last Name</label>
                                                <input type="text" id="l_name" placeholder="Last Name" required />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="single-input-item">
                                        <label for="email" class="required">Email Address</label>
                                        <input type="email" id="email" placeholder="Email Address" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="phone">Phone</label>
                                        <input type="text" id="phone" placeholder="Phone" />
                                    </div>

&lt;!&ndash;                                    <div class="single-input-item">
                                        <label for="country" class="required">Country</label>
                                        <select name="country nice-select" id="country">
                                            <option value="Afghanistan">Afghanistan</option>
                                            <option value="Albania">Albania</option>
                                            <option value="Algeria">Algeria</option>
                                            <option value="Armenia">Armenia</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="India">India</option>
                                            <option value="Pakistan">Pakistan</option>
                                            <option value="England">England</option>
                                            <option value="London">London</option>
                                            <option value="London">London</option>
                                            <option value="Chaina">China</option>
                                        </select>
                                    </div>&ndash;&gt;

                                    <div class="single-input-item">
                                        <label for="street-address" class="required mt-20">Address 1</label>
                                        <input type="text" id="street-address" placeholder="Address 1" required />
                                    </div>

                                    <div class="single-input-item">
                                        <input type="text" placeholder="Address 2 (Optional)" />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="town" class="required">City</label>
                                        <input type="text" id="city" placeholder="City" required />
                                    </div>

                                    <div class="single-input-item">
                                        <label for="state">State</label>
&lt;!&ndash;                                        <input type="text" id="state" placeholder="State" />&ndash;&gt;
                                        <select name="state" id="state">
                                            <option value="">&#45;&#45; Select &#45;&#45;</option>
                                            <option value="TX">Texas</option>
                                            <option value="Michigan">Michigan</option>
                                        </select>
                                    </div>

                                    <div class="single-input-item" style="display: inline-block;width: 100%;">
                                        <label for="postcode" class="required">Postcode / ZIP</label>
                                        <input type="text" id="postcode" placeholder="Postcode / ZIP" required />
                                    </div>



                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="create_pwd">
                                                <label class="custom-control-label" for="create_pwd">Create an
                                                    account?</label>
                                            </div>
                                        </div>
                                        <div class="account-create single-form-row">
                                            <p>Create an account by entering the information below. If you are a
                                                returning customer please login at the top of the page.</p>
                                            <div class="single-input-item">
                                                <label for="pwd" class="required">Account Password</label>
                                                <input type="password" id="pwd" placeholder="Account Password" />
                                            </div>
                                        </div>
                                    </div>
&lt;!&ndash;                                    <div class="checkout-box-wrap">
                                        <div class="single-input-item">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="ship_to_different">
                                                <label class="custom-control-label" for="ship_to_different">Ship to a
                                                    different address?</label>
                                            </div>
                                        </div>
                                        <div class="ship-to-different single-form-row">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="single-input-item">
                                                        <label for="f_name_2" class="required">First Name</label>
                                                        <input type="text" id="f_name_2" placeholder="First Name" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="single-input-item">
                                                        <label for="l_name_2" class="required">Last Name</label>
                                                        <input type="text" id="l_name_2" placeholder="Last Name" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="email_2" class="required">Email Address</label>
                                                <input type="email" id="email_2" placeholder="Email Address" required />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="com-name_2">Company Name</label>
                                                <input type="text" id="com-name_2" placeholder="Company Name" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="country_2" class="required">Country</label>
                                                <select name="country" id="country_2">
                                                    <option value="Bangladesh">Bangladesh</option>
                                                    <option value="India">India</option>
                                                    <option value="Pakistan">Pakistan</option>
                                                    <option value="England">England</option>
                                                    <option value="London">London</option>
                                                    <option value="London">London</option>
                                                    <option value="Chaina">Chaina</option>
                                                </select>
                                            </div>

                                            <div class="single-input-item">
                                                <label for="street-address_2" class="required mt-20">Street address</label>
                                                <input type="text" id="street-address_2" placeholder="Street address Line 1" required />
                                            </div>

                                            <div class="single-input-item">
                                                <input type="text" placeholder="Street address Line 2 (Optional)" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="town_2" class="required">Town / City</label>
                                                <input type="text" id="town_2" placeholder="Town / City" required />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="state_2">State / Divition</label>
                                                <input type="text" id="state_2" placeholder="State / Divition" />
                                            </div>

                                            <div class="single-input-item">
                                                <label for="postcode_2" class="required">Postcode / ZIP</label>
                                                <input type="text" id="postcode_2" placeholder="Postcode / ZIP" required />
                                            </div>
                                        </div>
                                    </div>&ndash;&gt;
                                    <div class="single-input-item" style="margin-top: 50px;">
&lt;!&ndash;                                        <label for="ordernote">Additional instruction</label>&ndash;&gt;
                                        <h5 class="checkout-title" style="margin-bottom: 20px;">Additional Comments</h5>
                                        <p>Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
&lt;!&ndash;                                        <label for="ordernote">Order Note</label>&ndash;&gt;
&lt;!&ndash;                                        <textarea name="ordernote" id="ordernote" cols="30" rows="3" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>&ndash;&gt;

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>-->

                    <!-- Order Summary Details -->
                    <div class="col-lg-10" style="margin: auto">
                        <div class="order-summary-details">
                            <p>
                                <a style="max-width: 100px" href="javascript:window.history.back()" class="btn btn-sqr d-block">Back</a>
                            </p>
                            <br/>
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-title">Size</th>
                                            <th class="pro-price">Unit Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @php
                                            $i=0;
                                            $tax_amount = 0;
                                            $cart_d = "";
                                        @endphp
                                        @foreach($orderdetails_lists as $cart_list)
                                            <tr>
                                                <td class="pro-thumbnail">
                                                    <a href="{{ url('/plants') }}/{{ $cart_list->product->slug }}">
                                                        @if(!empty(($cart_list->product->getImage($cart_list->product))))
                                                            <img class="img-fluid" src="{{ url($cart_list->product->getImage($cart_list->product)) }}" alt="product">
                                                        @else
                                                            <img class="img-fluid" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                        @endif
                                                    </a></td>
                                                <td class="pro-title">
                                                    <a href="{{ url('/plants') }}/{{ $cart_list->product->slug }}">
                                                        @if(!empty($cart_list->product->other_product_service_name))
                                                            {{ $cart_list->product->other_product_service_name }}
                                                        @else
                                                            {{ $cart_list->product->botanical_name }}<br/>
                                                            {{ $cart_list->product->common_name }}
                                                        @endif
                                                    </a></td>
                                                <td class="pro-price"><span>@if(!empty($cart_list->size)){{ $cart_list->size }}@else - @endif</span></td>
                                                <td class="pro-price"><span>${{ $cart_list->unit_price }}</span></td>
                                                <td class="pro-quantity">
                                                    <span>{{ $cart_list->quantity }}</span>
                                                </td>
                                                <td class="pro-subtotal"><span>${{ number_format(($cart_list->unit_price*$cart_list->quantity), 2, '.', ',') }}</span></td>
                                            </tr>
                                            @php
                                                $i += $cart_list->quantity*$cart_list->unit_price;
                                                if($cart_list->product->tax_free !='YES') {
                                                    $tax_amount += 9.30/100*($cart_list->quantity*$cart_list->unit_price);
                                                }
                                                $cart_d .= $cart_list->id."#";
                                            @endphp
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>



                                <div class="row">
                                    <div class="col-lg-5 ml-auto">
                                        <!-- Cart Calculation Area -->
                                        <div class="cart-calculator-wrapper">
                                            <div class="cart-calculate-items">
<!--                                                <h6>Cart Totals</h6>-->
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tr>
                                                            <td>Sub Total</td>
                                                            <td>${{ number_format($i, 2, '.', ',') }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sales Tax (9.30%)</td>
                                                            <td>${{ number_format($tax_amount, 2, '.', ',') }}</td>
                                                        </tr>
                                                        @php
                                                            $i += $tax_amount;
                                                        @endphp
                                                        <tr class="total">
                                                            <td>Total</td>
                                                            <td class="total-amount">${{ number_format($i, 2, '.', ',') }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <h5 class="checkout-title" style="margin-top:30px;">CUSTOMER INFORMATION</h5>
                                <p><b>First Name:</b> {{ $order_additional_info->first_name }}</p>
                                <p><b>Last Name:</b> {{ $order_additional_info->last_name }}</p>
                                <p><b>Email:</b> {{ $order_additional_info->email_address }}</p>
                                <p><b>Phone:</b> {{ $order_additional_info->phone }}</p>

                                <h5 class="checkout-title" style="margin-top:30px;">BILLING INFORMATION</h5>
                                <p><b>Address:</b> {{ $order_additional_info->street_address }}</p>
                                <p><b>City:</b> {{ $order_additional_info->city }}</p>
                                <p><b>State:</b> {{ $order_additional_info->state }}</p>
                                <p><b>Zip:</b> {{ $order_additional_info->zip }}</p>

                                <h5 class="checkout-title" style="margin-top:30px;">PICKUP PERSON:</h5>
                                @if($order_additional_info->person == 'self_customer')
                                    <p>I, as the customer, will pickup the purchased item(s).</p>
                                @else
                                    <p>I am assigning the following person to pick up my purchased item:</p>
                                    <p><b>First Name:</b> {{ $order_additional_info->p_first_name }}</p>
                                    <p><b>Last Name:</b> {{ $order_additional_info->p_last_name }}</p>
                                    <p><b>Email:</b> {{ $order_additional_info->p_email_address }}</p>
                                    <p><b>Phone:</b> {{ $order_additional_info->p_phone }}</p>
                                @endif

                                <h5 class="checkout-title" style="margin-top:30px;">PREFERRED PICKUP DATE/TIME:</h5>
                                <p><b>Date:</b> {{ $order_additional_info->pickup_date }}</p>
                                <p><b>Time:</b> {{ $order_additional_info->time }}</p>


                                @php
                                    if(!empty(json_decode($order_additional_info->preferred_pick_optinos))) {
                                        $options = json_decode($order_additional_info->preferred_pick_optinos);
                                    }
                                @endphp

                                @if(!empty($options))
                                    <h5 class="checkout-title" style="margin-top:30px;">IMPORTANT INFORMATION:</h5>
                                    <ul>
                                    @foreach($options as $option)
                                        <li style="list-style: disc">
                                            @if($option=='hand_pick')
                                                Hand pick out plants at the nursery
                                            @elseif($option=='substitute_plant_size')
                                                If plant is not available, I’m ok to substitute plant size. (equal or better value)
                                            @elseif($option=='substitute_plant_variety')
                                                If plant is not available, I’m ok to substitute plant variety. (equal or better value)
                                            @elseif($option=='back_order_1_month')
                                                If plant is not available, I’m ok to back-order. (Up to 1 month)
                                            @elseif($option=='back_order_3_month')
                                                If plant is not available, I’m ok to back-order. (Up to 3 months)
                                            @elseif($option=='issue_refund')
                                                If plant is not available, please issue refund on that item
                                            {{--@elseif($option=='tax_exempt')
                                                I or my company is Tax Exempt. (Please email us copy of tax certificate)--}}
                                            @endif
                                        </li>
                                    @endforeach
                                    </ul>
                                @endif



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
    <script src="https://www.paypal.com/sdk/js?client-id=AZdCloEQ0CboLqDpStAhWMENbkqajvH43i1T30xMTAZgCO_GqmBINSGADQZkcD6_X4w85YLR033SekTG"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>

    <script>
        $(document).ready(function() {

            $(".btn-submit").click(function(e){

                e.preventDefault();

                //alert($("input[name='first_name']").val());

                var _token = $("input[name='_token']").val();

                var first_name = $("input[name='first_name']").val();
                var last_name = $("input[name='last_name']").val();

                var email_address = $("input[name='email_address']").val();
                var phone = $("input[name='phone']").val();

                var street_address = $("input[name='street_address']").val();
                var city = $("input[name='city']").val();
                var state = $("select[name='state']").val();
                var zip = $("input[name='zip']").val();

                var person = $("[name='person']:checked").val();

                var p_first_name = $("input[name='p_first_name']").val();
                var p_last_name = $("input[name='p_last_name']").val();
                var p_email_address = $("input[name='p_email_address']").val();
                var p_phone = $("input[name='p_phone']").val();
                var pickup_date = $("input[name='pickup_date']").val();
                var time = $("select[name='time']").val();

                var ids = new Array();
                $('input[name="preferred_pick_optinos[]"]:checked').each(function(){
                    ids.push($(this).val());
                });

                //alert(ids);

                var preferred_pick_optinos = JSON.stringify(ids);

                $.ajax({
                    url: "{{ route('checkout-store') }}",
                    type: 'POST',

                    data: {
                        _token: _token,
                        first_name: first_name,
                        last_name: last_name,
                        email_address: email_address,
                        phone: phone,
                        street_address: street_address,
                        city: city,
                        state: state,
                        zip: zip,
                        person: person,
                        p_first_name: p_first_name,
                        p_last_name: p_last_name,
                        p_email_address: p_email_address,
                        p_phone: p_phone,
                        pickup_date: pickup_date,
                        time: time,
                        preferred_pick_optinos: preferred_pick_optinos,
                    },

                    success: function (data) {
                        if(data == 'done') {
                            $(".error").css('display','none');
                            $(".btn-submit").css('display','none');
                            $("#paypal_plugin").css('display','block');
                        }
                        //alert(data);
                        /*alert(data);

                        if ($.isEmptyObject(data.error)) {

                            alert(data.success);

                        } else {

                            printErrorMsg(data.error);

                        }*/


                    },
                    error: function (err) {
                        if (err.status == 422) {
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



        function printErrorMsg (msg) {

            $(".print-error-msg").find("ul").html('');

            $(".print-error-msg").css('display','block');

            $.each( msg, function( key, value ) {

                $(".print-error-msg").find("ul").append('<li>'+value+'</li>');

            });

        }

        function formValidation() {
            if($("#create_pwd").is(':checked')) {
                if($("#pwd").val()=='') {
                    $("#pwd").css('border','1px solid #CA0000');
                    return false;
                }
                else {
                    $("#pwd").css('border','1px solid #ccc');
                    return true;
                }
            }
        }
    </script>

    <script>
        paypal.Buttons({
            createOrder: function(data, actions) {
                // This function sets up the details of the transaction, including the amount and line item details.
                return actions.order.create({
                    application_context: {
                        brand_name : 'Kansas Plant Farm',
                        user_action : 'PAY_NOW',
                        shipping_preference: 'NO_SHIPPING',
                    },
                    purchase_units: [{
                        amount: {
                            value: $("#total_val").val()
                        }
                    }],
                });
            },

            onApprove: function(data, actions) {

                let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // This function captures the funds from the transaction.
                return actions.order.capture().then(function(details) {
                    if(details.status == 'COMPLETED') {
                        var APP_URL = {!! json_encode(url('/')) !!}
                        return fetch(APP_URL+'/payment-confirmation', {
                            method: 'post',
                            headers: {
                                'content-type': 'application/json',
                                "Accept": "application/json, text-plain, */*",
                                "X-Requested-With": "XMLHttpRequest",
                                "X-CSRF-TOKEN": token
                            },
                            body: JSON.stringify({
                                orderId : data.orderID,
                                id : details.id,
                                amount: details.purchase_units[0].amount.value,
                                status: details.status,
                                payerEmail: details.payer.email_address,
                                payerFname: details.payer.name.given_name,
                                payerLname: details.payer.name.surname,

                            })
                        })
                            .then(status)
                            .then(function(response){
                                // redirect to the completed page if paid
                                window.location.href = APP_URL+'/pay-success';
                            })
                            .catch(function(error) {
                                // redirect to failed page if internal error occurs
                                window.location.href = APP_URL+'/pay-failed?reason=internalFailure';
                            });
                    } else{
                        window.location.href = APP_URL+'/pay-failed?reason=failedToCapture';
                    }
                });
            },

            onCancel: function (data) {
                window.location.href = APP_URL+'/pay-failed?reason=userCancelled';
            }



        }).render('#paypal-button-container');
        // This function displays Smart Payment Buttons on your web page.

        function status(res) {
            if (!res.ok) {
                throw new Error(res.statusText);
            }
            return res;
        }
    </script>
@endsection
