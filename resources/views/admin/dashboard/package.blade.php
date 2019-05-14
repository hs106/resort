@extends('layouts.admin-master')

@section('title')
Packages
@endsection

@section('content')
<section class="section">
  	<div class="section-header">
    		<h1>Packages</h1>
  	</div>
  	<div class="section-body">
  		<div class="row">
  		  <div class="col-12">
  		    <div class="card">
  		      <div class="card-header">
  		        <h4>All Packages</h4>
  		      </div>
  		      <div class="card-body">
  		        <div class="table-responsive">
  		          <table class="table table-striped" id="packages-table">
  		            <thead>
  		              <tr>
  		               	  	<th>Feature Image</th>
  		               		<th>Title</th>
  		               		<th>Location </th>
  		               		<th>Price </th>
  		               		<th>Sale End Time </th>
  		               		<th>Action</th>
  		              </tr>
  		            </thead>
  		            <tbody>
  		            		 @foreach($packages as $row)
  		            			  <tr>
  		            				    <td><img src="{{ asset('upload/'.$row->featured_image) }}" width="200px"></td>
  		            				    <td>{{$row->title}}</td>
  		            				    <td>{{$row->location}}</td>
  		            				    <td>{{$row->price}}</td>
  		            				    <td>{{$row->sales_end_time}}</td>
  		            				   <td>
  		            				   	<button type="button" class="btn btn-primary btn-icon icon-left show-package" data-id="{{$row->id}}" data-toggle="modal" data-target="#show-package-modal">
    				   	                        	<i class="far fa-eye"></i> View 
    				   	                      	</button>
    				   	                      	<button type="button" class="btn btn-warning btn-icon icon-left" onclick="location.href='{{ url('admin/edit-package/'.$row->id) }}';">
	   	                      	                        	<i class="fas fa-pen-fancy"></i> Edit 
	   	                      	                      	</button>
	   	                      	                      	<button type="button" class="btn btn-danger btn-icon icon-left delete-package" data-id="{{ $row->id }}">
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
<div class="modal fade" tabindex="-1" role="dialog" id="show-package-modal">
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
		$('.delete-package').click(function () {
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
		      			     	url: '{{ route("admin.delete-package") }}' ,
		      			     	type: "POST",
		      			     	dataType: "json",
		      			     	data: { 
		      			     		id : id
		      			     	},
		      			     	async: false,
		      			     	success: function( response ) {
		      			     		cu.parent('td').parent('tr').remove()
		      			     		swal('Success! Your package has been deleted!', {
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

	$('.show-package').click(function() {
		var id = $(this).data('id');
                $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                 });
		$.ajax({
		     	url: '{{ route("admin.view-package") }}' ,
		     	type: "post",
		     	dataType: "json",
		     	data: { 
		     		id : id
		     	},
		     	async: false,
		     	success: function( response ) {
		     		console.log(response);
                                $('#show-package-modal').find('.content').html(response.view);
		     	}
		});
	});
</script>
@endsection
