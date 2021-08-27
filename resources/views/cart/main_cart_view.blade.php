@extends('layouts.app')
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
    </style>
@endsection
@section('content')
    @inject('product_model', 'App\Models\Product')
    <main>
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <h1 class="text-lg-left text-md-left text-sm-center mb-30">Cart</h1>
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
                                            <th class="pro-thumbnail">Thumbnail</th>
                                            <th class="pro-title">Product</th>
                                            <th class="pro-title">Size</th>
                                            <th class="pro-price">Unit Price</th>
                                            <th class="pro-quantity">Quantity</th>
                                            <th class="pro-subtotal">Total</th>
                                            <th class="pro-remove">Remove</th>
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

                                                    {{--@php
                                                        $product_count = $cart_list->product->getProductStockByPotSize($cart_list->product,$cart_list->pot_size);
                                                    @endphp

                                                    <input type="hidden" id="max_item_{{ $j }}" value="{{ $cart_list->product->getProductStock($cart_list->product) }}">

                                                    <td class="pro-quantity">
                                                        <div class="pro-qty" id="pro-qty_{{ $j }}"><input type="text" name="quantity_{{ $cart_list->id }}" value="{{ $cart_list->quantity }}" style="color: #7FBC03"></div>
                                                    </td>--}}
                                                    <td class="pro-quantity">
                                                        <div style="color: #7FBC03">
                                                            @php
                                                                $j++;
                                                                $product_count = $cart_list->product->getProductStockByPotSize($cart_list->product,$cart_list->pot_size);
                                                            @endphp
                                                            <select name="quantity_{{ $cart_list->id }}">
                                                                @for($k=1;$k<=$product_count;$k++)
                                                                    <option @if($cart_list->quantity==$k) selected @endif value="{{ $k }}">{{ $k }}</option>
                                                                @endfor
                                                            </select>
                                                        </div>
                                                    </td>
                                                    <td class="pro-subtotal"><span>${{ number_format(($cart_list->unit_price*$cart_list->quantity), 2, '.', ',') }}</span></td>
                                                    <td class="pro-remove"><a href="#" onclick="deleteCartItem({{ $cart_list->id }})"><i class="fa fa-trash-o"></i></a></td>
                                                </tr>
                                                @php
                                                    $i += $cart_list->quantity*$cart_list->unit_price;
                                                    if($cart_list->product->tax_free !='YES') {
                                                        $tax_amount += 9.30/100*($cart_list->quantity*$cart_list->unit_price);
                                                    }
                                                    $cart_d .= $cart_list->id."#";
                                                @endphp
                                            @endforeach
                                            <tr>
                                                <td colspan="7">
                                                    <div class="cart-update" style="float: right;min-height: 85px;padding-top: 24px;">
                                                        <button class="btn btn-sqr" type="submit">Update Cart</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
<!--                                <div class="cart-update-option d-block d-md-flex justify-content-between" style="display: inline-block !important; text-align: right !important; width: 100%">
                                    <div class="cart-update" style="float: right">
                                        <button class="btn btn-sqr" type="submit">Update Cart</button>
                                    </div>
                                </div>-->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 ml-auto">
                                <!-- Cart Calculation Area -->
                                <div class="cart-calculator-wrapper">
                                    <div class="cart-calculate-items">
                                        <h6>Cart Totals</h6>
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
                                                    $i += $tax_amount;
                                                @endphp
                                                <tr class="total">
                                                    <td>Total</td>
                                                    <td class="total-amount">${{ number_format($i, 2, '.', ',') }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <a href="{{ url('/checkout') }}" class="btn btn-sqr d-block">Proceed Checkout</a>
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
