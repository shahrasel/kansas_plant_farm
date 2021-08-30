@extends('admin.app')
<meta name="csrf-token" content="{{ csrf_token() }}">
@section('stylesheet')
    <link href="{{ asset('css/admin/css/jqueryui.css')  }}" rel="stylesheet">
    <link href="{{ asset('js/admin/dropzone_buildentory/css/dropzone.css')  }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/admin/css/icon_fonts_assets/dripicons/webfont.css') }}">
    <style>
        #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
        }

        #myImg:hover {opacity: 0.7;}

        /* The Modal (background) */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 30px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
        }

        /* Modal Content (image) */
        .modal-content {
            margin: auto;
            display: block;
            width: 60%;
            max-width: 700px;
            /*max-height: 90%;*/
        }

        /* Caption of Modal Image */
        #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
        }

        /* Add Animation */
        .modal-content, #caption {
            -webkit-animation-name: zoom;
            -webkit-animation-duration: 0.6s;
            animation-name: zoom;
            animation-duration: 0.6s;
        }

        @-webkit-keyframes zoom {
            from {-webkit-transform:scale(0)}
            to {-webkit-transform:scale(1)}
        }

        @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
        }

        /* The Close Button */
        .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
        }

        .close:hover,
        .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
        }

        /* 100% Image Width on Smaller Screens */
        @media only screen and (max-width: 700px){
            .modal-content {
                width: 100%;
            }
        }
    </style>
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
                                <form action="{{ url('/admin/settings/'.$settings_info->id) }}" method="post" enctype="multipart/form-data">
                                    @method('put')
                                    @csrf
                                    <h5 class="form-header">
                                        Edit Settings
                                    </h5>
                                    <fieldset class="form-group">
                                        <legend><span>Homepage Description Info</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Homepage Description</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" style="height: 150px" name="home_description">{{ $settings_info->home_description }}</textarea>

                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Homepage Video Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" placeholder="Enter Homepage Video link" type="text" name="home_description_video"  value="{{ $settings_info->home_description_video }}">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>Shop By Seasons Links</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Spring Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="spring_plant_link"  value="{{ $settings_info->spring_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Summer Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="summer_plant_link"  value="{{ $settings_info->summer_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Fall Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="fall_plant_link"  value="{{ $settings_info->fall_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Winter Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="winter_plant_link"  value="{{ $settings_info->winter_plant_link }}">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>Shop By Colors Links</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Red Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="red_plant_link"  value="{{ $settings_info->red_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Orange Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="orange_plant_link"  value="{{ $settings_info->orange_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Yellow Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="yellow_plant_link"  value="{{ $settings_info->yellow_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Green Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="green_plant_link"  value="{{ $settings_info->green_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Blue Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="blue_plant_link"  value="{{ $settings_info->blue_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Lavendar Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="lavendar_plant_link"  value="{{ $settings_info->lavendar_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Purple Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="purple_plant_link"  value="{{ $settings_info->purple_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Pink Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="pink_plant_link"  value="{{ $settings_info->pink_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Magenta Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="magenta_plant_link"  value="{{ $settings_info->magenta_plant_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> White Plant Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="white_plant_link"  value="{{ $settings_info->white_plant_link }}">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>Social Media Links</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Facebook Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="facebook_link"  value="{{ $settings_info->facebook_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Twitter Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="twitter_link"  value="{{ $settings_info->twitter_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Instagram Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="instagram_link"  value="{{ $settings_info->instagram_link }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Youtube Link</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="youtube_link"  value="{{ $settings_info->youtube_link }}">
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>Contact page Info</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Address</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="address"  value="{{ $settings_info->address }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Contact Email</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="email"  value="{{ $settings_info->email }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Contact Phone Number</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="phone"  value="{{ $settings_info->phone }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Nursery Hours</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="nursery_hours"  value="{{ $settings_info->nursery_hours }}">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Pricing sheet PDF</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="pricing_sheet_link">
                                                @error('pricing_sheet_link')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                                <p><span style="color: blue">Link: </span>
                                                    {{ asset('storage/uploads/'.$settings_info->pricing_sheet_link) }}

                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> KPF Order form PDF</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="order_form_link">
                                                @error('order_form_link')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                                <p><span style="color: blue">Link: </span>
                                                    {{ asset('storage/uploads/'.$settings_info->order_form_link) }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Nursery Map PDF</label>
                                            <div class="col-sm-9">
                                                <input type="file" name="nursery_link">
                                                @error('nursery_link')
                                                <p style="color: #ff0000">{{ $message }}</p>
                                                @enderror
                                                <p><span style="color: blue">Link: </span>
                                                    {{ asset('storage/uploads/'.$settings_info->nursery_link) }}

                                                </p>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <fieldset class="form-group">
                                        <legend><span>Other Info</span></legend>
                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Privacy Policy</label>
                                            <div class="col-sm-9">
                                                <textarea class="ckeditor form-control" name="privacy_policy" id="privacy_policy">{{ $settings_privacy_info->privacy_policy }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Terms & Conditions</label>
                                            <div class="col-sm-9">
                                                <textarea class="ckeditor form-control" name="terms_conditions" id="terms_conditions">{{ $settings_additional_info->terms_conditions }}</textarea>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-form-label col-sm-3" for=""> Our Guarantee</label>
                                            <div class="col-sm-9">
                                                <textarea class="ckeditor form-control" name="our_gurantee" id="our_gurantee">{{ $settings_additional_info->our_gurantee }}</textarea>
                                            </div>
                                        </div>
                                    </fieldset>




                                    <div class="form-buttons-w">
                                        <button class="btn btn-primary" name="submit" type="submit"> Update</button>
                                    </div>
                                </form>


                                <fieldset class="form-group">

                                    <legend><span>About Us Image</span></legend>
                                    <form action="{{ route('aboutus-image-processor', ['id' => $settings_info->id]) }}" class="dropzone" id="my-dropzone">
                                    @csrf


                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="myModal" class="modal">
        <span class="close" id="closemodal">&times;</span>
        <img class="modal-content" id="img01">
    </div>
@endsection
@section('javascript')
    <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="{{ asset('js/admin/jqueryui-1.10.3.min.js') }}"></script>
    <script src="{{ asset('js/admin/dropzone_buildentory/dropzone.js') }}"></script>
    <script>
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var span = document.getElementById("closemodal");
        span.onclick = function() {
            jQuery("#myModal").fadeOut();
        }
        window.onclick = function(event) {
            if (event.target == modal) {
                jQuery("#myModal").fadeOut();
            }
        }

        Dropzone.options.myDropzone = {
            autoDiscover: false,
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;
                //alert(name);
                jQuery.ajax({
                    type: 'POST',
                    url: '{{ route('aboutus-image-processor', ['id'=>$settings_info->id]) }}',
                    data: 'fn='+name+'&ac=delete'+'&pid={{ $settings_info->id }}&_token={{csrf_token()}}',
                    dataType: 'html'
                });
                var _ref;
                return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;
            },
            init: function() {
                thisDropzone = this;
                jQuery.get("{{ route('aboutus-image-processor', ['id'=>$settings_info->id]) }}", function(data) {
                    //alert(jQuery.type(data));
                    jQuery.each(data, function(key,value){

                        var mockFile = { name: value.name, size: value.size, src: value.src };
                        thisDropzone.options.addedfile.call(thisDropzone, mockFile);
                        thisDropzone.options.thumbnail.call(thisDropzone, mockFile, "{{ url('img/aboutus/thumb') }}/{{ $settings_info->id }}/"+value.name);
                    });
                });
            }
        };
        jQuery(function(){
            jQuery('.dropzone').sortable({
                revert: true,
                stop: function (event, ui) {

                    var next = ui.item.next();
                    next.css({'-moz-transition':'none', '-webkit-transition':'none', 'transition':'none'});
                    setTimeout(next.css.bind(next, {'-moz-transition':'border-top-width 0.1s ease-in', '-webkit-transition':'border-top-width 0.1s ease-in', 'transition':'border-top-width 0.1s ease-in'}));

                    var data = jQuery(this).sortable("serialize");
                    jQuery.ajax({
                        type: 'POST',
                        url: '{{ route('aboutus-image-processor', ['id'=>$settings_info->id]) }}',
                        data: 'fn='+data+'&ac=sorting'+'&pid={{ $settings_info->id }}&_token={{csrf_token()}}',

                        dataType: 'html'
                    });
                }
            });
            //$( ".dropzone" ).disableSelection();


        });

    </script>
@endsection
