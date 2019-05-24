@extends('layouts.admin-master')

@section('title')
Add Booking
@endsection

@section('content')
<section class="section">
	 <div class="section-header">
    		<h1>Add Booking</h1>
    		<button type="button" class="btn btn-primary btn-icon icon-left align-right" onclick="location.href='{{ url('admin/bookings') }}';">
    		        <i class="fas fa-arrow-left"></i> Back
    		</button>
  	</div>
 	<div class="section-body">
 		<div class="row">
 		  <div class="col-12">
 		    <div class="card">
 		      <div class="card-header">
 		        <h4>Booking Details</h4>
 		      </div>
 		      <div class="card-body">
	 		      	<form id="booking-form" method="post" action="{{ route('admin.add-booking') }}">
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Full Name</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="fullname" id="fullname">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Phone</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="phone" id="phone">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" name="email" id="email">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Package</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control" name="package" id="package">
		 		            	<option value="">Select Package</option>
		 		            	@foreach($packages as $row)
		 		            		<option value="{{$row->id}}">{{$row->title}}</option>
		 		            	@endforeach
		 		            </select>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Reservation Date</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control datetimepicker" name="reservation_date" id="reservation_date">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Adults</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control" name="adults" id="adults">
		 		            	<option value="">Choose...</option>
		 		            	@php for($i = 1; $i < 7; $i++) { @endphp
		 		            		<option value="{{$i}}">{{$i}}</option>
		 		            	@php } @endphp
		 		            </select>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Children</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control" name="children" id="children">
		 		            	<option value="">Choose...</option>
		 		            	@php for($i = 1; $i < 7; $i++) { @endphp
		 		            		<option value="{{$i}}">{{$i}}</option>
		 		            	@php } @endphp
		 		            </select>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Address</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" id="address" name="address" placeholder="Address">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">City</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" id="city" name="city" placeholder="City">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">State</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control" id="state" name="state">
								<option value="">Choose your state</option>
								@php $state = array('Alberta', 'British Columbia', 'Manitoba', 'New Brunswick', 'Newfoundland and Labrador', 'Nova Scotia', 'Ontario', 'Prince Edward Island', 'Quebec', 'Saskatchewan', 'Northwest Territories', 'Nunavut', 'Yukon'); 
								foreach($state as $key => $value) { @endphp
								<option value="<?php echo $value ?>"><?php echo $value ?></option>
								@php } @endphp 
							</select>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Country</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control" id="country" name="country">
		 		            	@php $countries = array('USA', 'CANADA'); 
		 		            	foreach($countries as $key => $value) { @endphp
		 		            	<option value="<?php echo $value ?>"><?php echo $value ?></option>
		 		            	@php } @endphp 
		 		            </select>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Zip Code</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <select class="form-control" name="status" id="status">
		 		            	<option value="">Select Status</option>
		 		            	@php $statuses = array ('Pending', 'Processed', 'Completed'); @endphp
		 		            	@foreach($statuses as $key => $value)
		 		            		<option value="{{$key}}">{{$value}}</option>
		 		            	@endforeach
		 		            </select>
		 		          </div>
		 		        </div>
		 		        <div class="form-group row mb-4">
		 		          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
		 		          <div class="col-sm-12 col-md-7">
		 		            <button class="btn btn-primary publish-btn">Add Booking</button>
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
	var input = document.querySelector("#phone");
	window.intlTelInput(input);
    $("#booking-form").validate({
   		rules: {
	     	 fullname: {
	        	required: true,
	        	maxlength: 255
	      	},
	       	phone: {
	       		required: true,
	        },
	        email: {
	        	required: true,
	        	email: true,
	        },
	        package: {
	        	required: true,
	        },
	        status: {
	        	required: true,
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
      		var formData = new FormData($("#booking-form")[0]);
      		$.ajax({
        		url: '{{ route("admin.save-booking") }}' ,
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
        			$("#booking-form")[0].reset();
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
