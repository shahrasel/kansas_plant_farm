@extends('admin.app')
@section('stylesheet')
    <link href="{{ asset('css/admin/css/jquery-ui.css?v=').time()  }}" rel="stylesheet">
    <link rel="stylesheet" media="all" type="text/css" href="{{ asset('css/admin/css/jquery-ui-timepicker-addon.css?v=').time() }}" />
@endsection
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
        <div class="content-i">
            <div class="content-box"><div class="row">
                    <div class="col-lg-12">
                        <div class="element-wrapper">
                            <div class="element-box">
                                <form action="{{ url('/admin/billboards/'.$billboard->id) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <h5 class="form-header">
                                        Edit Billboard
                                    </h5>
                                    <fieldset class="form-group">

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Heading</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="Enter heading" type="text" name="heading" value="{{ $billboard->heading }}" >
                                                @error('heading')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Sub-Heading</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="Enter Sub-heading" type="text" name="subheading" value="{{ $billboard->subheading }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Button Text</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="Enter button text" type="text" name="button_text" value="{{ $billboard->button_text }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Button URL</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="Enter button URL" type="text" name="button_url" value="{{ $billboard->button_url }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Image</label>
                                            <div class="col-sm-9">
                                                @if(!empty($billboard->image))
                                                    <img src="{{ asset('img/billboard/'.$billboard->image) }}" style="width: 100px;"><br/><br/>
                                                @endif
                                                <input type="file" name="image" />
                                            </div>
                                            @error('image')
                                            <p style="color: #ff0000">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Billboard Order</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" required placeholder="Enter billboard Order" type="text" name="order" value="{{ $billboard->order }}" >
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Status</label>
                                            <div class="col-sm-9">
                                                <select name="status" class="form-control" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="1" @if($billboard->status=='1') selected @endif>Active</option>
                                                    <option value="0" @if($billboard->status=='0') selected @endif>Inactive</option>
                                                </select>
                                            </div>
                                        </div>


                                    </fieldset>


                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" name="submit" type="submit"> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('javascript')
    <script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>

    <script type="text/javascript" src="{{ asset('js/admin/jquery-ui-timepicker-addon.js')  }}"></script>
    <script>
        jQuery(function(){
            jQuery('#start_date').datetimepicker({
                timeFormat: "hh:mm tt",
            });

            jQuery('#end_date').datetimepicker({
                timeFormat: "hh:mm tt",
            });
        });
    </script>
@endsection
