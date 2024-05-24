<ul class="cart-item-loop cartItems">

    <input type="hidden" name="cart_count" value="{{ count(Cart::content()) }}" id="cart_count">
    <input type="hidden" name="subtotal" id="sub_total" value="{{ cartTotalPrice() }}">

    @foreach (Cart::content() as $cartItem)
        <li class="cart-item">
            <div class="cart-img">
                <a href="product-style-7.html">
                    <img src="{{ asset('/uploads/product') }}/{{ $cartItem->options->product_info['image'] }}"
                        alt="cart-image" class="img-fluid">
                </a>
            </div>
            <div class="cart-title">
                <h6><a href="product-style-7.html">{{ $cartItem->name }}</a></h6>
                <div class="cart-pro-info">
                    <div class="cart-qty-price">
                        <span>size:
                            {{ $cartItem->options?->product_variant['size_name'] ?? 'NA' }}</span>
                        <span class="mx-2">{{ $cartItem->options?->product_variant['price'] ?? '' }}</span>
                    </div>


                    <div class="delete-item-cart">
                        <button onclick="removeCartItem('{{ $cartItem->rowId }}')"><i
                                class="icon-trash icons"></i></button>
                    </div>
                </div>



                <div class="my-1">
                    @foreach ($cartItem->options->product_option as $option)
                        <span>{{ @$option['name'] }}</span>
                        <span class="mx-2">{{ @$option['price'] }}</span>
                    @endforeach
                </div>


                <div class="cart-pro-info">
                    <div class="cart-qty-price">
                        <span class="quantity">{{ $cartItem->qty }} x </span>
                        <span class="price-box">{{ $cartItem->price }}</span>
                    </div>
                </div>
            </div>
        </li>
    @endforeach

</ul>
