@extends('layouts.admin-master')

@section('title')
Add Packages
@endsection

@section('content')
<section class="section">
	 <div class="section-header">
    		<h1>Add Packages</h1>
  	</div>
 	<div class="section-body">
 		<div class="row">
 		  <div class="col-12">
 		    <div class="card">
 		      <div class="card-header">
 		        <h4>Package Details</h4>
 		      </div>
 		      <div class="card-body">
	 		      	<form id="package-form" method="post" action="{{ route('admin.add-packages') }}">
		 		      	<div class="form-group row mb-4">
		 		      	  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Featured Image</label>
		 		      	  <div class="col-sm-12 col-md-7">
		 		      	    <div class="tower-file">
		 		      	        <input type="file" id="demoInput4" name="featured_image" />
		 		      	        <label for="demoInput4" class="tower-file-button">
		 		      	            <span class="mdi mdi-upload"></span>Select a File
		 		      	        </label>
		 		      	        <button type="button" class="tower-file-clear tower-file-button">
		 		      	            Clear
		 		      	        </button>
		 		      	    </div>
		 		      	  </div>
		 		      	</div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="title" id="title">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="sub_title" id="sub_title">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Location</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="location" id="location">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Orignal Pirce</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="orignal_price" id="orignal_price">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pirce</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="price" id="price">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Percent Off</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="percent_off" id="percent_off">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sales End Time</label>
		 		          <div class="col-sm-12 col-md-7">
		 		          	<input type="text" class="form-control datetimepicker" name="sales_end_time" id="sales_end_time">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Video Embed Code</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <textarea name="video_embed_code" class="summernote-simple"></textarea>
		 		          </div>
		 		        </div>
		 		        <!-- <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Sub Title</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control selectric">
		 		              <option>Tech</option>
		 		              <option>News</option>
		 		              <option>Political</option>
		 		            </select>
		 		          </div>
		 		        </div> -->
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Description</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <textarea class="summernote" name="description"></textarea>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <button class="btn btn-primary publish-btn">Publish</button>
		 		          </div>
		 		        </div>
	 		        </form>
 		      </div>
 		    </div>
 		  </div>
 		</div>
 	</div>
</section>
@endsection

@section('scripts')
<script>
$.validator.addMethod('decimal', function(value, element) {
  return this.optional(element) || /^((\d+(\\.\d{0,2})?)|((\d*(\.\d{1,2}))))$/.test(value);
}, "Please enter a correct number, format 0.00");

$(document).ready(function() {
    $("#package-form").validate({
   		rules: {
	     	 title: {
	        	required: true,
	        	maxlength: 255
	      	},
	       	location: {
	       		required: true,
	       		maxlength: 255
	        },
	        price: {
	        	required: true,
	        	decimal: true,
	        	maxlength:10,
	        },
	        orignal_price: {
	        	required: true,
	        	decimal: true,
	        	maxlength:10,
	        },
	        percent_off: {
	        	digits: true,
	        },
    	},
    	submitHandler: function(form) {
     		$.ajaxSetup({
          		headers: {
              			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          		}
      		});
      		$('.publish-btn').text('Sending..');
      		$('.publish-btn').addClass('btn-progress');
      		$('.publish-btn').addClass('disabled');
      		var formData = new FormData($("#package-form")[0]);
      		$.ajax({
        		url: '{{ route("admin.save-package") }}' ,
        		type: "POST",
         		contentType: false,
   	 		processData: false,
        		dataType: "json",
        		data: formData,
        		async: false,
        
        		success: function( response ) {
        			$('.publish-btn').text('Publish');
        			$('.publish-btn').removeClass('btn-progress');
        			$('.publish-btn').removeClass('disabled');
        			$("#package-form")[0].reset();
        			$('.summernote').summernote('reset');
        			$('.summernote-simple').summernote('reset');
            			if (response.status == true) {
    				  	iziToast.success({
    				    		title: 'Success!',
    				    		message: response.msg,
    				    		position: 'topRight'
    				  	});
            			} else {
    				  	iziToast.error({
    				    		title: 'Error!',
    				    		message: response.msg,
    				    		position: 'topRight'
    				  	});
            			}
        		}
      		});

    	}
  	});
});
</script>
@endsection
