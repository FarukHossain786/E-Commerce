@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main')
@if ($message = Session::get('message'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm" style="background: rgb(214, 148, 187)">
      <thead style="background: rgb(204, 76, 204)">
        <tr>
            <th>#</th>
            <th>Order Number</th>
            <th>Total Amount</th>
            <th>No-of-Item</th>
            <th>Method-of-Payment</th>
            <th>Castomer Name</th>
            <th>Shipping Address</th>
            <th>Status</th>
          </tr>
      </thead>
      <tbody>
    
            @foreach ($orders as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->order_number}}</th>
                    <th>{{$item->grand_total}}</th>
                    <th>{{$item->item_count}}</th>
                    <th>{{$item->payment_method}}</th>
                    <th>{{$item->shipping_fullname}}</th>
                    <th>{{$item->shipping_address}},{{$item->shipping_city}},{{$item->shipping_state}},{{$item->shipping_zipcode}}</th>
                    <th>{{$item->status}}</th>
                </tr>
            @endforeach
    
        </tbody>
    </table>
      <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{$orders->links()}}
      </nav>
</div>