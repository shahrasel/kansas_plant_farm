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
        <div class="content-i" style="min-width: 0">
            <div class="content-box" style="min-width: 0">
                <div class="element-wrapper">
                    <div class="element-box">
                        <h5 class="form-header">
                            Billboard List
                        </h5>

                        <div class="mx-auto">
                            <div class="product-amount" style="text-align: center">
                                <p style="text-transform:none">Showing {{($billboards->currentpage()-1)*$billboards->perpage()+1}} to
                                    @if($billboards->total()>20)
                                        @if(app('request')->input('page'))
                                            @if($billboards->lastPage() == app('request')->input('page')) {{$billboards->total()}}
                                            @else {{ ($billboards->currentpage())*$billboards->perpage() }}
                                            @endif
                                        @else
                                            {{ ($billboards->currentpage())*$billboards->perpage() }}
                                        @endif
                                    @else
                                        @if(app('request')->input('page'))
                                            @if($billboards->lastPage() == app('request')->input('page')) {{$billboards->total()}}
                                            @else {{ ($billboards->currentpage()-1)*$billboards->perpage() }}
                                            @endif
                                        @else
                                            {{ $billboards->total() }}
                                        @endif
                                    @endif
                                    of  {{$billboards->total()}} products
                                </p>
                            </div>

                            @if ($billboards->hasPages())
                                <div class="pagination-links mx-auto" style="display: flex">
                                    {{ $billboards->withQueryString()->links('admin_pagination') }}
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable10" class="table table-striped table-lightfont">
                                <thead>
                                <tr>
                                    <th>Heading</th>
                                    <th>Sub-Heading</th>
                                    <th>Button Text</th>
                                    <th>Button URL</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr></thead>
                                <tfoot>
                                <tr>
                                    <th>Heading</th>
                                    <th>Sub-Heading</th>
                                    <th>Button Text</th>
                                    <th>Button URL</th>
                                    <th>Image</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tfoot>
                                <tbody>
                                @forelse($billboards as $billboard)
                                    <tr>
                                        <td>{{ $billboard->heading }}</td>
                                        <td>{{ $billboard->subheading }}</td>
                                        <td>{{ $billboard->button_text }}</td>
                                        <td>{{ $billboard->button_url }}</td>
                                        <td><img src="{{ url('img/billboard/'.$billboard->image) }}" style="width: 100px"></td>
                                        <td><a href="{{ url('/admin/billboards/'.$billboard->id.'/edit') }}">Edit</a></td>
                                        <td><a href="{{ url('/admin/billboards/'.$billboard->id.'/delete') }}" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a></td>
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
                            @if ($billboards->hasPages())
                                <div class="pagination-links" style="display: flex">
                                    {{ $billboards->withQueryString()->links('admin_pagination') }}
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
@endsection
