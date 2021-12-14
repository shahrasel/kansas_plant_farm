<!DOCTYPE html>
<html>
<head>
    <title>Print Invoice</title>
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

</head>
<body class="menu-position-side menu-side-left full-screen with-content-panel">
<div class="all-wrapper with-side-panel solid-bg-all">
    <div class="layout-w">
        <div class="content-w">
        <div class="content-i">
            <div class="content-box">
                <div class="element-wrapper">
                    <div class="element-box">
                        <div class="row d-flex mt-5 mb-3 border-bottom border-dark">
                            <div class="col-sm-9 col-md-9 col-lg-9 mb-20">
                                <img src="{{ asset('plants_images/logo_top_white.png') }}">
                                <p>
                                    1210 Lakeview Ct<br/>Lawrence, KS 66049
                                </p>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 mb-20">
                                <p class="mb-0">Phone: (785) 218-7475</p>
                                <p class="mb-0">kansasplantfarm@gmail.com</p>
                                <p class="mb-0">www.KansasPlantFarm.com</p>
                                <p class="mb-0">
                                    Sales Rep: @if(!empty($oderInfo->sales_id)) {{ strtoupper($sales_info->firstname).' '.strtoupper(substr($sales_info->lastname, 0, 1)) }}. @else Ryan D. @endif
                                </p>
                            </div>
                        </div>

                        <div class="row d-flex mb-5">
                            <div class="col-sm-9 col-md-9 col-lg-9">
                                <p class="mb-0"><b>Order No:</b> {{ $oderInfo->orderid }}</p>
                                <p class="mb-0"><b>Customer:</b> {{ $order_additional_info->first_name }} {{ $order_additional_info->last_name }}</p>
                                <p class="mb-0"><b>Email:</b> {{ $order_additional_info->email_address }}</p>
                                <p class="mb-0"><b>Cell:</b> {{ $order_additional_info->phone }}</p>
                            </div>
                            <div class="col-sm-3 col-md-3 col-lg-3 ">
                                <p class="mb-0"><b>Date:</b> {{ date('m/d/y',strtotime($order_additional_info->created_at)) }}</p>
                            </div>
                        </div>
                        <div class="table-responsive" style="margin-bottom: 50px;">
                            <table id="dataTable10" width="100%" class="table table-striped table-lightfont">
                                <thead>
                                <tr>
                                    <th>Product ID</th><th>Product Name</th><th>Size</th><th>Unit Price</th><th>Quantity</th><th>Total</th>
                                </tr></thead>
                                <tbody>
                                @php
                                    $i=0;
                                    $tax_amount = 0;
                                @endphp
                                @forelse($orderdetails_lists as $orderdetails_list)
                                    <tr>
                                        <td>
                                            {{ $orderdetails_list->product->plant_id_number }}
                                        </td>

                                        <td>{{ $orderdetails_list->product->common_name }}</td>

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

                        @php
                            if(!empty(json_decode($order_additional_info->preferred_pick_optinos))) {
                                $options = json_decode($order_additional_info->preferred_pick_optinos);
                            }
                        @endphp

                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-md-6">
                                <fieldset class="form-group mt-0">
                                    <legend><span>PREFERRED PICK UP DATE/TIME</span></legend>
                                    <p>{{ $order_additional_info->pickup_date }} {{ $order_additional_info->time }}</p>
                                </fieldset>

                                @if(!empty($options))
                                    <fieldset class="form-group mt-0">
                                    <legend><span>IMPORTANT INFORMATION</span></legend>
                                    <ul style="padding-left: 10px;">
                                        @foreach($options as $option)
                                            <li style="list-style: disc">
                                                @if($option=='substitute_plant_size')
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
                                @endif
                            </div>
                            <div class="col-lg-6 col-sm-6 col-md-6">
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
                                                    //$i += 9.30/100*$i;
                                                      $i += $tax_amount;
                                                @endphp
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


                        <div class="row text-center d-block" style="margin: 70px auto 70px auto">
                            <h6>
                                We appreciate your business! Please spread the word<br/>and share our website with your friends!
                            </h6>
                        </div>

                        <div class="row d-block" style="margin: 70px auto 70px auto">
                            <h6><b>REFUND POLICY:</b></h6>
                            <p>
                                No refunds after on-line purchase, pickup or delivery. We may be able to replace the plant if a hidden defect caused the plant to die or break with-in 3 days after purchase. In such case, you need to bring the plant back for inspection and approval.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
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
</body>
</html>
