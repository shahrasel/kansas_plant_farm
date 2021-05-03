@extends('layouts.app')
@section('custom_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('custom_styles')
    <style>
        .nice-select {
            line-height: 45px;
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
                    <div class="col-lg-8" style="margin: auto">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Your Order Summary</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    @if(!$cart_lists->isEmpty())
                                        <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Products</th>
                                            <th>Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                            @endphp
                                            @foreach($cart_lists as $cart_list)
                                                <tr>
                                                    <td><a href="{{ url('/plants') }}/{{ $cart_list->product->slug }}">{{ $cart_list->product->common_name }} <strong> × {{ $cart_list->quantity }}</strong></a>
                                                    </td>
                                                    <td>
                                                        ${{ number_format($cart_list->quantity*$cart_list->unit_price, 2, '.', ',') }}
                                                    </td>
                                                </tr>
                                                @php
                                                    $i += $cart_list->quantity*$cart_list->unit_price;
                                                @endphp
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <td>Sub Total</td>
                                            <td><strong>${{ number_format($i, 2, '.', ',') }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Sales Tax (8.25%)</td>
                                            <td><strong>${{ number_format(8.25/100*$i, 2, '.', ',') }}</strong></td>
                                        </tr>
                                        @php
                                            $i += 8.25/100*$i;
                                        @endphp
                                        <tr>
                                            <td>Total</td>
                                            <td><strong>${{ number_format($i, 2, '.', ',') }}</strong></td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                        <input type="hidden" id="total_val" value="{{ number_format($i, 2, '.', ',') }}">
                                    @else
                                        <p>No product is added to the cart!</p>
                                    @endif
                                </div>

                                <h5 class="checkout-title" style="margin-top:30px;">Who will be picking up your order?</h5>

                                <div class="contact-message">
                                    <form id="contact-form" action="assets/php/mail.php" method="post" class="contact-form">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input name="first_name" placeholder="First Name" type="text">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input name="phone" placeholder="Last Name" type="text" required="">
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input name="email_address" placeholder="Email" type="email" >
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <input name="phone" placeholder="Phone" type="text" >
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="form-messege"></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>


                                <!-- Order Payment Method -->
                                <form action="" method="post">
                                    <div class="order-payment-method">
<!--                                   <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="paymentmethod" value="cash" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">Cash On Pickup</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="cash">
                                            <p>Pay with cash upon delivery.</p>
                                        </div>
                                    </div>-->
                                    <!--
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank" name="paymentmethod" value="bank" class="custom-control-input" />
                                                <label class="custom-control-label" for="directbank">Direct Bank
                                                    Transfer</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="bank">
                                            <p>Make your payment directly into our bank account. Please use your Order
                                                ID as the payment reference. Your order will not be shipped until the
                                                funds have cleared in our account..</p>
                                        </div>
                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="checkpayment" name="paymentmethod" value="check" class="custom-control-input" />
                                                <label class="custom-control-label" for="checkpayment">Pay with
                                                    Check</label>
                                            </div>
                                        </div>
                                        <div class="payment-method-details" data-method="check">
                                            <p>Please send a check to Store Name, Store Street, Store Town, Store State
                                                / County, Store Postcode.</p>
                                        </div>
                                    </div>-->
<!--                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
&lt;!&ndash;                                            <div class="custom-control custom-radio">&ndash;&gt;
&lt;!&ndash;                                                <input type="radio" id="paypalpayment" name="paymentmethod" value="paypal" class="custom-control-input" />&ndash;&gt;
                                                <label class="custom-control-label remove" for="paypalpayment">Paypal <img src="{{ asset('img/paypal-card.jpg') }}" class="img-fluid paypal-card" alt="Paypal" /></label>
&lt;!&ndash;                                            </div>&ndash;&gt;
                                        </div>
                                        <div class="payment-method-details" data-method="paypal">
                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a
                                                PayPal account.</p>
                                        </div>
                                    </div>-->
                                    <div class="summary-footer-area">
<!--                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">I have read and agree to
                                                the website <a href="index.html">terms and conditions.</a></label>
                                        </div>-->
                                        <p style="color: yellow"><b>PLEASE NOTE</b>: All orders are curbside pickup only</p>
                                        <div id="paypal-button-container" style="background-color: #fff;padding: 15px;border-radius: 10px;"></div>
                                    </div>
                                </div>
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
    <script src="https://www.paypal.com/sdk/js?client-id=AZdCloEQ0CboLqDpStAhWMENbkqajvH43i1T30xMTAZgCO_GqmBINSGADQZkcD6_X4w85YLR033SekTG"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>

    <script>
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
