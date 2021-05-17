
<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm">
    <div class="container">
        <a href="/"><img src="{{ asset('/img/logomod.png') }}" class="logo-img" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @if (Route::has('login'))
                @auth
                @else
                    <a class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register"
                        href="{{ route('login') }}">{{ __('Login') }}
                    </a>

                    <a class="query-submit btn btn-outline-success my-2 my-sm-0 btn-register "
                        href="{{ route('register') }}">{{ __('Register') }}
                    </a>
                @endif
                @endauth
                @auth
                <li class="nav-item dropdown">
                    <div class="d-flex align-items-center">
                            <figure class="doctor-smallpic-dashboard-container ">
                                <a href="/doctor/{{Auth::user()->id}}">
                                @if(file_exists('storage/'.Auth::user()->detail->pic))

                                <img class="doctor-smallpic-dashboard"
                                        src="{{ URL::asset('storage/'.Auth::user()->detail->pic) }}"
                                        alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">
                                    </a>

                                @elseif(file_exists(Auth::user()->detail->pic))
                                    <img class="doctor-smallpic-dashboard" src="{{ URL::asset(Auth::user()->detail->pic)}}"
                                    alt="{{Auth::user()->name}} {{Auth::user()->lastname}}">

                                @else

                                    <a href="../doctor/{{Auth::user()->id}}"><img class="doctor-smallpic-dashboard"
                                        src="https://cdn4.iconfinder.com/data/icons/small-n-flat/24/user-alt-512.png"
                                        alt="{{ Auth::user()->name }} {{ Auth::user()->lastname }}">
                                    </a>

                                @endif
                            </figure>

                        <a id="navbarDropdown" class="nav-link dropdown-toggle ml-2" href="#" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->lastname }}
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/dashboard">
                                {{ __('Dashboard')}}
                            </a>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
