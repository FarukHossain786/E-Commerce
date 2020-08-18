@extends('layouts.app')
@include('_navbermain')
<div class="container">
<h1>Carts</h1>
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

<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
            
            <th>Title</th>
            <th>Price</th>
            <th>qty</th>
            {{-- <th>Photo</th> --}}
            <th>Actions</th>
          </tr>
      </thead>
      <tbody>
          @foreach ($cartItems as $item)
                <tr>
                    <th>{{$item->name}}</th>
                    <th>{{$item->price}}</th>
                    <th>
                        <form action="{{route('cart.update', $item->id)}}">
                            <input type="number" name="quantity" style="width: 100px" value="{{$item->quantity}}">
                            <input type="submit" class="btn btn-warning" value="Update">
                        </form>
                        
                       
                    </th>
                    {{-- <th>{{$item->photo}}</th> --}}
                {{-- <th>
                    <img src="{{asset('storage/'.$item->photo)}}" 
                    alt="{{$item->title}}" class="img-responsive" height="50"/>
                </th> --}}
                <th>
                    {{-- <form action="{{ route('cart.destroy',$item->id) }}" method="POST"> --}}
                        {{-- <a href="{{route('admin.product.edit',$item->id)}}" type="button" class="btn btn-warning">Edit</a> --}}
                        
                        {{-- @csrf
                        @method('DELETE') --}}
                        <a  type="submit" href="{{ route('cart.destroy', $item->id) }}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</a>   
                    {{-- </form> --}}
                </th>
            </tr>
          @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-between">
        <div >
            <h3>Total Price :₹{{\Cart::session(auth()->id())->getTotal()}}</h3>
        </div>
        <div>
            <a type="button" href="{{route('cart.checkout')}}" class="btn btn-primary">Proceed to checkout</a>
        </div>
    </div>
</div>
</div>