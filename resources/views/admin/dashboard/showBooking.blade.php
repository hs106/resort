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
				<h5>Status</h5>
			</div>
			<div class="col-md-8">
				@php $statuses = array ('Pending', 'Processed', 'Completed'); 
				$label = array ('primary', 'secondary', 'success'); @endphp
				@foreach($statuses as $key => $value)
				        @if ($booking->status == $key) 
				                <span class="badge badge-{{$label[$key]}}">{{$value}}</span>
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