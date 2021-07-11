@extends('admin.app')
@section('stylesheet')
    <link href="{{ asset('css/admin/css/jquery-ui.min.css')  }}" rel="stylesheet">
    <style>
        [class*="ui-"] {
            -webkit-box-sizing: inherit !important;
            -moz-box-sizing: inherit !important;
            box-sizing: inherit !important;
        }
    </style>
@endsection
@section('content')
    <div class="content-w" style="min-width: 0">
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
        -------------------->
        <div class="content-i" style="min-width: 0">
            <div class="content-box" style="min-width: 0">
                <div class="element-wrapper">
                    <div class="element-box">
                        <h5 class="form-header">
                            Product List
                        </h5>
                        <fieldset class="form-group">
                            <legend><span>Import / Export CSV</span></legend>
                            <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4" style="max-width: 500px; margin: 0 auto;">
                                <div class="custom-file text-left">
                                    <input type="file" name="file" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                                @if ($errors->has('file'))
                                    <div class="custom-file text-left text-danger">
                                        {{--{{$errors->first('file')}}--}}
                                        The file must be a file of type: csv
                                    </div>
                                @endif
                            </div>
                            <button class="btn btn-primary">Import data</button>
                            <a class="btn btn-success" href="{{ route('file-export') }}">Export data</a>
                        </form>
                        </fieldset>
                        <form action="" method="get">
                            @csrf
                            <fieldset class="form-group">
                                <legend><span>Filter</span></legend>
                                <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""> Botanical Name</label>
                                        <input class="form-control" name="f_botanical_name" id="f_botanical_name" type="text" value="{{ app('request')->input('f_botanical_name') }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Common Name</label>
                                        <input class="form-control" name="f_common_name" id="f_common_name" type="text" value="{{ app('request')->input('f_common_name') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="">Plant Type</label>
                                        <select name="f_plant_type" class="form-control">
                                            <option value="">-- Select Plant Type --</option>
                                            <option value="Perennial" @if(app('request')->input('f_plant_type')=='Perennial') selected @endif>Perennial</option>
                                            <option value="Shrub" @if(app('request')->input('f_plant_type')=='Shrub') selected @endif>Shrub</option>
                                            <option value="Vine" @if(app('request')->input('f_plant_type')=='Vine') selected @endif>Vine</option>
                                            <option value="Grass Bamboo" @if(app('request')->input('f_plant_type')=='Grass Bamboo') selected @endif>Grass / Bamboo</option>
                                            <option value="Hardy Tropical" @if(app('request')->input('f_plant_type')=='Hardy Tropical') selected @endif>Hardy Tropical</option>
                                            <option value="Water Plant" @if(app('request')->input('f_plant_type')=='Water Plant') selected @endif>Water Plant</option>
                                            <option value="Annual" @if(app('request')->input('f_plant_type')=='Annual') selected @endif>Annual</option>
                                            <option value="House Deck Plant" @if(app('request')->input('f_plant_type')=='House Deck Plant') selected @endif>House / Deck Plant</option>
                                            <option value="Cactus / Succulent" @if(app('request')->input('f_plant_type')=='Cactus Succulent') selected @endif>Cactus Succulent</option>
                                            <option value="Small Tree" @if(app('request')->input('f_plant_type')=='Small Tree') selected @endif>Small Tree</option>
                                            <option value="Large Tree" @if(app('request')->input('f_plant_type')=='Large Tree') selected @endif>Large Tree</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="f_product_id_number">Product ID Number</label>
                                        <input class="form-control" name="f_product_id_number" id="f_product_id_number" type="text" value="{{ app('request')->input('f_product_id_number') }}" autocomplete="off">
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="include_on_website"><input id="include_on_website" type="checkbox" name="f_checkbox[]" value="include_on_website" @if(!empty(app('request')->input('f_checkbox'))) @if(in_array('include_on_website',app('request')->input('f_checkbox'))) checked @endif @endif>&nbsp;&nbsp;Include on Website</label><br/>
                                        <label for="active_only"><input id="active_only" type="checkbox" name="f_checkbox[]" value="active_only" @if(!empty(app('request')->input('f_checkbox'))) @if(in_array('active_only',app('request')->input('f_checkbox'))) checked @endif @endif>&nbsp;&nbsp;Active Only</label><br/>
                                        <label for="best_sellers"><input id="best_sellers" type="checkbox" name="f_checkbox[]" value="best_sellers" @if(!empty(app('request')->input('f_checkbox'))) @if(in_array('best_sellers',app('request')->input('f_checkbox'))) checked @endif @endif>&nbsp;&nbsp;Best Sellers</label>

                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="new_for_this_year"><input id="new_for_this_year" type="checkbox" name="f_checkbox[]" value="new_for_this_year" @if(!empty(app('request')->input('f_checkbox'))) @if(in_array('new_for_this_year',app('request')->input('f_checkbox'))) checked @endif @endif>&nbsp;&nbsp;New For This Year</label><br/>
                                        <label for="other_product_services"><input id="other_product_services" type="checkbox" name="f_checkbox[]" value="other_product_services" @if(!empty(app('request')->input('f_checkbox'))) @if(in_array('other_product_services',app('request')->input('f_checkbox'))) checked @endif @endif>&nbsp;&nbsp;Other Products/Services</label><br/>
                                        <label for="tax_free"><input id="tax_free" type="checkbox" name="f_checkbox[]" value="tax_free" @if(!empty(app('request')->input('f_checkbox'))) @if(in_array('tax_free',app('request')->input('f_checkbox'))) checked @endif @endif>&nbsp;&nbsp;Tax Free</label>

                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="image_count_sort">Image Count</label>
                                        <select name="image_count_sort" class="form-control">
                                            <option value="">-- Select --</option>
                                            <option value="high_to_low" @if(app('request')->input('image_count_sort')=='high_to_low') selected @endif>High to Low</option>
                                            <option value="low_to_high" @if(app('request')->input('image_count_sort')=='low_to_high') selected @endif>Low to High</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        &nbsp;
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Filter</button>
                                    </div>
                                </div>
                            </div>
                            </fieldset>
                        </form>

                            <div class="mx-auto">
                                <div class="product-amount" style="text-align: center">
                                    {{--<p>Showing 1–16 of 21 results</p>--}}
                                    <p style="text-transform:none">Showing {{($product_lists->currentpage()-1)*$product_lists->perpage()+1}} to
                                        @if($product_lists->total()>50)
                                            @if(app('request')->input('page'))
                                                @if($product_lists->lastPage() == app('request')->input('page')) {{$product_lists->total()}}
                                                @else {{ ($product_lists->currentpage())*$product_lists->perpage() }}
                                                @endif
                                            @else
                                                {{ ($product_lists->currentpage())*$product_lists->perpage() }}
                                            @endif
                                        @else
                                            @if(app('request')->input('page'))
                                                @if($product_lists->lastPage() == app('request')->input('page')) {{$product_lists->total()}}
                                                @else {{ ($product_lists->currentpage()-1)*$product_lists->perpage() }}
                                                @endif
                                            @else
                                                {{ $product_lists->total() }}
                                            @endif
                                        @endif
                                        of  {{$product_lists->total()}} products
                                    </p>
                                </div>

                                @if ($product_lists->hasPages())
                                    <div class="pagination-links mx-auto" style="display: flex">
                                        {{ $product_lists->withQueryString()->links('admin_pagination') }}
                                    </div>
                                @endif
                            </div>
                            <div class="table-responsive" style="overflow: scroll">
                                <table id="dataTable10" class="table table-striped table-lightfont">
                                    <thead>
                                    <tr>
                                        <th>Product ID</th><th>Botanical name</th>
                                        <th>Status</th>
                                        <th>Image count</th>
                                        <th>imgae upload</th>
                                        <th>Edit</th>

                                        <th>Pot size(a)</th>
                                        <th>Inventory_count(a)</th>
                                        <th>Retail Sale Price(a)</th>

                                        <th>Pot size(b)</th>
                                        <th>Inventory_count(b)</th>
                                        <th>Retail Sale Price(b)</th>

                                        <th>Pot size(c)</th>
                                        <th>Inventory_count(c)</th>
                                        <th>Retail Sale Price(c)</th>


                                        <th>Date Entered</th>
                                        <th>Best Sellers</th>
                                        <th>New For this year</th>
                                        <th>Common Name</th>
                                        <th>Patent / Trademark name</th>
                                    </tr></thead>
                                    <tfoot>
                                    <tr>
                                        <th>Product ID</th><th>Botanical name</th>
                                        <th>Status</th>
                                        <th>Image count</th>
                                        <th>imgae upload</th>
                                        <th>Edit</th>

                                        <th>Pot size(a)</th>
                                        <th>Inventory_count(a)</th>
                                        <th>Retail Sale Price(a)</th>

                                        <th>Pot size(b)</th>
                                        <th>Inventory_count(b)</th>
                                        <th>Retail Sale Price(b)</th>

                                        <th>Pot size(c)</th>
                                        <th>Inventory_count(c)</th>
                                        <th>Retail Sale Price(c)</th>


                                        <th>Date Entered</th>
                                        <th>Best Sellers</th>
                                        <th>New For this year</th>
                                        <th>Common Name</th>
                                        <th>Patent / Trademark name</th>
                                    </tfoot>
                                    <tbody>
                                    @forelse($product_lists as $product_list)
                                        <tr>
                                            <td>{{ $product_list->plant_id_number }}</td>
                                            <td>{{ $product_list->botanical_name }}</td>
                                            <td>{{ $product_list->status }}</td>
                                            <td> {{ $product_list->image_count }}</td>
                                            <td><a href="{{ url('/admin/edit-product-image/'.$product_list->id) }}">Image Upload</a></td>
                                            <td><a href="{{ url('/admin/edit-product/'.$product_list->slug) }}">Edit</a></td>


                                            <td>{{ $product_list->pot_size_a }}</td>
                                            <td>{{ $product_list->inventory_count_a }}</td>
                                            <td>{{ $product_list->retail_sale_price_a?'$'.number_format($product_list->retail_sale_price_a,2):'' }}</td>

                                            <td>{{ $product_list->pot_size_b }}</td>
                                            <td>{{ $product_list->inventory_count_b }}</td>
                                            <td>{{ $product_list->retail_sale_price_b?'$'.number_format($product_list->retail_sale_price_b,2):'' }}</td>


                                            <td>{{ $product_list->pot_size_c }}</td>
                                            <td>{{ $product_list->inventory_count_c }}</td>
                                            <td>{{ $product_list->retail_sale_price_c?'$'.number_format($product_list->retail_sale_price_c,2):'' }}</td>


                                            <td>{{ $product_list->date_entered }}</td>
                                            <td>{{ $product_list->best_sellers }}</td>
                                            <td>{{ $product_list->new_for_this_year }}</td>



                                            <td>{{ $product_list->common_name }}</td>
                                            <td>{{ $product_list->patent_trademark_names }}</td>







                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="16">No data found</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                            <div class="mx-auto">
                                @if ($product_lists->hasPages())
                                    <div class="pagination-links" style="display: flex">
                                        {{ $product_lists->withQueryString()->links('admin_pagination') }}
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
@section('javascript')
    <script src="{{ asset('js/admin/jquery-ui.min.js') }}"></script>
    <script>
        $( function() {
            var botanicalarr = @json($botanical_lists);

            jQuery("#f_botanical_name").autocomplete({
                source: botanicalarr
            });

            var commonarr = @json($common_lists);
            jQuery("#f_common_name").autocomplete({
                source: commonarr
            });

            jQuery.ui.autocomplete.filter = function (array, term) {
                var matcher = new RegExp("^" + $.ui.autocomplete.escapeRegex(term), "i");
                return $.grep(array, function (value) {
                    return matcher.test(value.label || value.value || value);
                });
            };

        });
    </script>
@endsection
