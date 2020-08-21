@extends('layouts.app')
@include('_navbermain')
<div class="col-sm-12">
    @if (session()->has('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
    @endif
  </div>
  <div class="col-sm-12">
    @if (session()->has('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
    @endif
  </div>
  
  <body data-gr-c-s-loaded="true">
      <main role="main">
        <div class="album py-5 bg-light">
          <div class="container">
            <div class="row">
              @foreach ($products as $product)
              <div class="col-md-4">
                <div class="card mb-4 shadow-sm ">
                  <img class="card-img-top p-4" alt=""
                   style="height: 225px; width: 250px; display: block;" src="{{asset('storage/'.$product->thumbnail)}}" data-holder-rendered="true">
                  <div class="card-body " style="height: 160px;">
                   <a href="{{route('products.single', $product)}}"> <p class="font-weight-bold">{{$product->title}}</p></a>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a type="submit" class="btn btn-sm btn-outline-secondary" href="{{route('products.single', $product)}}">View</a>
                        <a type="button" class="btn btn-sm btn-outline-secondary" href="{{route('cart.add', $product->id)}}">Add To Cart</a>
                      </div>
                      <h4 class="font-weight-bold">₹{{$product->price}}</h4>
                    </div>
                  </div>
                </div>
                
              </div>   
              @endforeach
            </div>
            {{-- <nav aria-label="Page navigation example">
              <ul class="pagination">
                  {{$products->links()}}
            </nav> --}}
          </div>  
        </div>
  
      </main>
      
      @include('_footer')
  
      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
      <script src="../../assets/js/vendor/popper.min.js"></script>
      <script src="../../dist/js/bootstrap.min.js"></script>
      <script src="../../assets/js/vendor/holder.min.js"></script>
    
  
  <svg xmlns="http://www.w3.org/2000/svg" width="508" height="225" viewBox="0 0 508 225" preserveAspectRatio="none" style="display: none; visibility: hidden; position: absolute; top: -100%; left: -100%;"><defs><style type="text/css"></style></defs><text x="0" y="25" style="font-weight:bold;font-size:25pt;font-family:Arial, Helvetica, Open Sans, sans-serif">Thumbnail</text></svg></body>