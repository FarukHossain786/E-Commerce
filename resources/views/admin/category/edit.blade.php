@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main')

<div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
   @endif
    <form method="POST" action="{{route('admin.category.update', $category->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
          <label for="exampleInputEmail1">Title</label>
          <input type="text" name="title" class="form-control" id="exampleInputEmail1" value="{{ $category->title }}">
        
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Description</label>
          <textarea class="form-control" name="description">{{ $category->description }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-warning">Update</button>
       
      </form>
</div>