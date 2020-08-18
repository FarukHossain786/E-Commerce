@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
@if ($message = Session::get('delete'))
    <div class="alert alert-danger">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="d-flex flex-row ">
    <h1 class="mr-3">Category</h1>
    <a href="{{route('admin.category.create')}}"><button class="btn btn-info ml-3 p-2">Add Category</button></a>

</div>
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
         <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
         </tr>
      </thead>
      <tbody>
            @foreach ($categories as $item)
                <tr>
                    <th>{{$item->id}}</th>
                    <th>{{$item->title}}</th>
                    <th>{{$item->description}}</th>
                    <th>
                        <form action="{{ route('admin.category.destroy',$item->id) }}" method="POST">
                            <a href="{{route('admin.category.edit',$item->id)}}" type="button" class="btn btn-warning">Edit</a>
                            
                            @csrf
                            @method('DELETE')
                            <button  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')">Delete</button>   
                </form>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            {{$categories->links()}}
      </nav>
</div>