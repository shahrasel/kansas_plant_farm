@inject('cart', 'App\Models\cart')
<div class="minicart-content-box" id="cart_div">
    @if(!$cart->getCartData()->isEmpty())
        <div class="minicart-item-wrapper">
            <ul>
                @php
                    $i=0;
                @endphp
                @forelse($cart->getCartData() as $cartdata)
                    <li class="minicart-item">
                        <div class="minicart-thumb">
                            <a href="product-details.html">
                                <img src="{{ asset('plants_images/5.jpg') }}" alt="product">
                            </a>
                        </div>
                        <div class="minicart-content">
                            <h3 class="product-name">
                                <a href="product-details/{{ $cartdata->product->id }}">{{ $cartdata->product->common_name }}</a>
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
                    <span>Sales Tax (8.25%)</span>
                    <span><strong>${{ number_format(8.25/100*$i, 2, '.', ',') }}</strong></span>
                </li>
                @php
                    $i += 8.25/100*$i;
                @endphp

                <li class="total">
                    <span>total</span>
                    <span><strong>${{ number_format($i, 2, '.', ',') }}</strong></span>
                </li>
            </ul>
        </div>
        <div class="minicart-button">
            <a href="/cart"><i class="fa fa-shopping-cart"></i> View Cart</a>
            <a href="/checkout"><i class="fa fa-share"></i> Checkout</a>
        </div>
    @else
        <p>No product is added to the cart!</p>
    @endif
</div>
