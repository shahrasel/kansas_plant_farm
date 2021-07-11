@inject('cart', 'App\Models\cart')
@inject('product_model', 'App\Models\Product')
<div class="minicart-content-box" id="cart_div">
    @if(!$cart->getCartData()->isEmpty())
        <div class="minicart-item-wrapper">
            <ul>
                @php
                    $i=0;
                    $tax_amount = 0;
                @endphp
                @forelse($cart->getCartData() as $cartdata)
                    <li class="minicart-item">
                        <div class="minicart-thumb">
                            <a href="product-details.html">
                                @if(!empty(($cartdata->product->getImage($cartdata->product))))
                                    <img src="{{ url($cartdata->product->getImage($cartdata->product)) }}" alt="product">
                                @else
                                    <img src="{{ url('img/IMAGE_COMING_SOON.jpg') }}" alt="product">
                                @endif
                            </a>
                        </div>
                        <div class="minicart-content">
                            <h3 class="product-name">
                                <a href="{{ url('/plants') }}/{{ $cartdata->product->slug }}">
                                    @if(!empty($cartdata->product->other_product_service_name))
                                        {{ $cartdata->product->other_product_service_name }}
                                    @else
                                        {{ $cartdata->product->botanical_name }}<br/>
                                        {{ $cartdata->product->common_name }}
                                    @endif
                                </a>
                            </h3>
                            <p>
                                <span class="cart-quantity">{{ $cartdata->quantity }} <strong>&times;</strong></span>
                                <span class="cart-price">${{ $cartdata->unit_price }}</span>
                            </p>
                        </div>
                        <button class="minicart-remove" onclick="deleteCartItem({{ $cartdata->id }})"><i class="pe-7s-close"></i></button>
                    </li>
                    @php
                        $i += $cartdata->quantity*$cartdata->unit_price;
                        if($cartdata->product->tax_free !='YES') {
                            $tax_amount += 9.30/100*($cartdata->quantity*$cartdata->unit_price);
                        }
                    @endphp
                @empty
                    <p>No product is added to the cart!</p>
                @endforelse
            </ul>
        </div>

        <div class="minicart-pricing-box">
            <ul>
                <li>
                    <span>sub-total</span>
                    <span><strong>${{ number_format($i, 2, '.', ',') }}</strong></span>
                </li>
                <!--                        <li>
                                            <span>Eco Tax (-2.00)</span>
                                            <span><strong>$10.00</strong></span>
                                        </li>-->
                <li>
                    <span>Sales Tax (9.30%)</span>
                    <span><strong>${{ number_format($tax_amount, 2, '.', ',') }}</strong></span>
                </li>
                @php
                    $i += $tax_amount;
                @endphp

                <li class="total">
                    <span>total</span>
                    <span><strong>${{ number_format($i, 2, '.', ',') }}</strong></span>
                </li>
            </ul>
        </div>
        <div class="minicart-button">
            <a href="{{ url('/cart') }}"><i class="fa fa-shopping-cart"></i> View Cart</a>
            <a href="{{ url('/checkout') }}"><i class="fa fa-share"></i> Checkout</a>
        </div>
    @else
        <p>No product is added to the cart!</p>
    @endif
</div>
