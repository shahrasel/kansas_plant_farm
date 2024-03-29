<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard HTML Template</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/admin/css/select2.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/bootstrap-daterangepicker/daterangepicker.css')  }}" rel="stylesheet">

    <link href="{{ asset('css/admin/css/datatables.net-bs/css/dataTables.bootstrap.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/fullcalendar/dist/fullcalendar.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/perfect-scrollbar/css/perfect-scrollbar.min.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/slick-carousel/slick/slick.css')  }}" rel="stylesheet">
    <link href="{{ asset('css/admin/css/main.css?v=').time() }}" rel="stylesheet">

    @yield('stylesheet')
</head>
<body class="menu-position-side menu-side-left full-screen with-content-panel">
<div class="all-wrapper with-side-panel solid-bg-all">
    <div aria-hidden="true" class="onboarding-modal modal fade animated" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-centered" role="document">
            <div class="modal-content text-center">
                <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="close-label">Skip Intro</span><span class="os-icon os-icon-close"></span></button>
                <div class="onboarding-slider-w">
                    <div class="onboarding-slide">
                        <div class="onboarding-media">
                            <img alt="" src="{{ asset('img/admin/img/bigicon2.png') }}" width="200px">
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
                    <div class="onboarding-slide">
                        <div class="onboarding-media">
                            <img alt="" src="{{ asset('img/admin/img/bigicon5.png') }}" width="200px">
                        </div>
                        <div class="onboarding-content with-gradient">
                            <h4 class="onboarding-title">
                                Example Request Information
                            </h4>
                            <div class="onboarding-text">
                                In this example you can see a form where you can request some additional information from the customer when they land on the app page.
                            </div>
                            <form>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Your Full Name</label><input class="form-control" placeholder="Enter your full name..." type="text" value="">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="">Your Role</label><select class="form-control">
                                                <option>
                                                    Web Developer
                                                </option>
                                                <option>
                                                    Business Owner
                                                </option>
                                                <option>
                                                    Other
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="onboarding-slide">
                        <div class="onboarding-media">
                            <img alt="" src="{{ asset('img/admin/img/bigicon6.png') }}" width="200px">
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
                </div>
            </div>
        </div>
    </div>
    <div class="search-with-suggestions-w">
        <div class="search-with-suggestions-modal">
<!--            <div class="element-search">
                <input class="search-suggest-input" placeholder="Start typing to search..." type="text">
                <div class="close-search-suggestions">
                    <i class="os-icon os-icon-x"></i>
                </div>
                </input>
            </div>-->
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-box"></div>
                    </div>
                    <div class="ssg-name">
                        Projects
                    </div>
                    <div class="ssg-info">
                        24 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-boxed">
                        <a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/company6.png)"></div>
                            <div class="item-name">
                                Integ<span>ration</span> with API
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/company7.png)"></div>
                            <div class="item-name">
                                Deve<span>lopm</span>ent Project
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-users"></div>
                    </div>
                    <div class="ssg-name">
                        Customers
                    </div>
                    <div class="ssg-info">
                        12 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-list">
                        <a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/avatar1.jpg)"></div>
                            <div class="item-name">
                                John Ma<span>yer</span>s
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/avatar2.jpg)"></div>
                            <div class="item-name">
                                Th<span>omas</span> Mullier
                            </div>
                        </a><a class="ssg-item" href="users_profile_big.html">
                            <div class="item-media" style="background-image: url(img/avatar3.jpg)"></div>
                            <div class="item-name">
                                Kim C<span>olli</span>ns
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="search-suggestions-group">
                <div class="ssg-header">
                    <div class="ssg-icon">
                        <div class="os-icon os-icon-folder"></div>
                    </div>
                    <div class="ssg-name">
                        Files
                    </div>
                    <div class="ssg-info">
                        17 Total
                    </div>
                </div>
                <div class="ssg-content">
                    <div class="ssg-items ssg-items-blocks">
                        <a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-file-text"></i>
                            </div>
                            <div class="item-name">
                                Work<span>Not</span>e.txt
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-film"></i>
                            </div>
                            <div class="item-name">
                                V<span>ideo</span>.avi
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-database"></i>
                            </div>
                            <div class="item-name">
                                User<span>Tabl</span>e.sql
                            </div>
                        </a><a class="ssg-item" href="#">
                            <div class="item-icon">
                                <i class="os-icon os-icon-image"></i>
                            </div>
                            <div class="item-name">
                                wed<span>din</span>g.jpg
                            </div>
                        </a>
                    </div>
                    <div class="ssg-nothing-found">
                        <div class="icon-w">
                            <i class="os-icon os-icon-eye-off"></i>
                        </div>
                        <span>No files were found. Try changing your query...</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        <div class="menu-mobile menu-activated-on-click color-scheme-dark">
            <div class="mm-logo-buttons-w">
                <a class="mm-logo" href="{{ url('/') }}"><img src="{{ asset('plants_images/logo_top_white.png') }}"></a>
                <div class="mm-buttons">
                    <div class="content-panel-open">
                        <div class="os-icon os-icon-grid-circles"></div>
                    </div>
                    <div class="mobile-menu-trigger">
                        <div class="os-icon os-icon-hamburger-menu-1"></div>
                    </div>
                </div>
            </div>
            <div class="menu-and-user">
                <div class="logged-user-w">
                    <div class="avatar-w">
                        <img alt="" src="@if(!empty(auth()->user()->pimage)){{ asset('img/users/'.auth()->user()->pimage) }}@else {{ asset('img/avatar.png') }} @endif">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                        </div>
                        <div class="logged-user-role">
                            {{ strtoupper(auth()->user()->usertype) }}
                        </div>
                    </div>
                </div>
                <!--------------------
                START - Mobile Menu List
                -------------------->
                <ul class="main-menu">
                    <li class="has-sub-menu">
                        <a href="index.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layout"></div>
                            </div>
                            <span>Dashboard</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="index.html">Dashboard 1</a>
                            </li>
                            <li>
                                <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a>
                            </li>
                            <li>
                                <a href="apps_support_dashboard.html">Dashboard 3</a>
                            </li>
                            <li>
                                <a href="apps_projects.html">Dashboard 4</a>
                            </li>
                            <li>
                                <a href="apps_bank.html">Dashboard 5</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top_image.html">Dashboard 6</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="layouts_menu_top_image.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-layers"></div>
                            </div>
                            <span>Menu Styles</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="layouts_menu_side_full.html">Side Menu Light</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_full_dark.html">Side Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="apps_pipeline.html">Side &amp; Top Dark</a>
                            </li>
                            <li>
                                <a href="apps_projects.html">Side &amp; Top</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_mini.html">Mini Side Menu</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_compact.html">Compact Side Menu</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_right.html">Right Menu</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top.html">Top Menu Light</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top_dark.html">Top Menu Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a>
                            </li>
                            <li>
                                <a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a>
                            </li>
                            <li>
                                <a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a>
                            </li>
                            <li>
                                <a href="layouts_menu_side_compact_click.html">Menu Inside Click</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="apps_bank.html">
                            <div class="icon-w">
                                <div class="os-icon os-icon-package"></div>
                            </div>
                            <span>Applications</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="apps_email.html">Email Application</a>
                            </li>
                            <li>
                                <a href="apps_support_dashboard.html">Support Dashboard</a>
                            </li>
                            <li>
                                <a href="apps_support_index.html">Tickets Index</a>
                            </li>
                            <li>
                                <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="apps_projects.html">Projects List</a>
                            </li>
                            <li>
                                <a href="apps_bank.html">Banking <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="apps_full_chat.html">Chat Application</a>
                            </li>
                            <li>
                                <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="misc_chat.html">Popup Chat</a>
                            </li>
                            <li>
                                <a href="apps_pipeline.html">CRM Pipeline</a>
                            </li>
                            <li>
                                <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="misc_calendar.html">Calendar</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-file-text"></div>
                            </div>
                            <span>Pages</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="misc_invoice.html">Invoice</a>
                            </li>
                            <li>
                                <a href="ecommerce_order_info.html">Order Info <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="misc_charts.html">Charts</a>
                            </li>
                            <li>
                                <a href="auth_login.html">Login</a>
                            </li>
                            <li>
                                <a href="auth_register.html">Register</a>
                            </li>
                            <li>
                                <a href="auth_lock.html">Lock Screen</a>
                            </li>
                            <li>
                                <a href="misc_pricing_plans.html">Pricing Plans</a>
                            </li>
                            <li>
                                <a href="misc_error_404.html">Error 404</a>
                            </li>
                            <li>
                                <a href="misc_error_500.html">Error 500</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-life-buoy"></div>
                            </div>
                            <span>UI Kit</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a>
                            </li>
                            <li>
                                <a href="uikit_alerts.html">Alerts</a>
                            </li>
                            <li>
                                <a href="uikit_grid.html">Grid</a>
                            </li>
                            <li>
                                <a href="uikit_progress.html">Progress</a>
                            </li>
                            <li>
                                <a href="uikit_popovers.html">Popover</a>
                            </li>
                            <li>
                                <a href="uikit_tooltips.html">Tooltips</a>
                            </li>
                            <li>
                                <a href="uikit_buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="uikit_dropdowns.html">Dropdowns</a>
                            </li>
                            <li>
                                <a href="uikit_typography.html">Typography</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-mail"></div>
                            </div>
                            <span>Emails</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="emails_welcome.html">Welcome Email</a>
                            </li>
                            <li>
                                <a href="emails_order.html">Order Confirmation</a>
                            </li>
                            <li>
                                <a href="emails_payment_due.html">Payment Due</a>
                            </li>
                            <li>
                                <a href="emails_forgot.html">Forgot Password</a>
                            </li>
                            <li>
                                <a href="emails_activate.html">Activate Account</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-users"></div>
                            </div>
                            <span>Users</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="users_profile_big.html">Big Profile</a>
                            </li>
                            <li>
                                <a href="users_profile_small.html">Compact Profile</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-edit-32"></div>
                            </div>
                            <span>Forms</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="forms_regular.html">Regular Forms</a>
                            </li>
                            <li>
                                <a href="forms_validation.html">Form Validation</a>
                            </li>
                            <li>
                                <a href="forms_wizard.html">Form Wizard</a>
                            </li>
                            <li>
                                <a href="forms_uploads.html">File Uploads</a>
                            </li>
                            <li>
                                <a href="forms_wisiwig.html">Wisiwig Editor</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-grid"></div>
                            </div>
                            <span>Tables</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="tables_regular.html">Regular Tables</a>
                            </li>
                            <li>
                                <a href="tables_datatables.html">Data Tables</a>
                            </li>
                            <li>
                                <a href="tables_editable.html">Editable Tables</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub-menu">
                        <a href="#">
                            <div class="icon-w">
                                <div class="os-icon os-icon-zap"></div>
                            </div>
                            <span>Icons</span></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_feather.html">Feather Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_themefy.html">Themefy Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_picons_thin.html">Picons Thin</a>
                            </li>
                            <li>
                                <a href="icon_fonts_dripicons.html">Dripicons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_eightyshades.html">Eightyshades</a>
                            </li>
                            <li>
                                <a href="icon_fonts_entypo.html">Entypo</a>
                            </li>
                            <li>
                                <a href="icon_fonts_font_awesome.html">Font Awesome</a>
                            </li>
                            <li>
                                <a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a>
                            </li>
                            <li>
                                <a href="icon_fonts_metrize_icons.html">Metrize Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_picons_social.html">Picons Social</a>
                            </li>
                            <li>
                                <a href="icon_fonts_batch_icons.html">Batch Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_dashicons.html">Dashicons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_typicons.html">Typicons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_weather_icons.html">Weather Icons</a>
                            </li>
                            <li>
                                <a href="icon_fonts_light_admin.html">Light Admin</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!--------------------
                END - Mobile Menu List
                -------------------->
                <div class="mobile-menu-magic">
                    <h4>
                        Light Admin
                    </h4>
                    <p>
                        Clean Bootstrap 4 Template
                    </p>
                    <div class="btn-w">
                        <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        <div class="menu-w color-scheme-light color-style-transparent menu-position-side menu-side-left menu-layout-compact sub-menu-style-over sub-menu-color-bright selected-menu-color-light menu-activated-on-hover menu-has-selected-link">
            <div class="logo-w">
                <a class="logo" href="{{ url('/') }}"><img src="{{ asset('plants_images/logo_top_white.png') }}"></a>
            </div>
            <div class="logged-user-w avatar-inline">
                <div class="logged-user-i">
                    <div class="avatar-w">
                        <img alt="" src="@if(!empty(auth()->user()->pimage)){{ asset('img/users/'.auth()->user()->pimage) }}@else {{ asset('img/avatar.png') }} @endif">
                    </div>
                    <div class="logged-user-info-w">
                        <div class="logged-user-name">
                            {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                        </div>
                        <div class="logged-user-role">
                            {{ strtoupper(auth()->user()->usertype) }}
                        </div>
                    </div>
                    <div class="logged-user-toggler-arrow">
                        <div class="os-icon os-icon-chevron-down"></div>
                    </div>
                    <div class="logged-user-menu color-style-bright">
                        <div class="logged-user-avatar-info">
                            <div class="avatar-w">
                                <img alt="" src="@if(!empty(auth()->user()->pimage)){{ asset('img/users/'.auth()->user()->pimage) }}@else {{ asset('img/avatar.png') }} @endif">
                            </div>
                            <div class="logged-user-info-w">
                                <div class="logged-user-name">
                                    {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}
                                </div>
                                <div class="logged-user-role">
                                    {{ strtoupper(auth()->user()->usertype) }}
                                </div>
                            </div>
                        </div>
                        <div class="bg-icon">
                            <i class="os-icon os-icon-wallet-loaded"></i>
                        </div>
                        <ul>
<!--                            <li>
                                <a href="apps_email.html"><i class="os-icon os-icon-mail-01"></i><span>Incoming Mail</span></a>
                            </li>-->
                            <li>
                                <a href="{{ url('/admin/my-profile') }}"><i class="os-icon os-icon-user-male-circle2"></i><span>Profile Details</span></a>
                            </li>
<!--                            <li>
                                <a href="users_profile_small.html"><i class="os-icon os-icon-coins-4"></i><span>Billing Details</span></a>
                            </li>-->
                            <li>
                                <a href="#"><i class="os-icon os-icon-others-43"></i><span>Notifications</span></a>
                            </li>
                            <li>
                                <form action="{{ url('/admin/logout') }}" method="post" id="logoutform">
                                    @csrf
                                    <a onclick="logoutFormSubmit()"><i class="os-icon os-icon-signs-11"></i><span>Logout</span></a>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <h1 class="menu-page-header">
                Page Header
            </h1>
            <ul class="main-menu">
                <li class="sub-header">
                    <span>Dashboard</span>
                </li>
                <li class="selected">
                    <a href="{{ url('/admin/dashboard') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Home</span></a>

                </li>

                <li class="selected">
                    <a href="{{ url('/admin/my-profile') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>My Profile</span></a>

                </li>

                <li class="selected">
                    <a href="{{ url('/admin/orders') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Orders</span></a>

                </li>

                <li class="has-sub-menu">
                    <a href="{{ url('/admin/products') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Products</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Products
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layout"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/products') }}">All Products</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/add-product') }}">Add Product</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>

                <li class="has-sub-menu">
                    <a href="{{ url('/admin/garden-themes') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Garden Themes</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Garden Themes
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layout"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/garden-themes') }}">All Garden Themes</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/garden-themes/create') }}">Add Garden Theme</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>

                <li class="has-sub-menu">
                    <a href="{{ url('/admin/events') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Events</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Events
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layout"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/events') }}">All Events</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/events/create') }}">Add Event</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>

                <li class="has-sub-menu">
                    <a href="{{ url('/admin/billboards') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Billboards</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Billboards
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layout"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/billboards') }}">All Billboards</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/billboards/create') }}">Add Billboard</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                </li>

                <li class="selected">
                    <a href="{{ url('/admin') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Analytics</span></a>

                </li>

                <li class="selected">
                    <a href="{{ url('/admin/settings/1/edit') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Settings</span></a>

                </li>
                <li class="selected">
                    <a href="{{ url('/admin/appointment-settings/edit') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Schedule Calendar</span></a>

                </li>
                <li class="selected">
                    <a href="{{ url('/admin/appointments') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Appointments</span></a>

                </li>
                <li class="selected">
                    <a href="{{ url('/admin/newsfeed-users') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Newsfeed Users</span></a>

                </li>
<!--                <li class="selected has-sub-menu">
                    <a href="index.html">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layout"></div>
                        </div>
                        <span>Dashboard</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Dashboard
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layout"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="apps_crypto.html">Crypto Dashboard <strong class="badge badge-danger">Hot</strong></a>
                                </li>
                                <li>
                                    <a href="apps_support_dashboard.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="apps_projects.html">Dashboard 4</a>
                                </li>
                                <li>
                                    <a href="apps_bank.html">Dashboard 5</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_top_image.html">Dashboard 6</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="layouts_menu_top_image.html">
                        <div class="icon-w">
                            <div class="os-icon os-icon-layers"></div>
                        </div>
                        <span>Menu Styles</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Menu Styles
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-layers"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="layouts_menu_side_full.html">Side Menu Light</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_full_dark.html">Side Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_transparent.html">Side Menu Transparent <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="apps_pipeline.html">Side &amp; Top Dark</a>
                                </li>
                                <li>
                                    <a href="apps_projects.html">Side &amp; Top</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_mini.html">Mini Side Menu</a>
                                </li>
                            </ul><ul class="sub-menu">
                                <li>
                                    <a href="layouts_menu_side_mini_dark.html">Mini Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_compact.html">Compact Side Menu</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_compact_dark.html">Compact Menu Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_right.html">Right Menu</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_top.html">Top Menu Light</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_top_dark.html">Top Menu Dark</a>
                                </li>
                            </ul><ul class="sub-menu">
                                <li>
                                    <a href="layouts_menu_top_image.html">Top Menu Image <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="layouts_menu_sub_style_flyout.html">Sub Menu Flyout</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_sub_style_flyout_dark.html">Sub Flyout Dark</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_sub_style_flyout_bright.html">Sub Flyout Bright</a>
                                </li>
                                <li>
                                    <a href="layouts_menu_side_compact_click.html">Menu Inside Click</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>-->
                <li class="sub-header">
                    <span>USERS</span>
                </li>
                <li class=" has-sub-menu">
                    <a href="{{ url('/admin/customers') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-package"></div>
                        </div>
                        <span>Customers</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Customers
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-package"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/customers') }}">All Customers</a>
                                </li>
                                <li>
                                    <a href="apps_support_dashboard.html">Add Customer</a>
                                </li>
                            </ul>
<!--                            <ul class="sub-menu">
                                <li>
                                    <a href="apps_full_chat.html">Chat Application</a>
                                </li>
                                <li>
                                    <a href="apps_todo.html">To Do Application <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="misc_chat.html">Popup Chat</a>
                                </li>
                                <li>
                                    <a href="apps_pipeline.html">CRM Pipeline</a>
                                </li>
                                <li>
                                    <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="misc_calendar.html">Calendar</a>
                                </li>
                            </ul>-->
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="{{ url('/admin/contractors') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-package"></div>
                        </div>
                        <span>Contractors</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Contractors
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-package"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/contractors') }}">All Contractors</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/add-contractor') }}">Add Contractor</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>

                <li class=" has-sub-menu">
                    <a href="{{ url('/admin/sales') }}">
                        <div class="icon-w">
                            <div class="os-icon os-icon-package"></div>
                        </div>
                        <span>Sales Agent</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Contractors
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-package"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="{{ url('/admin/sales') }}">All Sales Agents</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/add-sales') }}">Add Sales Agent</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
<!--                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-file-text"></div>
                        </div>
                        <span>Pages</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Pages
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-file-text"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="misc_invoice.html">Invoice</a>
                                </li>
                                <li>
                                    <a href="ecommerce_order_info.html">Order Info <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="rentals_index_grid.html">Property Listing <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="misc_charts.html">Charts</a>
                                </li>
                                <li>
                                    <a href="auth_login.html">Login</a>
                                </li>
                            </ul><ul class="sub-menu">
                                <li>
                                    <a href="auth_register.html">Register</a>
                                </li>
                                <li>
                                    <a href="auth_lock.html">Lock Screen</a>
                                </li>
                                <li>
                                    <a href="misc_pricing_plans.html">Pricing Plans</a>
                                </li>
                                <li>
                                    <a href="misc_error_404.html">Error 404</a>
                                </li>
                                <li>
                                    <a href="misc_error_500.html">Error 500</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-life-buoy"></div>
                        </div>
                        <span>UI Kit</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            UI Kit
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-life-buoy"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="uikit_modals.html">Modals <strong class="badge badge-danger">New</strong></a>
                                </li>
                                <li>
                                    <a href="uikit_alerts.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="uikit_grid.html">Grid</a>
                                </li>
                                <li>
                                    <a href="uikit_progress.html">Progress</a>
                                </li>
                                <li>
                                    <a href="uikit_popovers.html">Popover</a>
                                </li>
                            </ul><ul class="sub-menu">
                                <li>
                                    <a href="uikit_tooltips.html">Tooltips</a>
                                </li>
                                <li>
                                    <a href="uikit_buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="uikit_dropdowns.html">Dropdowns</a>
                                </li>
                                <li>
                                    <a href="uikit_typography.html">Typography</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class="sub-header">
                    <span>Elements</span>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-mail"></div>
                        </div>
                        <span>Emails</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Emails
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-mail"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="emails_welcome.html">Welcome Email</a>
                                </li>
                                <li>
                                    <a href="emails_order.html">Order Confirmation</a>
                                </li>
                                <li>
                                    <a href="emails_payment_due.html">Payment Due</a>
                                </li>
                                <li>
                                    <a href="emails_forgot.html">Forgot Password</a>
                                </li>
                                <li>
                                    <a href="emails_activate.html">Activate Account</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-users"></div>
                        </div>
                        <span>Users</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Users
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-users"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="users_profile_big.html">Big Profile</a>
                                </li>
                                <li>
                                    <a href="users_profile_small.html">Compact Profile</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-edit-32"></div>
                        </div>
                        <span>Forms</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Forms
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-edit-32"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="forms_regular.html">Regular Forms</a>
                                </li>
                                <li>
                                    <a href="forms_validation.html">Form Validation</a>
                                </li>
                                <li>
                                    <a href="forms_wizard.html">Form Wizard</a>
                                </li>
                                <li>
                                    <a href="forms_uploads.html">File Uploads</a>
                                </li>
                                <li>
                                    <a href="forms_wisiwig.html">Wisiwig Editor</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-grid"></div>
                        </div>
                        <span>Tables</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Tables
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-grid"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="tables_regular.html">Regular Tables</a>
                                </li>
                                <li>
                                    <a href="tables_datatables.html">Data Tables</a>
                                </li>
                                <li>
                                    <a href="tables_editable.html">Editable Tables</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li class=" has-sub-menu">
                    <a href="#">
                        <div class="icon-w">
                            <div class="os-icon os-icon-zap"></div>
                        </div>
                        <span>Icons</span></a>
                    <div class="sub-menu-w">
                        <div class="sub-menu-header">
                            Icons
                        </div>
                        <div class="sub-menu-icon">
                            <i class="os-icon os-icon-zap"></i>
                        </div>
                        <div class="sub-menu-i">
                            <ul class="sub-menu">
                                <li>
                                    <a href="icon_fonts_simple_line_icons.html">Simple Line Icons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_feather.html">Feather Icons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_themefy.html">Themefy Icons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_picons_thin.html">Picons Thin</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_dripicons.html">Dripicons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_eightyshades.html">Eightyshades</a>
                                </li>
                            </ul><ul class="sub-menu">
                                <li>
                                    <a href="icon_fonts_entypo.html">Entypo</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_font_awesome.html">Font Awesome</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_foundation_icon_font.html">Foundation Icon Font</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_metrize_icons.html">Metrize Icons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_picons_social.html">Picons Social</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_batch_icons.html">Batch Icons</a>
                                </li>
                            </ul><ul class="sub-menu">
                                <li>
                                    <a href="icon_fonts_dashicons.html">Dashicons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_typicons.html">Typicons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_weather_icons.html">Weather Icons</a>
                                </li>
                                <li>
                                    <a href="icon_fonts_light_admin.html">Light Admin</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>-->
            </ul>
<!--            <div class="side-menu-magic">
                <h4>
                    Light Admin
                </h4>
                <p>
                    Clean Bootstrap 4 Template
                </p>
                <div class="btn-w">
                    <a class="btn btn-white btn-rounded" href="https://themeforest.net/item/light-admin-clean-bootstrap-dashboard-html-template/19760124?ref=Osetin" target="_blank">Purchase Now</a>
                </div>
            </div>-->
        </div>
        <!--------------------
        END - Main Menu
        -------------------->
        @yield('content')
    </div>
    <div class="display-type"></div>
</div>
<script src="{{ asset('js/admin/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/popper.js/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('js/admin/moment/moment.js') }}"></script>
<script src="{{ asset('js/admin/chart.js/dist/Chart.min.js') }}"></script>
<script src="{{ asset('js/admin/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('js/admin/jquery-bar-rating/dist/jquery.barrating.min.js') }}"></script>
<script src="{{ asset('js/admin/ckeditor/ckeditor.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-validator/dist/validator.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('js/admin/ion.rangeSlider/js/ion.rangeSlider.min.js') }}"></script>
<script src="{{ asset('js/admin/editable-table/mindmup-editabletable.js') }}"></script>
<script src="{{ asset('js/admin/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/admin/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/admin/fullcalendar/dist/fullcalendar.min.js') }}"></script>
<script src="{{ asset('js/admin/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/tether/dist/js/tether.min.js') }}"></script>
<script src="{{ asset('js/admin/slick-carousel/slick/slick.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/util.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/alert.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/button.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/carousel.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/collapse.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/dropdown.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/modal.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/tab.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/tooltip.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap/js/dist/popover.js') }}"></script>
<script src="{{ asset('js/admin/demo_customizer.js?version=4.5.0') }}"></script>
<script src="{{ asset('js/admin/main.js?version=4.5.0') }}"></script>
@yield('javascript')
<script>
    function logoutFormSubmit() {
        $("#logoutform").submit();
    }
</script>
</body>
</html>
