@extends('layouts.print')
@section('custom_styles')
    <style>
        .table-responsive{
            overflow-y: hidden;
        }
        .nice-select.open .list {
            z-index: 10000 !important;
            max-height: 130px;
            overflow-y: scroll;
        }
        body{
            background-color: #fff !important;
            color: #000 !important;
        }
        .section-padding {
            padding-top: 20px;
        }
        .cart-table .table tbody tr td {
            color: #000;
        }
        .cart-table .table tbody tr td a {
            color: #000;
        }
        .cart-table .table tbody tr td a:hover {
            color: #000;
        }
        .cart-table .table thead tr th {
            background-color: #000;
            border-color: #000;
        }
        h1, h2, h3, h4, h5, h6 {
            color: #000;
        }
        .cart-calculator-wrapper .cart-calculate-items .table tr td {
            color: #000;
        }
        .cart-calculator-wrapper .cart-calculate-items .table tr td:nth-child(2) {
            color: #000;
        }
    </style>
@endsection
@section('content')
    @inject('product_model', 'App\Models\Product')
    <main>
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="row d-flex mt-5 mb-3 border-bottom border-dark">
                <div class="col-sm-9 col-md-9 col-lg-9 mb-20">
                    <img src="https://kansasplantfarm.com/plants_images/logo_top_white.png">
                    <p>
                        1210 Lakeview Ct<br>Lawrence, KS 66049
                    </p>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 mb-20">
                    <p class="mb-0">Phone: (785) 218-7475</p>
                    <p class="mb-0">kansasplantfarm@gmail.com</p>
                    <p class="mb-0">www.KansasPlantFarm.com</p>
                    <p class="mb-0">
                        Sales Rep:  Ryan D.
                    </p>
                </div>
            </div>
            <div class="row d-flex mb-5">
                <div class="col-sm-9 col-md-9 col-lg-9">
                    <p class="mb-0"><b>Estimate No:</b> {{ $estimate_no }}</p>
                    <p class="mb-0"><b>Customer:</b> {{ $request->input('first_name')  }} {{ $request->input('last_name')  }}</p>
                    <p class="mb-0"><b>Email:</b> {{ $request->input('email_address')  }}</p>
                    <p class="mb-0"><b>Cell:</b> {{ $request->input('phone')  }}</p>
                </div>
                <div class="col-sm-3 col-md-3 col-lg-3 ">
                    <p class="mb-0"><b>Date:</b> {{ date('m/d/y') }}</p>
                </div>
            </div>
            <div class="section-bg-color text-center" id="cart_div">
                @if(!$cart_lists->isEmpty())
                    <form action="" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Cart Table Area -->

                                <div class="cart-table table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="pro-thumbnail">Product Image</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-title">Size</th>
                                            <th class="pro-price">Unit Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i=0;
                                                $j=1;
                                                $tax_amount = 0;
                                                $cart_d = "";
                                            @endphp
                                            @foreach($cart_lists as $cart_list)
                                                <tr>
                                                    <td class="pro-thumbnail">
                                                        <a href="{{ url('/plants') }}/{{ $cart_list->product->slug }}">
                                                            @if(!empty(($product_model->getImage($cart_list->product))))
                                                                <img class="img-fluid" src="{{ url($product_model->getImage($cart_list->product)) }}" alt="product">
                                                            @else
                                                                <img class="img-fluid" src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                                            @endif
                                                        </a></td>
                                                    <td class="pro-title">
                                                        <a href="{{ url('/plants') }}/{{ $cart_list->product->slug }}">
                                                            @if(!empty($cart_list->product->other_product_service_name))
                                                                {{ $cart_list->product->other_product_service_name }}
                                                            @else
                                                                {{ $cart_list->product->botanical_name }}<br/>
                                                                {{ $cart_list->product->common_name }}
                                                            @endif
                                                        </a></td>
                                                    <td class="pro-price"><span>@if(!empty($cart_list->size)){{ $cart_list->size }}@else - @endif</span></td>
                                                    <td class="pro-price"><span>${{ $cart_list->unit_price }}</span></td>

                                                    <td class="pro-quantity">
                                                        <div style="color: #000">
                                                            @if(auth()->check())
                                                                @if(auth()->user()->isAdmin())
                                                                    {{ $cart_list->quantity }}
                                                                @endif
                                                            @else
                                                                @php
                                                                    $j++;
                                                                    $product_count = $cart_list->product->getProductStockByPotSize($cart_list->product,$cart_list->pot_size);
                                                                @endphp
                                                                {{ $cart_list->quantity }}
                                                            @endif

                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal"><span>${{ number_format(($cart_list->unit_price*$cart_list->quantity), 2, '.', ',') }}</span></td>
                                                </tr>
                                                @php
                                                    $i += $cart_list->quantity*$cart_list->unit_price;
                                                    if($cart_list->product->tax_free !='YES') {
                                                        $tax_amount += 9.30/100*($cart_list->quantity*$cart_list->unit_price);
                                                    }
                                                    $cart_d .= $cart_list->id."#";
                                                @endphp
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 ml-auto">
                                <!-- Cart Calculation Area -->
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
                                        <h6>Totals</h6>
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tr>
                                                    <td style="text-align: left">Sub Total</td>
                                                    <td>${{ number_format($i, 2, '.', ',') }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="text-align: left">Sales Tax (9.30%)</td>
                                                    <td>${{ number_format($tax_amount, 2, '.', ',') }}</td>
                                                </tr>
                                                @php
                                                    $i += $tax_amount;
                                                @endphp
                                                <tr class="total">
                                                    <td style="text-align: left">Total</td>
                                                    <td class="total-amount">${{ number_format($i, 2, '.', ',') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="cart_d" id="cart_d" value="{{ $cart_d }}">
                    </form>
                @else
                    <h4 style="color: #ff0000">No product is added to the cart!</h4>
                @endif
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>
@endsection
@section('javascript')
    <script>

        function deleteCartItem(id) {
            //alert(id);
            $.ajax({url: "{{ url('/delete-cart-item') }}?id="+id+"&main_cart=1", success: function(result){
                $("#cart_div").html(result);
            }});
        }
    </script>
@endsection
