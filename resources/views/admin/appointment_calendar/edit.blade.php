@extends('admin.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('stylesheet')
    <link href="{{ asset('css/admin/css/jqueryui.css')  }}" rel="stylesheet">
    <link href="{{ asset('js/admin/dropzone_buildentory/css/dropzone.css')  }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/css/icon_fonts_assets/dripicons/webfont.css') }}">
    <style>
        .modal-backdrop{
            background-color: #fff;
        }
        .onboarding-modal .onboarding-content.with-gradient{
            padding-top: 20px;
        }
        .schedule_check {
            color: #000;
            text-decoration: none;
        }
        .schedule_check:hover {
            color: #000;
            text-decoration: none;
        }
    </style>
@endsection
@section('content')

    <form action="{{ route('admin-appointment-update') }}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
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

                                        <fieldset class="form-group">
                                            <legend><span>Update Appointment Calendar</span></legend>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <ul class="d-flex list-unstyled flex-wrap">
                                                        @php
                                                            $j = 0;
                                                        @endphp
                                                        @for($i=time()+86400; $i<=time()+(14*86400); $i+=86400)
                                                            @php $j++; @endphp
                                                            <li class="mx-2 my-3 border border-dark text-center" style="width: 75px; height: 105px">
                                                                <a class="schedule_check" href="#" class="text-dark text-decoration-none" data-target="#slideModal_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" data-toggle="modal">
                                                                    <span class="d-block py-1 border-dark border-bottom mb-1">
                                                                        {{ date('D', $i) }}
                                                                    </span>
                                                                    <span class="d-block font-weight-bold" style="font-size: 30px">{{ date('d', $i) }}</span>
                                                                    <span class="d-block" style="font-size: 12px">{{ date('M', $i) }}</span>
                                                                </a>
                                                            </li>

                                                        @endfor
                                                    </ul>
                                                </div>
                                            </div>
                                        </fieldset>
                                        <div class="form-buttons-w">
                                            <button class="btn btn-primary" name="submit" type="submit"> Update</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @php
            $j = 0;
        @endphp
        @for($i=time()+86400; $i<=time()+(14*86400); $i+=86400)
            @php $j++; @endphp
            <div aria-hidden="true" class="onboarding-modal modal fade animated" id="slideModal_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" role="dialog" tabindex="-1">
            <div class="modal-dialog modal-centered" role="document">
                <div class="modal-content text-center">
                    <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="os-icon os-icon-close"></span></button>
                    <div class="onboarding-slider-w">
                        <div class="onboarding-slide">
                            <div class="onboarding-content with-gradient">
                                <h4 class="onboarding-title">
                                    Schedules for {{ date('jS M (l)', $i) }}
                                </h4>
                                @php
                                    $a = strtolower(date('l', $i)).(($j<=7)?'_1':'_2');
                                    $b = 'all_'.$a;
                                    /*if($a == 'sunday_1') {
                                        echo 'rasel';
                                        echo  $calendar_info->$a;
                                        echo strlen($calendar_info->$a);
                                        exit;
                                    }*/

                                @endphp

                                <div id="all_checkbox_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}">
                                    <div class="row mb-3">
                                        <div class="col-12">
                                            <input id="all_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" onclick="checkAll('{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}')" name="all_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" value="1" @if($calendar_info->$b == 1) checked @endif>
                                            <label for="all_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">Select All</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="7am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="7.00 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("7.00 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="7am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">7:00 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="730am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="7.30 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("7.30 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="730am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">7:30 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="8am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="8.00 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("8.00 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="8am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">8:00 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="830am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="8.30 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("8.30 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="830am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">8:30 AM</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="9am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="9.00 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("9.00 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="9am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">9:00 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="930am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="9.30 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("9.30 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="930am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">9:30 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="10am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="10.00 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("10.00 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="10am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">10:00 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="1030am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="10.30 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("10.30 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="1030am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">10:30 AM</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="11am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="11.00 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("11.00 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="11am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">11:00 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="1130am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="11.30 AM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("11.30 AM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="1130am_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">11:30 AM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="12pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="12.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("12.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="12pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">12:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="1230pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="12.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("12.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="1230pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">12:30 PM</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="1pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="1.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("1.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="1pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">1:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="130pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="1.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("1.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="130pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">1:30 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="2pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="2.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("2.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="2pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">2:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="230pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="2.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("2.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="230pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">2:30 PM</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="3pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="3.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("3.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="3pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">3:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="330pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="3.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("3.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="330pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">3:30 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="4pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="4.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("4.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="4pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">4:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="430pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="4.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("4.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="430pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">4:30 PM</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="5pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="5.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("5.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="5pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">5:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="530pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="5.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("5.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="530pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">5:30 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="6pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="6.00 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("6.00 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="6pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">6:00 PM</label>
                                            </div>
                                        </div>
                                        <div class="col-3 text-left">
                                            <div class="form-group">
                                                <input id="630pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" type="checkbox" value="6.30 PM" name="{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}[]" @if($calendar_info->$a != 'null') @if(in_array("6.30 PM", json_decode($calendar_info->$a))) checked @endif @endif>
                                                <label for="630pm_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" class="form-check-label">6:30 PM</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="onboarding-slide">
                            <div class="onboarding-media">
                                <img alt="" src="img/bigicon6.png" width="200px">
                            </div>
                            <div class="onboarding-content with-gradient">
                                <h4 class="onboarding-title">
                                    Showcase App Features
                                </h4>
                                <div class="onboarding-text">
                                    In this example you can showcase some of the features of your application, it is very handy to make new users aware of your hidden features. You can use boostrap columns to split them up.
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <ul class="features-list">
                                            <li>
                                                Fully Responsive design
                                            </li>
                                            <li>
                                                Pre-built app layouts
                                            </li>
                                            <li>
                                                Incredible Flexibility
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-sm-6">
                                        <ul class="features-list">
                                            <li>
                                                Boxed & Full Layouts
                                            </li>
                                            <li>
                                                Based on Bootstrap 4
                                            </li>
                                            <li>
                                                Developer Friendly
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="onboarding-slide">
                            <div class="onboarding-media">
                                <img alt="" src="img/bigicon2.png" width="200px">
                            </div>
                            <div class="onboarding-content with-gradient">
                                <h4 class="onboarding-title">
                                    Example of onboarding screen!
                                </h4>
                                <div class="onboarding-text">
                                    This is an example of a multistep onboarding screen, you can use it to introduce your customers to your app, or collect additional information from them before they start using your app.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endfor
    </form>
@endsection
@section('javascript')
    <script>
        $(function(){
            $(".schedule_check").on('click', function (e) {
               e.preventDefault();
            });
        });

        function checkAll(x) {
            if($("#all_"+x).is(":checked")) {
                $("#all_checkbox_"+x).find("input[type=checkbox]").prop('checked',true);
            }
            else {
                $("#all_checkbox_"+x).find("input[type=checkbox]").prop('checked',false);
            }
        }
    </script>
@endsection
