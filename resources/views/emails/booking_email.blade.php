@extends('beautymail::templates.ark')
@section('content')
@include('beautymail::templates.ark.heading', [
        'heading' => 'Congratulation! Your booking has been completed successfully.',
        'level' => 'h1'
    ])
@include('beautymail::templates.ark.contentStart')
<h4 class="secondary"><strong>Booking Details</strong></h4>
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
@include('beautymail::templates.ark.contentEnd')
@stop