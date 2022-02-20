@extends('admin.app')
@section('content')
    <div class="content-w" style="min-width: 0">
        <div class="content-i" style="min-width: 0">
            <div class="content-box" style="min-width: 0">
                <div class="element-wrapper">
                    <div class="element-box">
                        <h5 class="form-header">
                            Newsfeed User List &nbsp;&nbsp;&nbsp;&nbsp; <span data-href="{{ url('/') }}/admin/newsfeed-users/export" id="export" class="btn btn-success btn-sm" onclick="exportTasks(event.target);">Export CSV</span>
                        </h5>

                        <div class="mx-auto">
                            @if(!empty($users_email_lists->hasPages()))
                                <div class="product-amount" style="text-align: center">
                                    <p style="text-transform:none">Showing {{($users_email_lists->currentpage()-1)*$users_email_lists->perpage()+1}} to
                                        @if($users_email_lists->total()>20)
                                            @if(app('request')->input('page'))
                                                @if($users_email_lists->lastPage() == app('request')->input('page')) {{$users_email_lists->total()}}
                                                @else {{ ($users_email_lists->currentpage())*$users_email_lists->perpage() }}
                                                @endif
                                            @else
                                                {{ ($users_email_lists->currentpage())*$users_email_lists->perpage() }}
                                            @endif
                                        @else
                                            @if(app('request')->input('page'))
                                                @if($users_email_lists->lastPage() == app('request')->input('page')) {{$users_email_lists->total()}}
                                                @else {{ ($users_email_lists->currentpage()-1)*$users_email_lists->perpage() }}
                                                @endif
                                            @else
                                                {{ $users_email_lists->total() }}
                                            @endif
                                        @endif
                                        of  {{$users_email_lists->total()}} products
                                    </p>
                                </div>
                            @endif

                            @if ($users_email_lists->hasPages())
                                <div class="pagination-links mx-auto" style="display: flex">
                                    {{ $users_email_lists->withQueryString()->links('admin_pagination') }}
                                </div>
                            @endif
                        </div>
                        <div class="table-responsive">
                            <table id="dataTable10" class="table table-striped table-lightfont">
                                <thead>
                                <tr>
                                    <th>Email</th>
                                    <th>Delete</th>
                                </tr></thead>
                                <tfoot>
                                <tr>
                                    <th>Email</th>
                                    <th>Delete</th>
                                </tfoot>
                                <tbody>
                                @forelse($users_email_lists as $users_email_list)
                                    <tr>
                                        <td>{{ $users_email_list->email }}</td>
                                        <td>
                                            <form id="appointment_delete_{{ $users_email_list->id }}" action="{{ route('admin-newsfeed-users-delete', $users_email_list->id) }}" method="post">
                                                @method('delete')
                                                @csrf
                                                <a href="#" role="button" onclick="deleteAppointment('{{ $users_email_list->id }}')">Delete</a>
                                            </form>
                                        </td>
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
                            @if ($users_email_lists->hasPages())
                                <div class="pagination-links" style="display: flex">
                                    {{ $users_email_lists->withQueryString()->links('admin_pagination') }}
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
        function deleteAppointment(id) {
            //return confirm('Are you sure you want to delete this item?');
            var confirm1 = confirm('Are you sure you want to delete this item?');
            if (confirm1) {
                $("#appointment_delete_"+id).submit();
                return true;
            } else {
                return false;
            }
        }
    </script>
    <script>
        function exportTasks(_this) {
            let _url = $(_this).data('href');
            window.location.href = _url;
        }
    </script>
@endsection
