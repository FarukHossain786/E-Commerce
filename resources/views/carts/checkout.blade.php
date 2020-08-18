@extends('layouts.app')
@include('_navbermain')
@section('content')
<div class="container">
    <h1>CheckOut</h1>
    <h3>Shipping Information</h3>
    <div class="col-sm-12">
        @if ($message = Session::get('message'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <div class="col-sm-12">
        @if ($message = Session::get('error'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
        @endif
    </div>
    <form action="{{route('orders.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="">Full Name</label>
            <input type="text" name="shipping_fullname" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">State</label>
            <input type="text" name="shipping_state" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">City</label>
            <input type="text" name="shipping_city" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Zip</label>
            <input type="number" name="shipping_zipcode" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Full Address</label>
            <input type="text" name="shipping_address" id="" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Mobile</label>
            <input type="text" name="shipping_phone" id="" class="form-control">
        </div>

        <h4>Payment option</h4>

        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="payment_method" id="" value="cash_on_delivery">
                Cash on delivery

            </label>

        </div>

        <div class="form-check">
            <label class="form-check-label">
                <input type="radio" class="form-check-input" name="payment_method" id="" value="paypal">
                Paypal

            </label>

        </div>


        <button type="submit" class="btn btn-primary mt-3">Place Order</button>


    </form>
</div>
    
@endsection
@section('script')
    
@endsection