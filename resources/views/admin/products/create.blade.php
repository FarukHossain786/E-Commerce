@extends('layouts.app')
@include('admin/_navber')
@include('admin/_main') 

<form  action="{{route('admin.product.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	<div class="row">
        @csrf
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
                    @if ($message = Session::get('message'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif
				</div>
				<div class="col-lg-12">
					<label class="form-control-label">Title: </label>
					<input type="text" id="txturl" name="title" class="form-control " value="{{ old('title') }}" />
				</p>
			</div>
		</div>
		<div class="form-group row">
			
			<div class="col-lg-12">
				<label class="form-control-label">Description: </label>
				<textarea name="description" id="editor" class="form-control ">{{ old('description') }}</textarea>
			</div>
		</div>
		<div class="form-group row">
			<div class="col-6">
				<label class="form-control-label">Price: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">₹</span>
					</div>
					<input type="text" class="form-control" placeholder="0.00" aria-label="Username" aria-describedby="basic-addon1" name="price" value="{{ old('price') }}" />
				</div>
			</div>
			<div class="col-6">
				<label class="form-control-label">Discount: </label>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">₹</span>
					</div>
					<input type="text" class="form-control" name="discount_price" placeholder="0.00" aria-label="discount_price" aria-describedby="discount" value="{{ old('discount_price') }}" />
				</div>
            </div>
            <div class="col-3">
                <div class="form-group row">
                    <div class="col-lg-12">
                        <input type="submit" name="submit" class="btn btn-primary btn-block " value="Add Product" />
                    </div>
                    
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
						<option value="0" >Pending</option>
						<option value="1">Publish</option>
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
					<img src=" {{asset('images/default-image.jpg')}}" id="imgthumbnail" class="img-fluid" alt="" style="height: 100px;">
				</div>
			</li>
			<li class="list-group-item">
				<div class="col-12">
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text" ><input id="featured" type="checkbox" name="featured" value="" /></span>
						</div>
						<p type="text" class="form-control" name="featured" placeholder="0.00" aria-label="featured" aria-describedby="featured" >Featured Product</p>
					</div>
				</div>
			</li>
			<li class="list-group-item active"><h5>Select Categories</h5></li>
			<li class="list-group-item ">
				<select name="category_id[]" id="select2" class="form-control" multiple>
					<option value="0">Select Category</option>
					@if($categories->count() > 0)
					@foreach($categories as $category)
					   <option value="{{$category->id}}"
					>{{$category->title}}</option>
					@endforeach
                    @endif
				</select>
			</li>
		</ul>
	</div>
</div>
</form>


@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript"> 

	function readFile(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function(e) {
			$('#imgthumbnail').attr('src', e.target.result);
			}
			
			reader.readAsDataURL(input.files[0]); // convert to base64 string
		}
	}

$("#thumbnail").change(function() {
	readFile(this);
});


	//  function imageChange() {
	// 		var file = $(this).get(0).files;
	// 		var reader = new FileReader();
	// 		reader.readAsDataURL(file[0]);
	// 	reader.addEventListener("load", function(e) {
	// 			var image = e.target.result;
	// 			$("#imgthumbnail").attr('src', image);
	// 	});
	// });

	$('#featured').on('change', function(){
		if($(this).is(":checked"))
			$(this).val(1)
		else
			$(this).val(0)
	})
	</script>
@endsection