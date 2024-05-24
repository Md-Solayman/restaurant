<header class="header-area">
    <div class="header-main-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="header-main">
                        <!-- logo start -->


                        <div class="header-element logo">
                            <a href="{{ route('home') }}">
                                @if (config('settings.header_logo') != '')
                                    <img style="height: 100px;"
                                        src="{{ asset('/uploads/settings') }}/{{ config('settings.header_logo') }}"
                                        alt="logo-image" class="img-fluid">
                                @else
                                    <h3>Jahaj<span class="text-danger">Park</span></h3>
                                @endif

                            </a>
                        </div>



                        <!-- logo end -->
                        <!-- main menu start -->
                        <div class="header-element megamenu-content" style="float: right">
                            <div class="mainwrap">

                                @php
                                    $mainMenu = Menu::getByName('main_menu');
                                @endphp


                                @if ($mainMenu)
                                    <ul class="main-menu">

                                        @foreach ($mainMenu as $menuItem)
                                            <li class="menu-link parent mx-5" style="text-align:right">
                                                <a href="{{ $menuItem['link'] }}" class="link-title"
                                                    style="margin-left: 20px;">
                                                    <span class="sp-link-title" style="font-size: 24px;">{{ $menuItem['label'] }}</span>

                                                    @if ($menuItem['child'])
                                                        <i class="fa fa-angle-down"></i>
                                                    @endif

                                                </a>

                                                @if ($menuItem['child'])
                                                    <ul class="dropdown-submenu sub-menu collapse" id="blog-style">
                                                        @foreach ($menuItem['child'] as $child)
                                                            <li class="submenu-li">
                                                                <a href="{{ $child['link'] }}"
                                                                    class="g-l-link"><span>{{ $child['label'] }}</span>
                                                                </a>
                                                            </li>
                                                        @endforeach

                                                    </ul>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>
                        <!-- main menu end -->
                        <div class="search-area">

                            <!-- search end -->
                            <div class="header-element right-block-box">
                                <ul class="shop-element">

                                    {{-- login/registration --}}
                                    <li class="side-wrap user-wrap">
                                        <div class="acc-desk">
                                            <div class="user-icon">
                                                <span><a href="{{ route('login') }}"><i
                                                            class="icon-user"></i></a></span>
                                            </div>
                                        </div>
                                        <div class="acc-mob">
                                            <a href="{{ route('login') }}" class="user-icon">
                                                <span><i class="icon-user"></i></span>
                                            </a>
                                        </div>
                                    </li>

                                    {{-- cart --}}
                                    <li class="side-wrap cart-wrap">
                                        <div class="shopping-widget">
                                            <div class="shopping-cart">
                                                <a href="javascript:void(0)" class="cart-count">
                                                    <span class="cart-icon-wrap">
                                                        <span class="cart-icon"><i class="icon-handbag"></i></span>

                                                        <span id="cart-total" class="bigcounter cart_count"
                                                            id="">
                                                            {{ count(Cart::content()) }}
                                                        </span>
                                                    </span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- minicart start -->
    <div class="mini-cart">
        <a href="javascript:void(0)" class="shopping-cart-close"><i class="ion-close-round"></i></a>
        <div class="cart-item-title">
            <p>
                <span class="cart-count-desc">There are</span>
                <span class="cart-count-item bigcounter" id="bigCounter">{{ count(Cart::content()) }}</span>
                <span class="cart-count-desc">Products</span>
            </p>
        </div>

        <ul class="cart-item-loop cartItems">
            @foreach (Cart::content() as $cartItem)
                <li class="cart-item">
                    <div class="cart-img">
                        <a>
                            <img src="{{ asset('/uploads/product') }}/{{ $cartItem->options->product_info['image'] }}"
                                alt="cart-image" class="img-fluid">
                        </a>
                    </div>
                    <div class="cart-title">
                        <h6><a>{{ $cartItem->name }}</a></h6>
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
        <ul class="subtotal-title-area">
            <li class="subtotal-info">
                <div class="subtotal-titles">
                    <h6>Sub total:</h6>
                    <span class="subtotal-price subtotal">{{ currencyPosition(cartTotalPrice()) }}</span>
                </div>
            </li>
            <li class="mini-cart-btns">
                <div class="cart-btns">
                    <a href="{{ route('cart.page') }}" class="btn btn-style1"><span>View cart</span></a>
                </div>
            </li>
        </ul>
    </div>
    <!-- minicart end -->


    <!-- mobile menu start -->
    <div class="header-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="main-menu-area">
                        <div class="main-navigation navbar-expand-xl">
                            <div class="box-header menu-close">
                                <button class="close-box" type="button"><i class="ion-close-round"></i></button>
                            </div>



                            <div class="navbar-collapse" id="navbarContent">
                                <!-- main-menu start -->
                                <div class="megamenu-content">
                                    <div class="mainwrap">
                                        <ul class="main-menu">

                                            <li class="menu-link parent mx-3">
                                                <a href="javascript:void(0)" class="link-title">
                                                    <span class="sp-link-title">Pages</span>
                                                    <i class="fa fa-angle-down"></i>
                                                </a>

                                                <ul class="dropdown-submenu sub-menu collapse" id="blog-style">
                                                    <li class="submenu-li">
                                                        <a href="{{ route('terms_condition') }}"
                                                            class="g-l-link"><span>Terms &
                                                                Condition</span>
                                                        </a>
                                                    </li>

                                                </ul>
                                            </li>


                                        </ul>
                                    </div>
                                </div>
                                <!-- main-menu end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('.reservationForm').on('submit', function(e) {
                e.preventDefault();


                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                let data = $(this).serialize();


                $.ajax({
                    type: 'POST',
                    url: '{{ route('reservation.store') }}',
                    data: data,
                    beforeSend: function() {
                        $('#bookNowBtn').html(
                            `<span class="spinner-border spinner-border-sm"></span>  Loading...`
                        );
                    },
                    success: function(data) {

                        $('#bookNowBtn').html('Book Now');

                        if (data.status == 'error') {
                            toastr.error(data.message);
                        }

                        if (data.status == 'success') {
                            toastr.success(data.message);
                            $('.reservationForm').trigger('reset');
                            $('.modal').modal('hide');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#bookNowBtn').html('Book Now');

                        let errors = xhr.responseJSON.errors;
                        $.each(errors, function(index, value) {
                            toastr.error(value);
                        });
                    },
                    complete: function() {
                        $('#bookNowBtn').html('Book Now');

                    }
                })
            });
        });
    </script>
@endpush
