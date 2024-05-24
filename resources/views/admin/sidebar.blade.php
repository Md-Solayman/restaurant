<div class="leftside-menu">

    <a href="{{ route('admin.dashboard') }}">
        <p class="text-danger fw-bold text-center fs-4 text-uppercase">{{ config('settings.site_name') }}
        </p>
    </a>

    <div class="h-100" id="leftside-menu-container" data-simplebar>

        <!--- Sidemenu -->
        <ul class="side-nav">

            <li class="side-nav-title side-nav-item">Navigation</li>

            <li class="side-nav-item">
                <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                    <i class="fa fa-home" aria-hidden="true"></i>


                    <span> Dashboard </span>
                </a>

            </li>

            <li class="side-nav-title side-nav-item">Main Content</li>

            {{-- orders --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order"
                    class="side-nav-link">
                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>

                    <span>Manage Orders</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="order">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.order.index') }}">Orders</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.order.pending') }}">Pending Orders</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.order.declined') }}">Declined Orders</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.order.processed') }}">Processed Orders</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.order.delivered') }}">Delivered Orders</a>
                        </li>

                    </ul>
                </div>
            </li>


            {{-- restaurant --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#sidebarMaps" aria-expanded="false" aria-controls="sidebarMaps"
                    class="side-nav-link">
                    <i class="fa fa-cutlery" aria-hidden="true"></i>

                    <span>Manage Restaurant</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="sidebarMaps">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.category.index') }}">Category</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.product.index') }}">Product</a>
                        </li>
                    </ul>
                </div>
            </li>



            {{-- ecommerce --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#delivery" aria-expanded="false" aria-controls="delivery"
                    class="side-nav-link">
                    <i class="fa fa-truck" aria-hidden="true"></i>

                    <span>Manage Ecommerce</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="delivery">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.coupon.index') }}">Coupon</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.delivery.index') }}">Delivery Area</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- subscribes --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#subscribe" aria-expanded="false" aria-controls="subscribe"
                    class="side-nav-link">
                    <i class="fa fa-users" aria-hidden="true"></i>

                    <span>Manage Subscribers</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="subscribe">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.newsletter.index') }}">Newsletter</a>
                        </li>
                    </ul>
                </div>
            </li>

            {{-- sections --}}
            <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#slider" aria-expanded="false" aria-controls="slider"
                    class="side-nav-link">
                    <i class="fa fa-puzzle-piece" aria-hidden="true"></i>

                    <span>Manage Sections</span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="slider">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.about.create') }}">About Page</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.contact.create') }}">Contact Page</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.terms_condition.create') }}">Temrs & Condition</a>
                        </li>


                        <li>
                            <a href="{{ route('admin.social_link.create') }}">Social Link</a>
                        </li>


                        <li>
                            <a href="{{ route('admin.footer.create') }}">Footer</a>
                        </li>

                    </ul>
                </div>
            </li>

            {{-- settings --}}
            {{-- <li class="side-nav-item">
                <a data-bs-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings"
                    class="side-nav-link">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    <span> Manage Settings </span>
                    <span class="menu-arrow"></span>
                </a>
                <div class="collapse" id="settings">
                    <ul class="side-nav-second-level">
                        <li>
                            <a href="{{ route('admin.settings.index') }}">App Settings</a>
                        </li>

                        <li>
                            <a href="{{ route('admin.payment_settings.index') }}">Payment Settings</a>
                        </li>

                    </ul>
                </div>
            </li> --}}

        </ul>

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
