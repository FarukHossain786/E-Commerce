@extends('layouts.app')
<div class="container">
<h2 class="modal-title">Make An Profile</h2>
<form  action="{{route('user.profile.store')}}" method="post" accept-charset="utf-8" enctype="multipart/form-data">
	@include('_userAddress')
	<div class="col-lg-3">
		<ul class="list-group row">

			<li class="list-group-item active"><h5>Profile Image</h5></li>
			<li class="list-group-item">
				<div class="input-group mb-3">
					<div class="custom-file ">
						<input type="file"  class="custom-file-input" name="photo" id="thumbnail">
						<label class="custom-file-label" for="thumbnail">Choose file</label>
					</div>
				</div>
				<div class="img-thumbnail  text-center">
					<img src=" {{asset('images/default-image.jpg')}}" id="imgthumbnail" class="img-fluid" alt="" style="height: 100px;">
				</div>
			</li>
			<li class="list-group-item">
				<div class="form-group row">
					<div class="col-lg-12">
						<input type="submit" name="submit" class="btn btn-primary btn-block " value="SUBMIT" />
					</div>

				</div>
			</li>
		</ul>
	</div>
</div>
</form>
</div>
@section('scripts')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
  function getState(val) {
	  var id= val;
	  var studentSelect = $('#states');
	  $('#states').val(null);
	  $('#states option').remove();
	$.ajax({
		type: "GET",
		url: "{{route('user.profile.state')}}/"+id,
	 }).then(function(data) {
		for(i=0; i< data.length; i++){
			var item = data[i]
			var option = new Option(item.name, item.id, false, false);
			studentSelect.append(option);
		}	
		studentSelect.trigger('change');
		});
		
}


function getCity(valCity) {
	  var idState= valCity;
	  //console.log(idState);
	  var city = $('#cities');
	  $('#cities').val(null);
	  $('#cities option').remove();
	$.ajax({
		type: "GET",
		url: "{{route('user.profile.city')}}/"+idState,
	 }).then(function(data2) {
		 //console.log(data2)
		for(i=0; i< data2.length; i++){
			var item1 = data2[i]
			var option2 = new Option(item1.name, item1.id, false, false);
			city.append(option2);
		}	
		//city.trigger('change');
 	});
		

		
}

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
  
</script>
@endsection
