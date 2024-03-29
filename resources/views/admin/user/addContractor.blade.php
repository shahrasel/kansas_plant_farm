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
<!--                    <div class="col-lg-6">
                        <div class="element-wrapper">
                            <h6 class="element-header">
                                Default Form Layout
                            </h6>
                            <div class="element-box">
                                <form>
                                    <h5 class="form-header">
                                        Default Layout
                                    </h5>
                                    <div class="form-desc">
                                        Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Email address</label><input class="form-control" placeholder="Enter email" type="email">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for=""> Password</label><input class="form-control" placeholder="Password" type="password">
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="">Confirm Password</label><input class="form-control" placeholder="Password" type="password">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Regular select</label><select class="form-control">
                                            <option>
                                                Select State
                                            </option>
                                            <option>
                                                New York
                                            </option>
                                            <option>
                                                California
                                            </option>
                                            <option>
                                                Boston
                                            </option>
                                            <option>
                                                Texas
                                            </option>
                                            <option>
                                                Colorado
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for=""> Multiselect</label><select class="form-control select2" multiple="true">
                                            <option selected="true">
                                                New York
                                            </option>
                                            <option selected="true">
                                                California
                                            </option>
                                            <option>
                                                Boston
                                            </option>
                                            <option>
                                                Texas
                                            </option>
                                            <option>
                                                Colorado
                                            </option>
                                        </select>
                                    </div>
                                    <fieldset class="form-group">
                                        <legend><span>Section Example</span></legend>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""> First Name</label><input class="form-control" placeholder="First Name" type="text">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Last Name</label><input class="form-control" placeholder="Last Name" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for=""> Date Picker</label>
                                                    <div class="date-input">
                                                        <input class="single-daterange form-control" placeholder="Date of birth" type="text" value="04/12/1978">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label for="">Twitter Username</label>
                                                    <div class="input-group">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">
                                                                @
                                                            </div>
                                                        </div>
                                                        <input class="form-control" placeholder="Twitter Username" type="text">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label> Example textarea</label><textarea class="form-control" rows="3"></textarea>
                                        </div>
                                    </fieldset>
                                    <div class="form-check">
                                        <label class="form-check-label"><input class="form-check-input" type="checkbox">I agree to terms and conditions</label>
                                    </div>
                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" type="submit"> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>-->
                    <div class="col-lg-12">
                        <div class="element-wrapper">
<!--                            <h6 class="element-header">
                                Horizontal Form Layout
                            </h6>-->
                            <div class="element-box">
                                <form action="" method="post">
                                    @csrf
                                    <h5 class="form-header">
                                        Add Contractor
                                    </h5>
<!--                                    <div class="form-desc">
                                        Discharge best employed your phase each the of shine. Be met even reason consider logbook redesigns. Never a turned interfaces among asking
                                    </div>-->
                                    <fieldset class="form-group">
                                        <legend><span>Basic Info</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> First Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter first name" type="text" name="firstname" value="{{ old('firstname') }}" required>
                                                @error('firstname')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Last Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter last name" type="text" name="lastname" value="{{ old('lastname') }}" required>
                                                @error('lastname')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Email</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter email" type="email" name="email" value="{{ old('email') }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Phone</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter phone" type="phone" name="phone" value="{{ old('phone') }}">
                                                @error('phone')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>ADDRESS DETAILS</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Company</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Company Name" type="text" name="company" value="{{ old('company') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Address 1</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Address 1" type="text" name="address1" value="{{ old('address1') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Address 2</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Address 2" type="text" name="address2" value="{{ old('address2') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> City</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter City" type="text" name="city" value="{{ old('city') }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> State</label>
                                            <div class="col-sm-8">
                                                <select class="form-control" name="state">
                                                    <option>-- Select State --</option>
                                                    @foreach(stateList() as $key=>$state)
                                                        <option value="{{ $key }}" {{ old('state') == $key ? 'selected' : '' }}> {{ $state }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Zip</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Enter Zip" type="text" name="zip" value="{{ old('zip') }}">
                                                @error('zip')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>Password</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for=""> Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Password" type="password" name="password" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-4" for="">Confirm Password</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" required>
                                                @error('password')
                                                    <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>

                                    </fieldset>
<!--                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-4" for=""> Regular select</label>
                                        <div class="col-sm-8">
                                            <select class="form-control">
                                                <option>
                                                    Select State
                                                </option>
                                                <option>
                                                    New York
                                                </option>
                                                <option>
                                                    California
                                                </option>
                                                <option>
                                                    Boston
                                                </option>
                                                <option>
                                                    Texas
                                                </option>
                                                <option>
                                                    Colorado
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-4" for=""> Multiselect</label>
                                        <div class="col-sm-8">
                                            <select class="form-control select2" multiple="true">
                                                <option selected="true">
                                                    New York
                                                </option>
                                                <option selected="true">
                                                    California
                                                </option>
                                                <option>
                                                    California
                                                </option>
                                                <option>
                                                    Boston
                                                </option>
                                                <option>
                                                    Texas
                                                </option>
                                                <option>
                                                    Colorado
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <fieldset class="form-group">
                                        <legend><span>Section Example</span></legend>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> First Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="First Name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> Last Name</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" placeholder="Last Name" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for="">Username</label>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">
                                                            @
                                                        </div>
                                                    </div>
                                                    <input class="form-control" placeholder="Twitter Username" type="text">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label" for=""> Date Picker</label>
                                            <div class="col-sm-8">
                                                <div class="date-input">
                                                    <input class="single-daterange form-control" placeholder="Date of birth" type="text" value="04/12/1978">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label">Example textarea</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" rows="3"></textarea>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group row">
                                        <label class="col-sm-4 col-form-label">Radio Buttons</label>
                                        <div class="col-sm-8">
                                            <div class="form-check">
                                                <label class="form-check-label"><input checked="" class="form-check-input" name="optionsRadios" type="radio" value="option1">Option number one</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" name="optionsRadios" type="radio" value="option2">Here is another radio option</label>
                                            </div>
                                            <div class="form-check">
                                                <label class="form-check-label"><input class="form-check-input" name="optionsRadios" type="radio" value="option3">Option three is here</label>
                                            </div>
                                        </div>
                                    </div>-->
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
