@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main')
<h1>Customers</h1>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-warning">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('delete'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="table-responsive">
    <table class="table table-striped table-sm" style="background: rgb(214, 148, 187)">
      <thead style="background: rgb(204, 76, 204)">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Photo</th>
            <th>Date of Join</th>
            <th>Actions</th>
          </tr>
      </thead>
      <tbody>
    
            @foreach ($users as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <th>{{@$item->profile->title}}</th>
                    <th>{{$item->email}}</th>
                    <th>{{$item->role->name}}</th>
                    <th>{{@$item->profile->address}},{{@$item->profile->country->name}},
                        {{@$item->profile->state->name}},{{@$item->profile->city->name}},{{@$item->profile->country->pin}}</th>
                    <th>{{@$item->profile->phone}}</th>
                    <th><img src="{{@asset('storage/'.$item->profile->photo)}}" 
                        alt="{{$item->title}}" class="img-responsive" height="50"/>
                    </th>
                    <th>{{$item->created_at}}</th>
                    <th>Action</th>
                </tr>
            @endforeach
    
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{$users->links()}}
      </nav>
</div>