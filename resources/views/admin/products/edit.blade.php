@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main')

<form  action="{{route('admin.product.update', $product->id)}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="row">
        @csrf
        @method('PUT')
		<div class="col-lg-9">
			<div class="form-group row">
				<div class="col-sm-12">
					@if ($errors->any())
					<div class="alert alert-danger">
						<ul>
							@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
					@endif
				</div>
				<div class="col-sm-12">
					@if (session()->has('message'))
					<div class="alert alert-success">
						{{session('message')}}
					</div>
					@endif
				</div>
				<div class="col-lg-12">
					<label class="form-control-label">Title: </label>
					<input type="text" id="txturl" name="title" class="form-control " value="{{@$product->title}}" />
				</p>
			</div>
		</div>
		<div class="form-group row">
			
			<div class="col-lg-12">
				<label class="form-control-label">Description: </label>
				<textarea name="description" id="editor" class="form-control ">{!! @$product->description !!}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-6">
				<label class="form-control-label">Price: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
                    <input type="text" class="form-control" placeholder="0.00" aria-label="Username" 
                    aria-describedby="basic-addon1" name="price" value="{{@$product->price}}" />
				</div>
			</div>
			<div class="col-6">
				<label class="form-control-label">Discount: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">$</span>
					</div>
                    <input type="text" class="form-control" name="discount_price" placeholder="0.00"
                     aria-label="discount_price" aria-describedby="discount" value="{{@$product->discount_price}}" />
				</div>
			</div>
        </div>
        <div class="col-3">
        <div class="form-group row">
            <div class="col-lg-12">
                <input type="submit" class="btn btn-primary btn-block " value="Update" />
            </div>
            
        </div>
        </div>
	</div>
	<div class="col-lg-3">
		<ul class="list-group row">
			<li class="list-group-item active"><h5>Status</h5></li>
			<li class="list-group-item">
				<div class="form-group row">
					<select class="form-control" id="status" name="status">
						<option value="0" @if(isset($product) && $product->status == 0) {{'selected'}} @endif >Pending</option>
						<option value="1" @if(isset($product) && $product->status == 1) {{'selected'}} @endif>Publish</option>
					</select>
				</div>
				
			</li>
			<li class="list-group-item active"><h5>Feaured Image</h5></li>
			<li class="list-group-item">
				<div class="input-group mb-3">
					<div class="custom-file ">
						<input type="file"  class="custom-file-input" name="thumbnail" id="thumbnail">
						<label class="custom-file-label" for="thumbnail">Choose file</label>
					</div>
				</div>
				<div class="img-thumbnail  text-center">
                    <img src="{{@asset('storage/'.$product->thumbnail)}}" id="imgthumbnail" class="img-fluid" alt="" 
                    style="width: 100px; height: 100px; ">
				</div>
			</li>
			<li class="list-group-item">
				<div class="col-12">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" ><input id="featured" type="checkbox" name="featured" value="{{$product->featured}}" /></span>
						</div>
						<p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured Product</p>
					</div>
				</div>
			</li>
			<li class="list-group-item active"><h5>Select Categories</h5></li>
            
            <li class="list-group-item ">
				<select name="category_id[]" id="select2" class="form-control" multiple>
                     
                    @foreach($product->categories as $category)
                            <option  value="{{$category->id}}">{{$category->title}}</option>
                        @endforeach
                   
				</select>
            </li>
           
		</ul>
	</div>
</div>
</form>
@section('scripts')
<script type="text/javascript">
	$(function(){
			ClassicEditor.create( document.querySelector( '#editor' ), {
		toolbar: [ 'Heading', 'Link', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote','undo', 'redo' ],
	})
.then( editor => {
console.log( editor );
} )
.catch( error => {
console.error( error );
} );
     
$('#thumbnail').on('change', function() {
var file = $(this).get(0).files;
var reader = new FileReader();
reader.readAsDataURL(file[0]);
reader.addEventListener("load", function(e) {
var image = e.target.result;
$("#imgthumbnail").attr('src', image);
});
});

$('#featured').on('change', function(){
	if($(this).is(":checked"))
		$(this).val(1)
	else
		$(this).val(0)
})
})
</script>
@endsection