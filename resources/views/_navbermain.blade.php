<nav class="navbar navbar-expand-md  bg-info shadow-sm mb-4">
    <div class="container">
        <i class="fab fa-stripe-s"></i>
        <i class="fab fa-stripe-s mr-2"></i>


        <a class="text-white mr-2" style="text-decoration: none;" href="{{route('products.all')}}">Home</a>  
        <a class="text-white mr-2" style="text-decoration: none;" href="">Electronics</a>
        <a class="text-white mr-2" style="text-decoration: none;" href="">Phone's</a> 
        <a class="text-white mr-2" style="text-decoration: none;" href="">Laptop's</a> 
        <a class="text-white mr-2" style="text-decoration: none;" href="">Accessories</a> 


           <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <form class="form-inline">
                              <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success my-2 my-sm-0 bg-danger" type="submit">Search</button>
                            </form>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('cart.index')}}">
                            <i class="fas fa-cart-plus text-danger"> Cart</i>
                            <div class="badge bg-info text-danger">
                                @auth
                                {{Cart::session(auth()->id())->getContent()->count()}} 
                                @else
                                 0
                                @endauth
                               
                            </div>
                        </a>
                    </li>
                    <!-- Authentication Links -->
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
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->profile->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
