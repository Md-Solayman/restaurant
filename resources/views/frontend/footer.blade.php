<section class="footer-7 section-top-bottom-padding">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="footer-bottom">
                    <div class="footer-link">
                        <div class="f-link f-info">
                            <ul class="footer-first">


                                <li class="logo-content">
                                    <a href="{{ route('home') }}">
                                        @if (config('settings.footer_logo') != '')
                                            <img style="height: 80px;"
                                                src="{{ asset('/uploads/settings') }}/{{ config('settings.footer_logo') }}"
                                                class="img-fluid f-logo-image" alt="logo-image">
                                        @else
                                            <h3>Food<span class="text-danger">Park</span></h3>
                                        @endif
                                    </a>
                                </li>




                                <li class="logo-content footer-details">
                                    <ul class="f-map">
                                        <li class="map-icn"><i class="ion-ios-location"></i></li>
                                        <li class="map-text">

                                            @php
                                                $footer = App\Models\Admin\Footer::first();
                                            @endphp

                                            @if (@$footer->address)
                                                <p>{{ @$footer->address }}</p>
                                            @endif
                                        </li>
                                    </ul>
                                    <ul class="f-contact">
                                        <li class="call-icn"><i class="ion-ios-telephone"></i></li>
                                        <li class="contact-link">

                                            @if (@$footer->phone)
                                                <a href="tel:{{ @$footer->phone }}">Phone: {{ @$footer->phone }}</a>
                                            @endif


                                            @if (@$footer->email)
                                                <a href="mailto:{{ @$footer->email }}">Email: {{ @$footer->email }}</a>
                                            @endif
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>

                        {{-- menu builder items --}}
                        @php
                            $footerMenuOne = Menu::getByName('footer_menu_one');
                            $footerMenuTwo = Menu::getByName('footer_menu_two');
                            $footerMenuThree = Menu::getByName('footer_menu_three');
                        @endphp



                        <div class="f-link">
                            <h2 class="h-footer">Informations</h2>
                            <a href="#account" data-bs-toggle="collapse" class="h-footer">
                                <span>Site Info</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="f-link-ul collapse" id="account" data-bs-parent="#footer-accordian">
                                @if ($footerMenuOne)
                                    @foreach ($footerMenuOne as $menuItem)
                                        <li class="f-link-ul-li"><a
                                                href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>

                        <div class="f-link">
                            <h2 class="h-footer">Privacy & terms</h2>
                            <a href="#privacy" data-bs-toggle="collapse" class="h-footer">
                                <span>Privacy & terms</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="f-link-ul collapse" id="privacy" data-bs-parent="#footer-accordian">
                                @if ($footerMenuTwo)
                                    @foreach ($footerMenuTwo as $menuItem)
                                        <li class="f-link-ul-li"><a
                                                href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>


                        <div class="f-link">
                            <h2 class="h-footer">Services</h2>
                            <a href="#services" data-bs-toggle="collapse" class="h-footer">
                                <span>Services</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="f-link-ul collapse" id="privacy" data-bs-parent="#footer-accordian">
                                @if ($footerMenuThree)
                                    @foreach ($footerMenuThree as $menuItem)
                                        <li class="f-link-ul-li"><a
                                                href="{{ $menuItem['link'] }}">{{ $menuItem['label'] }}</a>
                                        </li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                        <div class="f-link">
                            <h2 class="h-footer">Top rated</h2>
                            <a href="#services" data-bs-toggle="collapse" class="h-footer">
                                <span>Top rated</span>
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="f-link-ul collapse" id="services" data-bs-parent="#footer-accordian">
                                <li class="f-link-ul-li"><a href="product-style-7.html">Peri peri chiken</a>
                                </li>
                                <li class="f-link-ul-li"><a href="product-style-7.html">Special corn noodels</a>
                                </li>
                                <li class="f-link-ul-li"><a href="product-style-7.html">Special egypt pasta</a>
                                </li>
                                <li class="f-link-ul-li"><a href="product-style-7.html">Chilly garlic bread</a>
                                </li>
                                <li class="f-link-ul-li">
                                    @php
                                        $socialLink = App\Models\Admin\SocialLink::pluck('value', 'key')->toArray();
                                    @endphp

                                    @if (@$socialLink['facebook_link'])
                                        <a href="{{ @$socialLink['facebook_link'] }}">
                                            <i class="fa fa-facebook-square" aria-hidden="true"
                                                style="font-size: 20px;"></i>
                                        </a>
                                    @endif


                                    @if (@$socialLink['twitter_link'])
                                        <a href="{{ @$socialLink['twitter_link'] }}">
                                            <i class="fa fa-twitter-square" aria-hidden="true"
                                                style="margin-left: 10px; font-size: 20px;"></i>
                                        </a>
                                    @endif


                                    @if (@$socialLink['instagram_link'])
                                        <a href="{{ @$socialLink['instagram_link'] }}">
                                            <i class="fa fa-instagram" aria-hidden="true"
                                                style="margin-left: 10px; font-size: 20px;"></i>
                                        </a>
                                    @endif


                                    @if (@$socialLink['linkedin_link'])
                                        <a href="{{ @$socialLink['linkedin_link'] }}">
                                            <i class="fa fa-linkedin-square" aria-hidden="true"
                                                style="margin-left: 10px; font-size: 20px;"></i>
                                        </a>
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="footer-copyright">
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="f-bottom">
                    @if (@$footer->copyright)
                        <p class="text-center m-auto">
                            {{ @$footer->copyright }}
                        </p>
                    @endif

                    <!-- <img src="{{ asset('/frontend_assets/image/payment.png') }}" class="img-fluid" alt="p-image"> -->
                </div>
            </div>
        </div>
    </div>
</section>
