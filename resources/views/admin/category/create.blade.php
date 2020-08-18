@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('error'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
<div>
    <form method="POST" action="{{route('admin.category.store')}}">
        @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter Title">
        
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea class="form-control" name="description" ></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
       
      </form>
</div>