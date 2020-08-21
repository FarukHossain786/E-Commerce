<head>
<style>
    .photo{
        vertical-align: middle; 
        width: 50px; 
        height: 50px; 
        border-radius: 50%;
        margin-right: 3px;
        padding: 2px;
    }
    .text{
        color: rgb(182, 36, 126);
        font-size: 15px;
    }
    .hover:hover{
        color: rgb(67, 22, 126);
    }
    .logo{
        color: rgb(136, 9, 87);
        margin-left: 70px;
    }
    .logo1{
        color: rgb(136, 9, 87);
    }
    .profile{
        margin-top: 16px;

    }
    .profileItem{
        padding: 10px;
    }
    .d {
        position: relative;
        display: inline-block;
}

.d-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  padding: 12px 16px;
  z-index: 1;
}

.d:hover .d-content {
  display: block;
}
</style>
</head>
<nav class="navbar navbar-expand-md  bg-info shadow-sm mb-4">
    <a href="{{route('products.all')}}"class="d-flex" style="text-decoration: none;">
        <h1 class="logo">s</h1>
        <h1 class="logo1">s</h1>
    </a>
    <div class="container">
         @if (!empty(Auth::user()->profile->id))
            <img class="photo" src="{{asset('storage/'.Auth::user()->profile->photo)}}" alt="Avatar" class="avatar">
         @else
             <img class="photo" src="{{asset('images/default-image.jpg')}}" alt="Avatar" class="avatar">
         @endif
        
         <div class="d">
            <p class="profile text mr-2 hover" data-toggle="dropdown">Profile</p>
            <div class="d-content">
                @if (!empty(Auth::user()->profile->id))
                    <a class="text mr-2 hover profileItem" style="text-decoration: none;" href="{{@route('user.profile.edit', Auth::user()->profile->id)}}">Edit Profile</a>
                @else
                    <a class="text mr-2 hover profileItem" style="text-decoration: none;" href="{{@route('user.profile.create')}}">Create Profile</a>
                @endif
                <a class="text mr-2 hover profileItem" style="text-decoration: none;"
                 href="
                 @auth {{route('user.profile.show', Auth::user()->profile)}}@else {{route('user.profile.create')}}  @endauth 
                  
                    ">View Profile</a>
            </div>
          </div>
        <a class="text mr-2 hover" style="text-decoration: none;" href="{{route('products.all')}}">Home</a>  
        <a class="text mr-2 hover" style="text-decoration: none;" href="{{route('products.headphone.product')}}">Headphone's</a>
        <a class="text mr-2 hover" style="text-decoration: none;" href="{{route('products.mobile.product')}}">Phone's</a> 
        <a class="text mr-2 hover" style="text-decoration: none;" href="{{route('products.laptop.product')}}">Laptop's</a>
        <a class="text mr-2 hover" style="text-decoration: none;" href="{{route('products.charger.product')}}">Charger's</a> 
        <a class="text mr-2 hover" style="text-decoration: none;" href="{{route('products.accessories.product')}}">Accessories</a> 


           <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                            <form class="form-inline " action="{{route('products.search')}}" method="GET" style="padding: 0px; margin: 3px;">
                              <input class="form-control mr-2" name="query" id="query" value="{{request()->input('query')}}"
                               style="height: 20px;" type="search" placeholder="Search" aria-label="Search">
                              <button class="btn btn-outline-success bg-danger"  style=" padding: 2px;" type="submit">Search</button>
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
                        <a class="nav-link text" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link text" href="{{route('user.profile.create')}}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle text " 
                        href="#" role="button" data-toggle="dropdown" aria-haspopup="true" 
                        aria-expanded="false" v-pre>
                        
                        @if (!empty(Auth::user()->profile->name))
                        {{ Auth::user()->profile->name }} 
                        @else
                        {{ Auth::user()->email }} 
                        @endif

                           <span class="caret"></span>
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
