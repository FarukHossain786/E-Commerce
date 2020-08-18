<div id="demo" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
  
    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <a href="{{route('products.single', 47)}}"> <img style="width: 100%; height: 400px;" src="{{asset('images/jbl.jpg')}}"></a>
      </div>
      <div class="carousel-item">
       <a href="{{route('products.single', 46)}}"> <img style="width: 100%; height: 400px;" src="{{asset('images/MI.jpg')}}" alt="Chicago"></a>
      </div>
      <div class="carousel-item">
        <a href="{{route('products.single', 45)}}"> <img style="width: 100%; height: 400px;" src="{{asset('images/samsung.jpg')}}" alt="New York"></a>
      </div>
    </div>
  
    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
  
  </div>