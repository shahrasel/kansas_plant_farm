@extends('admin.app')
@section('content')
    <div class="content-w">
        <!--------------------
        START - Top Bar
        -------------------->
        <div class="top-bar color-scheme-transparent">
            <!--------------------
            START - Top Menu Controls
            -------------------->
            <div class="top-menu-controls">
                <div class="element-search autosuggest-search-activator">
                    <input placeholder="Start typing to search..." type="text">
                </div>
                <!--------------------
                START - Messages Link in secondary top menu
                -------------------->
                <div class="messages-notifications os-dropdown-trigger os-dropdown-position-left">
                    <i class="os-icon os-icon-mail-14"></i>
                    <div class="new-messages-count">
                        12
                    </div>
                    <div class="os-dropdown light message-list">
                        <ul>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            John Mayers
                                        </h6>
                                        <h6 class="message-title">
                                            Account Update
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar2.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Phil Jones
                                        </h6>
                                        <h6 class="message-title">
                                            Secutiry Updates
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar3.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Bekky Simpson
                                        </h6>
                                        <h6 class="message-title">
                                            Vacation Rentals
                                        </h6>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <div class="user-avatar-w">
                                        <img alt="" src="img/avatar4.jpg">
                                    </div>
                                    <div class="message-content">
                                        <h6 class="message-from">
                                            Alice Priskon
                                        </h6>
                                        <h6 class="message-title">
                                            Payment Confirmation
                                        </h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--------------------
                END - Messages Link in secondary top menu
                --------------------><!--------------------
              START - Settings Link in secondary top menu
              -------------------->
                <div class="top-icon top-settings os-dropdown-trigger os-dropdown-position-left">
                    <i class="os-icon os-icon-ui-46"></i>
                    <div class="os-dropdown">
                        <div class="icon-w">
                            <i class="os-icon os-icon-ui-46"></i>
                        </div>
                        <ul>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-49"></i><span>Profile Settings</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-grid-10"></i><span>Billing Info</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-44"></i><span>My Invoices</span></a>
                            </li>
                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-ui-15"></i><span>Cancel Account</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--------------------
                END - Settings Link in secondary top menu
                --------------------><!--------------------
              START - User avatar and menu in secondary top menu
              -------------------->
                <div class="logged-user-w">
                    <div class="logged-user-i">
                        <div class="avatar-w">
                            <img alt="" src="img/avatar1.jpg">
                        </div>
                        <div class="logged-user-menu color-style-bright">
                            <div class="logged-user-avatar-info">
                                <div class="avatar-w">
                                    <img alt="" src="img/avatar1.jpg">
                                </div>
                                <div class="logged-user-info-w">
                                    <div class="logged-user-name">
                                        Maria Gomez
                                    </div>
                                    <div class="logged-user-role">
                                        Administrator
                                    </div>
                                </div>
                            </div>
                            <div class="bg-icon">
                                <i class="os-icon os-icon-wallet-loaded"></i>
                            </div>
                            <ul>
                                <li>
                                    <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_big.html"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                                </li>
                                <li>
                                    <a href="#"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - User avatar and menu in secondary top menu
                -------------------->
            </div>
            <!--------------------
            END - Top Menu Controls
            -------------------->
        </div>
        <!--------------------
        END - Top Bar
        --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
<!--        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.html">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="index.html">Products</a>
            </li>
            <li class="breadcrumb-item">
                <span>Laptop with retina screen</span>
            </li>
        </ul>-->
        <!--------------------
        END - Breadcrumbs
        -------------------->
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
<!--                    <h6 class="element-header">
                        Data Tables
                    </h6>-->
                    <div class="element-box">
                        <div class="row">
                            <div class="col-6">
                                <h5 class="form-header">
                                    Order# {{ $oderInfo->orderid }}
                                </h5>
                            </div>
                            <div class="col-6 text-right">
                                <a target="_blank" href="{{ url('/admin/orderprint') }}/{{ $oderInfo->id }}" class="btn btn-success">Print</a>
                            </div>
                        </div>

                        <div class="table-responsive" style="margin-bottom: 50px;">
                            <table id="dataTable10" width="100%" class="table table-striped table-lightfont">
                                <thead>
                                    <tr>
                                        <th>Product Image</th><th>Product</th><th>Size</th><th>Price</th><th>Quantity</th><th>Total</th>
                                    </tr></thead>
<!--                                <tfoot>
                                    <tr><th>Product Image</th><th>Product</th><th>Price</th><th>Quantity</th><th>Total</th></tr>
                                </tfoot>-->
                                <tbody>
                                    @php
                                        $i=0;
                                        $tax_amount = 0;
                                    @endphp
                                    @forelse($orderdetails_lists as $orderdetails_list)
                                        <tr>
                                            <td><a href="{{ url('/plants') }}/{{ $orderdetails_list->product->slug }}">
<!--                                                    <img class="img-fluid" src="{{ asset('plants_images/5.jpg') }}" style="max-width: 100px;" alt="Product" />-->

                                                    @if(!empty(($orderdetails_list->product->getImage($orderdetails_list->product))))
                                                        <img class="pri-img" style="width: 120px" src="{{ url($orderdetails_list->product->getImage($orderdetails_list->product)) }}" alt="product">

                                                    @else
                                                        <img class="pri-img" style="width: 120px" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                    @endif

                                                </a>
                                            </td>

                                            <td><a href="{{ url('/plants') }}/{{ $orderdetails_list->product->slug }}">{{ $orderdetails_list->product->common_name }}</a></td>

                                            <td>{{ $orderdetails_list->size }}</td>
                                            <td>${{ $orderdetails_list->unit_price }}</td>
                                            <td>{{ $orderdetails_list->quantity }}</td>
                                            <td>${{ number_format(($orderdetails_list->unit_price*$orderdetails_list->quantity), 2, '.', ',') }}</td>
                                        </tr>
                                        @php
                                            $i += $orderdetails_list->quantity*$orderdetails_list->unit_price;
                                            if($orderdetails_list->product->tax_free !='YES') {
                                                $tax_amount += 9.30/100*($orderdetails_list->quantity*$orderdetails_list->unit_price);
                                            }
                                        @endphp
                                    @empty
                                            <tr>
                                                <td colspan="5">No data found</td>
                                            </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">

                                <form action="" method="post">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="mr-3" style="width: 80%">
                                            <select class="form-control" name="sales_id" >
                                                @foreach($sale_lists as $sale_list)
                                                    <option value="">-- Select Sales Agent --</option>
                                                    <option value="{{ $sale_list->id }}" @if($sale_list->id==$oderInfo->sales_id) selected @endif>{{ $sale_list->firstname }} {{ $sale_list->lastname }} ({{ $sale_list->email }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div>
                                            <input type="submit" class="btn btn-primary py-2" value="Update">
                                        </div>
                                    </div>
                                </form>

                                <br/>
                                <form action="" method="post">
                                    @csrf
                                    <div class="d-flex">
                                        <div class="mr-3" style="width: 80%">
                                            <select class="form-control" name="status">
                                                <option value="Payment Completed" @if($oderInfo->status=='Payment Completed') selected @endif >Payment Completed</option>
                                                <option value="Customer Picked Up" @if($oderInfo->status=='Customer Picked Up') selected @endif >Customer Picked Up</option>
                                            </select>
                                        </div>
                                        <div>
                                            <input type="submit" name="change_status" value="Update" class="btn btn-primary py-2">
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-6">
                                <!-- Cart Calculation Area -->
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
<!--                                        <h6>Amount</h6>-->
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
                                                        <td class="total-amount">$5.00</td>
                                                    </tr>
                                                    {{ $i += 5 }}
                                                @endif

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

                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset class="form-group">
                                    <legend><span>CUSTOMER INFORMATION</span></legend>
                                    <p><b>First Name:</b> {{ $order_additional_info->first_name }}</p>
                                    <p><b>Last Name:</b> {{ $order_additional_info->last_name }}</p>
                                    <p><b>Email:</b> {{ $order_additional_info->email_address }}</p>
                                    <p><b>Phone:</b> {{ $order_additional_info->phone }}</p>
                                </fieldset>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset class="form-group">
                                    <legend><span>BILLING INFORMATION</span></legend>
                                    <p><b>Address:</b> {{ $order_additional_info->street_address }}</p>
                                    <p><b>City:</b> {{ $order_additional_info->city }}</p>
                                    <p><b>State:</b> {{ $order_additional_info->state }}</p>
                                    <p><b>Zip:</b> {{ $order_additional_info->zip }}</p>
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset class="form-group">
                                    <legend><span>PICKUP PERSON</span></legend>
                                    @if($order_additional_info->person == 'self_customer')
                                        <p>I, as the customer, will pickup the purchased item(s).</p>
                                    @else
                                        <p>I am assigning the following person to pick up my purchased item:</p>
                                        <p><b>First Name:</b> {{ $order_additional_info->p_first_name }}</p>
                                        <p><b>Last Name:</b> {{ $order_additional_info->p_last_name }}</p>
                                        <p><b>Email:</b> {{ $order_additional_info->p_email_address }}</p>
                                        <p><b>Phone:</b> {{ $order_additional_info->p_phone }}</p>
                                    @endif
                                </fieldset>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <fieldset class="form-group">
                                    <legend><span>PREFERRED PICKUP DATE/TIME</span></legend>
                                    <p><b>Date:</b> {{ $order_additional_info->pickup_date }}</p>
                                    <p><b>Time:</b> {{ $order_additional_info->time }}</p>
                                </fieldset>
                            </div>
                        </div>

                            @php
                                if(!empty(json_decode($order_additional_info->preferred_pick_optinos))) {
                                    $options = json_decode($order_additional_info->preferred_pick_optinos);
                                }
                            @endphp

                            @if(!empty($options))
                            <div class="row">
                                <div class="col-sm-12">
                                    <fieldset class="form-group">
                                        <legend><span>IMPORTANT INFORMATION</span></legend>
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
                                    </fieldset>
                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                </div><!--------------------
              START - Color Scheme Toggler
              -------------------->
                <div class="floated-colors-btn second-floated-btn">
                    <div class="os-toggler-w">
                        <div class="os-toggler-i">
                            <div class="os-toggler-pill"></div>
                        </div>
                    </div>
                    <span>Dark </span><span>Colors</span>
                </div>
                <!--------------------
                END - Color Scheme Toggler
                --------------------><!--------------------
              START - Demo Customizer
              -------------------->
                <div class="floated-customizer-btn third-floated-btn">
                    <div class="icon-w">
                        <i class="os-icon os-icon-ui-46"></i>
                    </div>
                    <span>Customizer</span>
                </div>
                <div class="floated-customizer-panel">
                    <div class="fcp-content">
                        <div class="close-customizer-btn">
                            <i class="os-icon os-icon-x"></i>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Menu Settings
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Menu Position</label><select class="menu-position-selector">
                                        <option value="left">
                                            Left
                                        </option>
                                        <option value="right">
                                            Right
                                        </option>
                                        <option value="top">
                                            Top
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Menu Style</label><select class="menu-layout-selector">
                                        <option value="compact">
                                            Compact
                                        </option>
                                        <option value="full">
                                            Full
                                        </option>
                                        <option value="mini">
                                            Mini
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field with-image-selector-w">
                                    <label for="">With Image</label><select class="with-image-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Menu Color</label>
                                    <div class="fcp-colors menu-color-selector">
                                        <div class="color-selector menu-color-selector color-bright selected"></div>
                                        <div class="color-selector menu-color-selector color-dark"></div>
                                        <div class="color-selector menu-color-selector color-light"></div>
                                        <div class="color-selector menu-color-selector color-transparent"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Sub Menu
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Sub Menu Style</label><select class="sub-menu-style-selector">
                                        <option value="flyout">
                                            Flyout
                                        </option>
                                        <option value="inside">
                                            Inside/Click
                                        </option>
                                        <option value="over">
                                            Over
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Sub Menu Color</label>
                                    <div class="fcp-colors">
                                        <div class="color-selector sub-menu-color-selector color-bright selected"></div>
                                        <div class="color-selector sub-menu-color-selector color-dark"></div>
                                        <div class="color-selector sub-menu-color-selector color-light"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="fcp-group">
                            <div class="fcp-group-header">
                                Other Settings
                            </div>
                            <div class="fcp-group-contents">
                                <div class="fcp-field">
                                    <label for="">Full Screen?</label><select class="full-screen-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Show Top Bar</label><select class="top-bar-visibility-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Above Menu?</label><select class="top-bar-above-menu-selector">
                                        <option value="yes">
                                            Yes
                                        </option>
                                        <option value="no">
                                            No
                                        </option>
                                    </select>
                                </div>
                                <div class="fcp-field">
                                    <label for="">Top Bar Color</label>
                                    <div class="fcp-colors">
                                        <div class="color-selector top-bar-color-selector color-bright selected"></div>
                                        <div class="color-selector top-bar-color-selector color-dark"></div>
                                        <div class="color-selector top-bar-color-selector color-light"></div>
                                        <div class="color-selector top-bar-color-selector color-transparent"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Demo Customizer
                --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
                <div class="floated-chat-btn">
                    <i class="os-icon os-icon-mail-07"></i><span>Demo Chat</span>
                </div>
                <div class="floated-chat-w">
                    <div class="floated-chat-i">
                        <div class="chat-close">
                            <i class="os-icon os-icon-close"></i>
                        </div>
                        <div class="chat-head">
                            <div class="user-w with-status status-green">
                                <div class="user-avatar-w">
                                    <div class="user-avatar">
                                        <img alt="" src="img/avatar1.jpg">
                                    </div>
                                </div>
                                <div class="user-name">
                                    <h6 class="user-title">
                                        John Mayers
                                    </h6>
                                    <div class="user-role">
                                        Account Manager
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="chat-messages">
                            <div class="message">
                                <div class="message-content">
                                    Hi, how can I help you?
                                </div>
                            </div>
                            <div class="date-break">
                                Mon 10:20am
                            </div>
                            <div class="message">
                                <div class="message-content">
                                    Hi, my name is Mike, I will be happy to assist you
                                </div>
                            </div>
                            <div class="message self">
                                <div class="message-content">
                                    Hi, I tried ordering this product and it keeps showing me error code.
                                </div>
                            </div>
                        </div>
                        <div class="chat-controls">
                            <input class="message-input" placeholder="Type your message here..." type="text">
                            <div class="chat-extra">
                                <a href="#"><span class="extra-tooltip">Attach Document</span><i class="os-icon os-icon-documents-07"></i></a><a href="#"><span class="extra-tooltip">Insert Photo</span><i class="os-icon os-icon-others-29"></i></a><a href="#"><span class="extra-tooltip">Upload Video</span><i class="os-icon os-icon-ui-51"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--------------------
                END - Chat Popup Box
                -------------------->
            </div>
        </div>
    </div>
@endsection
