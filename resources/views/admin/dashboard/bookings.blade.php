@extends('layouts.admin-master')

@section('title')
Bookings
@endsection

@section('content')
<section class="section">
  	<div class="section-header">
    		<h1>Bookings</h1>
                <button type="button" class="btn btn-primary btn-icon icon-left align-right" onclick="location.href='{{ url('admin/add-booking') }}';">
                        <i class="fas fa-plus"></i> Add Booking 
                </button>
  	</div>
  	<div class="section-body">
  		<div class="row">
  		  <div class="col-12">
  		    <div class="card">
  		      <div class="card-header">
  		        <h4>All Bookings</h4>
  		      </div>
  		      <div class="card-body">
  		        <div class="table-responsive">
  		          <table class="table table-striped" id="packages-table">
  		            <thead>
  		              <tr>
  		               	  	<th>#ID.</th>
  		               		<th>Full Name</th>
  		               		<th>Phone</th>
  		               		<th>Email</th>
                                        <th>Package</th>
  		               		<th>Status</th>
  		               		<th>Action</th>
  		              </tr>
  		            </thead>
  		            <tbody>
                    		@foreach($bookings as $row)
                    			<tr>
                    			         <td>{{$row->id}}</td>
                    				<td>{{$row->fullname}}</td>
                    				<td>{{$row->phone}}</td>
                    				<td>{{$row->email}}</td>
                                                <td>{{$row->package->title}}</td>
                    				<td>
                                                        @php $statuses = array ('Pending', 'Processed', 'Completed'); 
                                                        $label = array ('primary', 'secondary', 'success'); @endphp
                                                        @foreach($statuses as $key => $value)
                                                                @if ($row->status == $key) 
                                                                        <span class="badge badge-{{$label[$key]}}">{{$value}}</span>
                                                                @endif
                                                        @endforeach
                                                </td>
                    				<td>
                    				   	<button type="button" class="btn btn-primary btn-icon icon-left show-booking" data-id="{{$row->id}}" data-toggle="modal" data-target="#show-booking-modal">
        		   	                        	<i class="far fa-eye"></i> View 
        		   	                      	</button>
        		   	                      	<button type="button" class="btn btn-warning btn-icon icon-left" onclick="location.href='{{ url('admin/edit-booking/'.$row->id) }}';">
                              	                        	<i class="fas fa-pen-fancy"></i> Edit 
                              	                      	</button>
                              	                      	<button type="button" class="btn btn-danger btn-icon icon-left delete-booking" data-id="{{ $row->id }}">
        	                      	                	<i class="fas fa-trash"></i> Delete 
        	                      	                </button>
                    				</td>
                    			</tr>
                    		@endforeach
  		            </tbody>
  		          </table>
  		        </div>
  		      </div>
  		    </div>
  		  </div>
  		</div>      
  </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="show-booking-modal">
  	<div class="modal-dialog" role="document">
    		<div class="modal-content">
      			<div class="modal-header">
        			<h5 class="modal-title">Package Detail</h5>
        			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true">&times;</span>
        			</button>
      			</div>
                        <div class="content"></div>
    		</div>
  	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function () {
		$('.delete-booking').click(function () {
			var cu = $(this);
		  	swal({
		      		title: 'Are you sure?',
		      		text: 'Once deleted, you will not be able to revert it!',
		      		icon: 'warning',
		      		buttons: true,
		      		dangerMode: true,
		    	})
		    	.then((willDelete) => {
		      		if (willDelete) {
		      			var id = $(this).data('id');
		      			$.ajaxSetup({
		      			     headers: {
		      			         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		      			     }
		      			 });
		      			$.ajax({
		      			     	url: '{{ route("admin.delete-booking") }}' ,
		      			     	type: "POST",
		      			     	dataType: "json",
		      			     	data: { 
		      			     		id : id
		      			     	},
		      			     	async: false,
		      			     	success: function( response ) {
		      			     		cu.parent('td').parent('tr').remove()
		      			     		swal('Success! Booking has been deleted!', {
		        					icon: 'success',
		      					});
		      			     	}
		      			});
		      		} else {
		      			swal('Your package is safe!');
		      		}
			});
		});
	});

	$('.show-booking').click(function() {
		var id = $(this).data('id');
                $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                 });
		$.ajax({
		     	url: '{{ route("admin.view-booking") }}' ,
		     	type: "post",
		     	dataType: "json",
		     	data: { 
		     		id : id
		     	},
		     	async: false,
		     	success: function( response ) {
                                $('#show-booking-modal').find('.content').html(response.view);
		     	}
		});
	});
</script>
@endsection
