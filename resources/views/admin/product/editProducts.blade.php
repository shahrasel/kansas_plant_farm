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
            <div class="content-box"><div class="row">
                    <div class="col-lg-12">
                        <div class="element-wrapper">
                            <div class="element-box">
                                <form action="{{ url('/admin/update-product') }}" method="post">
                                    @method('PUT')
                                    @csrf
                                    <h5 class="form-header">
                                        Edit Product
                                    </h5>
                                    <fieldset class="form-group">
                                        <legend><span>Basic Info</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Botanical Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter botanical name" type="text" name="botanical_name" value="{{ $product->botanical_name }}" required>
                                                @error('botanical_name')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Common Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Common name" type="text" name="common_name" value="{{ $product->common_name }}" required>
                                                @error('common_name')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Featured</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="checkbox" name="is_featured" value="1" @if($product->is_featured==1) checked @endif>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Featured Order</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Featured Order" type="text" name="featured_order" value="{{ $product->featured_order }}">
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>PRODUCT AVAILABILITY</span></legend>


                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Inventory Count A</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Inventory Count A" type="text" name="inventory_count_a" value="{{ $product->inventory_count_a }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Inventory Count B</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Inventory Count B" type="text" name="inventory_count_b" value="{{ $product->inventory_count_b }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Inventory Count C</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Inventory Count C" type="text" name="inventory_count_c" value="{{ $product->inventory_count_c }}">
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>PRODUCT POT SIZES</span></legend>


                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> POT SIZE A</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Pot Size A" type="text" name="pot_size_a" value="{{ $product->pot_size_a }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> POT SIZE B</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Pot Size B" type="text" name="pot_size_b" value="{{ $product->pot_size_b }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> POT SIZE C</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Pot Size C" type="text" name="pot_size_c" value="{{ $product->pot_size_c }}">
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>PRODUCT RETAIL PRICES</span></legend>


                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Retail Sale Price A</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Retail Sale Price A" type="text" name="retail_sale_price_a" value="{{ $product->retail_sale_price_a }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Retail Sale Price B</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Retail Sale Price B" type="text" name="retail_sale_price_b" value="{{ $product->retail_sale_price_b }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Retail Sale Price C</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Retail Sale Price C" type="text" name="retail_sale_price_c" value="{{ $product->retail_sale_price_c }}">
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>OTHER INFO</span></legend>


                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> STATUS</label>
                                            <div class="col-sm-8">
                                                <select name="status" class="form-control">
                                                    <option value="">-- SELECT --</option>
                                                    <option value="ACTIVE" @if($product->status == 'ACTIVE') selected @endif>ACTIVE</option>
                                                    <option value="INACTIVE" @if($product->status == 'INACTIVE') selected @endif>INACTIVE</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> BEST SELLER</label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" name="best_sellers" value="YES" @if($product->best_sellers == 'YES') checked @endif>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> NEW FOR THIS YEAR</label>
                                            <div class="col-sm-8">
                                                <input type="checkbox" name="new_for_this_year" value="YES" @if($product->new_for_this_year == 'YES') checked @endif>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> DATE ENTERED</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Select a date" type="text" name="date_entered" value="{{ $product->date_entered }}">
                                            </div>
                                        </div>

                                    </fieldset>

                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit"> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!--                <div class="element-wrapper">
                                    <h6 class="element-header">
                                        Inline Form Example
                                    </h6>
                                    <div class="element-box">
                                        <h5 class="form-header">
                                            Inline Form
                                        </h5>
                                        <div class="form-desc">
                                            Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
                                        </div>
                                        <form class="form-inline">
                                            <label class="sr-only"> First Name</label><input class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="First Name" type="text"><label class="sr-only"> Last Name</label><input class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Last Name" type="text"><label class="sr-only"> Username</label>
                                            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                                                <div class="input-group-prepend">
                                                    <div class="input-group-text">
                                                        @
                                                    </div>
                                                </div>
                                                <input class="form-control" placeholder="Username" type="text">
                                            </div>
                                            <button class="btn btn-primary" type="submit"> Submit</button>
                                        </form>
                                    </div>
                                </div>-->
                <!--------------------
              START - Color Scheme Toggler
              -------------------->
                <!--                <div class="floated-colors-btn second-floated-btn">
                                    <div class="os-toggler-w">
                                        <div class="os-toggler-i">
                                            <div class="os-toggler-pill"></div>
                                        </div>
                                    </div>
                                    <span>Dark </span><span>Colors</span>
                                </div>-->
                <!--------------------
                END - Color Scheme Toggler
                --------------------><!--------------------
              START - Demo Customizer
              -------------------->
                <!--                <div class="floated-customizer-btn third-floated-btn">
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
                                </div>-->
                <!--------------------
                END - Demo Customizer
                --------------------><!--------------------
              START - Chat Popup Box
              -------------------->
                <!--                <div class="floated-chat-btn">
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
                                </div>-->
                <!--------------------
                END - Chat Popup Box
                -------------------->
            </div>
        </div>
    </div>
@endsection
