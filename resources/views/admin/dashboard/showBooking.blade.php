<div class="modal-body">
	<section class="booking-detail detail-pkg">
		<div class="row">
			<div class="col-md-4">
				<h5>Full Name</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->fullname}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Phone</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->phone}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Email</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->email}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Package</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->package->title}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Reservation Date</h5>
			</div>
			<div class="col-md-8">
				<p>{{ ($booking->reservation_date) ?  $booking->reservation_date : 'Not Selected'}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Adults</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->adults}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Children</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->children}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Payment Status</h5>
			</div>
			<div class="col-md-8">
				@php $statuses = array ('Pending', 'Done'); 
				$label = array ('primary', 'success'); @endphp
				@foreach($statuses as $key => $value)
				        @if ($booking->payment_status == $key) 
				                <p class="badge badge-{{$label[$key]}}">{{$value}}</p>
				        @endif
				@endforeach
			</div>
		</div>
		@php 
		if ($booking->payment_status == 1) { 
		@endphp
		<div class="row">
			<div class="col-md-4">
				<h5>Credit Card Number</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->credit_card_number}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Credit Card CVV</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->credit_card_cvv}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Credit Card Expiry</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->credit_card_month.'/'.$booking->credit_card_year}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Authenticaton code</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->auth_code}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Transaction Id</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->transaction_id}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Account Type</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->account_type}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Address</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->address}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>City</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->city}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>State</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->state}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Country</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->country}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Zip Code</h5>
			</div>
			<div class="col-md-8">
				<p>{{$booking->zip_code}}</p>
			</div>
		</div>
		@php
		}
		@endphp
		<div class="row">
			<div class="col-md-4">
				<h5>Status</h5>
			</div>
			<div class="col-md-8">
				@php $statuses = array ('Pending', 'Processed', 'Completed'); 
				$label = array ('primary', 'secondary', 'success'); @endphp
				@foreach($statuses as $key => $value)
				        @if ($booking->status == $key) 
				                <p class="badge badge-{{$label[$key]}}">{{$value}}</p>
				        @endif
				@endforeach
			</div>
		</div>
	</section>
</div>
<div class="modal-footer bg-whitesmoke br">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-warning btn-icon icon-left" onclick="location.href='{{ url('admin/edit-booking/'.$booking->id) }}';">
        	<i class="fas fa-pen-fancy"></i> Edit 
      	</button>
</div>