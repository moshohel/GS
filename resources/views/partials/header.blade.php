<header class="header_wrap fixed-top header_with_topbar">
    <div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <ul class="contact_detail text-center text-lg-left">
                            <li><i class="ti-mobile"></i><span>01676787950</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-center text-md-right">
                        <ul class="header_list">

                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}"
                                        class="img rounded-circle" style="width:40px">
                                    {{ Auth::user()->first_name }} {{ Auth::user()->last_name }} <span
                                        class="caret"></span>
                                </a>

                                <div class="dropdown dropdown-menu dropdown-menu-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown dropdown-item" data-target="dropdown"
                                        href="{{ route('user.dashboard') }}" onclick="event.preventDefault();
                                                        document.getElementById('dashboard-form').submit();">
                                        {{ __('Dashboard') }}
                                    </a>

                                    <form id="dashboard-form" action="{{ route('user.dashboard') }}" method="GET"
                                        style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown dropdown-item" data-target="dropdown"
                                        href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>


                                </div>


                            </li>
                            @endguest
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
        <div class="container">
            {{-- START NAV --}}

            @include('partials.nav')

            {{-- END NAV --}}
        </div>
    </div>
</header>