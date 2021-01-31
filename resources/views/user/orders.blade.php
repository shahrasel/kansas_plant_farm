@extends('layouts.app')

@section('custom_styles')
    <style>
        .nice-select {
            line-height: 45px;
        }
    </style>
@endsection
@section('content')
    <main>
        <!-- my account wrapper start -->
        <div class="my-account-wrapper section-padding">
            <div class="container">
                <div class="section-bg-color">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- My Account Page Start -->
                            <div class="myaccount-page-wrapper">
                                <!-- My Account Tab Menu Start -->
                                <div class="row">
                                    <div class="col-lg-3 col-md-4">
                                        <div class="myaccount-tab-menu nav" role="tablist">
                                            <a href="{{ route('dashboard') }}" ><i class="fa fa-dashboard"></i>
                                                Dashboard</a>
                                            <a href="{{ route('orders') }}" class="active" ><i class="fa fa-cart-arrow-down"></i>
                                                Orders</a>
                                            <a href="{{ route('my-profile') }}"><i class="fa fa-user"></i> My Profile</a>
                                            <form action="{{ url('/logout') }}" method="post">
                                                @csrf
                                                <button type="submit"><i class="fa fa-sign-out"></i> Logout</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- My Account Tab Menu End -->

                                    <!-- My Account Tab Content Start -->
                                    <div class="col-lg-9 col-md-8">
                                        <div class="tab-content" id="myaccountContent">
                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="dashboad" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Dashboard</h5>
                                                    <div class="welcome">
                                                        <p>Hello, <strong>Erik Jhonson</strong> (If Not <strong>Jhonson
                                                                !</strong><a href="login-register.html" class="logout"> Logout</a>)</p>
                                                    </div>
                                                    <p class="mb-0">From your account dashboard. you can easily check &
                                                        view your recent orders, manage your shipping and billing addresses
                                                        and edit your password and account details.</p>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade show active" id="orders" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Orders</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>Order</th>
                                                                <th>Date</th>
                                                                <th>Status</th>
                                                                <th>Total</th>
                                                                <th>Action</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>1</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Pending</td>
                                                                <td>$3000</td>
                                                                <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>2</td>
                                                                <td>July 22, 2018</td>
                                                                <td>Approved</td>
                                                                <td>$200</td>
                                                                <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>3</td>
                                                                <td>June 12, 2017</td>
                                                                <td>On Hold</td>
                                                                <td>$990</td>
                                                                <td><a href="cart.html" class="btn btn-sqr">View</a>
                                                                </td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                                <!--                                            <div class="tab-pane fade" id="download" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Downloads</h5>
                                                    <div class="myaccount-table table-responsive text-center">
                                                        <table class="table table-bordered">
                                                            <thead class="thead-light">
                                                            <tr>
                                                                <th>Product</th>
                                                                <th>Date</th>
                                                                <th>Expire</th>
                                                                <th>Download</th>
                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            <tr>
                                                                <td>Haven - Free Real Estate PSD Template</td>
                                                                <td>Aug 22, 2018</td>
                                                                <td>Yes</td>
                                                                <td><a href="#" class="btn btn-sqr"><i
                                                                            class="fa fa-cloud-download"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            <tr>
                                                                <td>HasTech - Profolio Business Template</td>
                                                                <td>Sep 12, 2018</td>
                                                                <td>Never</td>
                                                                <td><a href="#" class="btn btn-sqr"><i
                                                                            class="fa fa-cloud-download"></i>
                                                                        Download File</a></td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>-->
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                                <!--                                            <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Payment Method</h5>
                                                    <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                                </div>
                                            </div>-->
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                                <!--                                            <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Billing Address</h5>
                                                    <address>
                                                        <p><strong>Erik Jhonson</strong></p>
                                                        <p>1355 Market St, Suite 900 <br>
                                                            San Francisco, CA 94103</p>
                                                        <p>Mobile: (123) 456-7890</p>
                                                    </address>
                                                    <a href="#" class="btn btn-sqr"><i class="fa fa-edit"></i>
                                                        Edit Address</a>
                                                </div>
                                            </div>-->
                                            <!-- Single Tab Content End -->

                                            <!-- Single Tab Content Start -->
                                            <div class="tab-pane fade" id="account-info" role="tabpanel">
                                                <div class="myaccount-content">
                                                    <h5>Account Details</h5>
                                                    <div class="account-details-form">
                                                        <form action="{{ route('user-update') }}" method="post">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="first-name" class="required">First
                                                                            Name</label>
                                                                        <input type="text" id="first-name" name="firstname" value="{{ auth()->user()->firstname }}" required />
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6">
                                                                    <div class="single-input-item">
                                                                        <label for="last-name" class="required">Last
                                                                            Name</label>
                                                                        <input type="text" id="last-name" name="lastname" value="{{ auth()->user()->lastname }}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="email" class="required">Email Address</label>
                                                                <input type="email" id="email" name="email" value="{{ auth()->user()->email }}" required/>
                                                            </div>
                                                            <div class="single-input-item">
                                                                <label for="phone">Phone</label>
                                                                <input type="text" name="phone" value="{{ auth()->user()->phone }}"/>
                                                            </div>
                                                            <fieldset>
                                                                <legend>Additional Info</legend>
                                                                <div class="single-input-item">
                                                                    <label for="address1">Address 1</label>
                                                                    <input type="address1" name="address1" id="current-address1"  value="{{ auth()->user()->address1 }}"/>
                                                                </div>

                                                                <div class="single-input-item">
                                                                    <label for="address2">Address 2</label>
                                                                    <input type="address2" name="address2" id="current-address2"  value="{{ auth()->user()->address2 }}"/>
                                                                </div>

                                                                <div class="single-input-item">
                                                                    <label for="city">City</label>
                                                                    <input type="city" name="city" id="current-city" name="city" value="{{ auth()->user()->city }}"/>
                                                                </div>

                                                                <div class="single-input-item">
                                                                    <label for="state">State</label>
                                                                    <input type="state" name="state" id="current-state" name="state" value="{{ auth()->user()->state }}"/>
                                                                </div>

                                                                <div class="single-input-item">
                                                                    <label for="zip">Zip</label>
                                                                    <input type="zip" name="zip" id="current-zip" value="{{ auth()->user()->zip }}"/>
                                                                </div>
                                                            </fieldset>
                                                            <fieldset>
                                                                <legend>Password change</legend>
                                                                <div class="single-input-item">
                                                                    <label for="current-pwd" >Current
                                                                        Password</label>
                                                                    <input type="password" id="current-pwd" name="current_password" value=""/>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="new-pwd" >New
                                                                                Password</label>
                                                                            <input type="password" id="new-pwd" name="new_password" value=""/>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-lg-6">
                                                                        <div class="single-input-item">
                                                                            <label for="confirm-pwd" >Confirm
                                                                                Password</label>
                                                                            <input type="password" id="confirm-pwd" name="confirm_password"  value=""/>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                            <input name="id" type="hidden" value="{{ auth()->user()->id }}">
                                                            <div class="single-input-item">
                                                                <button class="btn btn-sqr" type="submit">Save Changes</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div> <!-- Single Tab Content End -->
                                        </div>
                                    </div> <!-- My Account Tab Content End -->
                                </div>
                            </div> <!-- My Account Page End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- my account wrapper end -->
    </main>
@endsection
@section('javascript')
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
@endsection
