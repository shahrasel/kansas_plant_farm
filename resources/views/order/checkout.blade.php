@extends('layouts.app')
@section('custom_meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('custom_styles')
    <link href="{{ asset('css/admin/css/jquery-ui.css?v=').time()  }}" rel="stylesheet">
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

        .contact-message form input, .contact-message form textarea {
            margin-bottom: 15px;
        }


    </style>
@endsection
@section('content')
    <main>
        <!-- checkout If plant is not available, please issue refund on that item main wrapper start -->
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
                                        @foreach($cart_lists as $cart_list)
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
                                        <div class="cart-calculator-wrapper">
                                            <div class="cart-calculate-items">
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
                                                            $p = $i;
                                                            $i += $tax_amount;
                                                        @endphp
                                                        @if($p <25)
                                                            <tr class="total">
                                                                <td>Processing Fee</td>
                                                                <td class="total-amount">$10.00</td>
                                                            </tr>
                                                        @endif
                                                        @php
                                                            $i += 10;
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

                                <input type="hidden" id="total_val" value="{{ str_replace(',','',number_format($i, 2, '.', ','))  }}">

                                <h5 class="checkout-title" id="checkout-title" style="margin-top:30px;">CUSTOMER CONTACT INFO</h5>

                                <div class="contact-message">
                                    <form id="contact-form" action="{{ route('checkout-store') }}" method="post" class="contact-form">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>First Name<span style="color:yellow">*</span></label>
                                                <input name="first_name" id="first_name" type="text" @if (Auth::check()) value="{{ Auth()->user()->firstname }}" @endif required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Last Name<span style="color:yellow">*</span></label>
                                                <input name="last_name" id="last_name" type="text" @if (Auth::check()) value="{{ Auth()->user()->lastname }}" @endif required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Email<span style="color:yellow">*</span></label>
                                                <input name="email_address" id="email_address" type="email" @if (Auth::check()) value="{{ Auth()->user()->email }}" @endif required>
                                            </div>
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Phone<span style="color:yellow">*</span></label>
                                                <input name="phone" id="phone" type="text" @if (Auth::check()) value="{{ Auth()->user()->phone }}" @endif required>
                                            </div>
                                            <div class="col-12 d-flex justify-content-center">
                                                <p class="form-Who will be picking up your ordermessege"></p>
                                            </div>
                                        </div>

<!--                                        <h5 class="checkout-title" style="margin-top: 30px;">Billing Address</h5>-->

                                        <!--                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <label>Street Address<span style="color:yellow">*</span></label>
                                                <input name="street_address" id="street_address" type="text" @if (Auth::check()) value="{{ Auth()->user()->address1 }}" @endif required>
                                            </div>

                                            <div class="col-lg-6 col-md-6 col-sm-6">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                                        <label>City<span style="color:yellow">*</span></label>
                                                        <input name="city" id="city" type="text" @if (Auth::check()) value="{{ Auth()->user()->city }}"  @endif required>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <label>State<span style="color:yellow">*</span></label>
                                                        <select name="state" id="state" required>
                                                            @foreach($state_lists as $key=>$state_list)
                                                                <option @if (Auth::check()) @if(Auth()->user()->state==$key) selected @endif @else @if($key=='KS') selected @endif @endif value="{{ $key }}">{{ $key }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-3 col-md-3 col-sm-3">
                                                        <label>Zip<span style="color:yellow">*</span></label>
                                                        <input name="zip" id="zip" type="text" @if (Auth::check()) value="{{ Auth()->user()->zip }}"  @endif required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>-->

                                        <h5 class="checkout-title" style="margin-top:30px;">Who will be picking up your order?</h5>

                                        <div>
                                            <div class="row">
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="radio" name="person" style="width: 5%"  value="self_customer" checked>&nbsp;I, as the customer, will pick up the purchased items
                                                    </label>
                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="radio" name="person" style="width: 5%" value="assign_other">&nbsp;I am assigning the following person to pick up my purchased items
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label>First Name</label>
                                                    <input name="p_first_name" id="p_first_name" type="text">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label>Last Name</label>
                                                    <input name="p_last_name" id="p_last_name"  type="text" required="">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label>Email</label>
                                                    <input name="p_email_address" id="p_email_address"  type="email" >
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <label>Phone</label>
                                                    <input name="p_phone" id="p_phone"  type="text" >
                                                </div>
                                                <div class="col-12 d-flex justify-content-center">
                                                    <p class="form-messege"></p>
                                                </div>
                                            </div>

                                            <h5 class="checkout-title" style="margin-top:30px;">Preferred pickup date</h5>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <input name="pickup_date" id="pickup_date" type="text" placeholder="Preferred date">
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6">
                                                    <select name="time" id="time">
                                                        <option value="">Select preferred time</option>
                                                        <option value="Morning">Morning</option>
                                                        <option value="Noonish">Noonish</option>
                                                        <option value="Early Afternoon">Early Afternoon</option>
                                                        <option value="Late Afternoon">Late Afternoon</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-10 col-md-10 col-sm-10">
                                                    <h6 style="margin-bottom:10px;margin-top:10px;">Please check all that apply:</h6>
                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="checkbox" name="preferred_pick_optinos[]" style="width: 5%" class="ids" value="substitute_plant_size">&nbsp;If plant is not available, I’m ok to substitute plant size. (equal or better value)
                                                    </label>

                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="checkbox" name="preferred_pick_optinos[]" style="width: 5%" class="ids" value="substitute_plant_variety">&nbsp;If plant is not available, I’m ok to substitute plant variety. (equal or better value)
                                                    </label>

                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="checkbox" name="preferred_pick_optinos[]" style="width: 5%" class="ids" value="back_order_1_month">&nbsp;If plant is not available, I’m ok to back-order. (Up to 1 month)
                                                    </label>

                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="checkbox" name="preferred_pick_optinos[]" style="width: 5%" class="ids" value="back_order_3_month">&nbsp;If plant is not available, I’m ok to back-order. (Up to 3 months)
                                                    </label>

                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input type="checkbox" name="preferred_pick_optinos[]" style="width: 5%" class="ids" value="issue_refund">&nbsp;If plant is not available, please issue refund on that item
                                                    </label>

                                                    <label style="width: 100%;cursor: pointer;height: 30px;">
                                                        <input id="sign_up_for_newsfeed" type="checkbox" name="preferred_pick_optinos[]" style="width: 5%" class="ids" value="sign_up_for_newsfeed">&nbsp;Sign up to be notified of Plant Sales and Upcomming Events
                                                    </label>


                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-lg-10 col-md-10 col-sm-10" style="display: block">
                                                    <input type="submit" class="btn btn-sqr btn-submit" value="Continue Checkout" style="max-width: 320px;background-color: #7fbc03 !important;color: #fff;border-color: #7fbc03;">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- Order Payment Method -->
                                <form action="" method="post">
                                    <div class="order-payment-method" id="paypal_plugin" style="display: none">
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
                                            <div id="paypal-button-container" style="background-color: #fff;padding: 15px;border-radius: 10px;text-align: center"></div>
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
    <script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
    <script src="https://www.paypal.com/sdk/js?client-id=AQ7wokyQGbKXrn7ygdKEqf7rH69I4GLOjJp_4CPvlvGVzLhNzsWjgzhrj7JPAHFBNglqpSH1dz-YWb4K"> // Replace YOUR_SB_CLIENT_ID with your sandbox client ID
    </script>

    <script>
        $(document).ready(function() {


            // Open the Modal
            $("#sign_up_for_newsfeed").change(function(e) {
                e.preventDefault();
                if(this.checked) {
                    $("#myModal").fadeIn("slow");
                }
            });




            jQuery('#pickup_date').datepicker({
                /*timeFormat: "hh:mm tt",*/
            });

            $(".btn-submit").click(function(e){
                e.preventDefault();
                var $target = e.currentTarget;

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
                    },
                    error: function (err) {

                        if (err.status == 422) {
                            $('span.error').remove();

                            $.each(err.responseJSON.errors, function (i, error) {
                                var el = $(document).find('[name="' + i + '"]');
                                if (error[0] == 'The p first name field is required.')
                                    error[0] = 'The first name field is required';
                                if (error[0] == 'The p last name field is required.')
                                    error[0] = 'The last name field is required';
                                if (error[0] == 'The p email address field is required.')
                                    error[0] = 'The email field is required';
                                if (error[0] == 'The p phone field is required.')
                                    error[0] = 'The phone field is required';

                                el.after($('<span style="color: red;" class="error">' + error[0] + '</span>'));
                            });

                            $('html, body').animate({
                                scrollTop: $("#checkout-title").offset().top
                            }, 500);
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
                    /*
                        for(key in details){
                            console.log(key);//for key name in your case it will be bar
                            console.log(details[key]);// for key value in your case it will be baz
                        }
                    */
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
                                orderId : details.purchase_units[0].payments.captures[0].id,
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
                                //alert(response);
                                window.location.href = APP_URL+'/pay-success';

                            })
                            .catch(function(error) {
                                //alert('456');
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
