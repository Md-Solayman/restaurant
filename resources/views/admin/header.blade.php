<div class="navbar-custom">
    <ul class="list-unstyled topbar-menu float-end mb-0">
        <li class="dropdown notification-list d-lg-none">
            <a class="nav-link dropdown-toggle arrow-none" data-bs-toggle="dropdown" href="#" role="button"
                aria-haspopup="false" aria-expanded="false">
                <i class="dripicons-search noti-icon"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-animated dropdown-lg p-0">
                <form class="p-3">
                    <input type="text" class="form-control" placeholder="Search ..."
                        aria-label="Recipient's username">
                </form>
            </div>
        </li>

        <li class="dropdown notification-list">
            <a class="nav-link dropdown-toggle nav-user arrow-none me-0" data-bs-toggle="dropdown" href="#"
                role="button" aria-haspopup="false" aria-expanded="false">
                <span class="account-user-avatar">
                    <!-- @if (Auth::guard('admin')->user()->image == '')
                        <img src="{{ Avatar::create(Auth::guard('admin')->user()->name)->toBase64() }}"
                            class="rounded-circle" />
                    @else
                        <img src="{{ asset('/uploads/admin') }}/{{ Auth::guard('admin')->user()->image }}"
                            class="rounded-circle" width="50" height="50" alt="">
                    @endif -->
                </span>
                <span>
                    <span class="account-user-name">{{ Auth::guard('admin')->user()->name }}</span>
                    <span class="account-position">Admin</span>
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animated topbar-dropdown-menu profile-dropdown">
                <!-- item-->
                <div class=" dropdown-header noti-title">
                    <h6 class="text-overflow m-0">Welcome !</h6>
                </div>

                <!-- item-->
                <a href="{{ route('admin.profile') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-circle me-1"></i>
                    <span>Profile</span>
                </a>

                <!-- item-->
                <a href="{{ route('admin.logout') }}" class="dropdown-item notify-item">
                    <i class="mdi mdi-account-edit me-1"></i>
                    <span>Logout</span>
                </a>


            </div>
        </li>

    </ul>
    <button class="button-menu-mobile open-left">
        <i class="mdi mdi-menu"></i>
    </button>
    <div class="app-search dropdown d-none d-lg-block" style="margin-left: 200px;">
        <form>
            <div class="input-group">
                <input type="text" class="form-control dropdown-toggle" placeholder="Search..." id="top-search">
                <span class="mdi mdi-magnify search-icon"></span>
                <button class="input-group-text btn-primary" type="submit">Search</button>
            </div>
        </form>


    </div>
</div>
