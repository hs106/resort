<div class="modal-body">
	<div class="row">
		<div class="col-md-12">
			<div class="feature-img">
				<img src="{{asset('upload/'.$package->featured_image)}}" width="100%">
			</div>
		</div>
	</div>
	<section class="detail-pkg">
		<div class="row">
			<div class="col-md-4">
				<h5>Title</h5>
			</div>
			<div class="col-md-8">
				<p>{{$package->title}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Sub Title</h5>
			</div>
			<div class="col-md-8">
				<p>{{$package->sub_title}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Location</h5>
			</div>
			<div class="col-md-8">
				<p>{{$package->location}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Orignal Price</h5>
			</div>
			<div class="col-md-8">
				<p>{{$package->orignal_price}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Price</h5>
			</div>
			<div class="col-md-8">
				<p>{{$package->price}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Percent Off</h5>
			</div>
			<div class="col-md-8">
				<p>{{$package->percent_off}}</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Video</h5>
			</div>
			<div class="col-md-8">
				@php 
	 		        	$embed = html_entity_decode($package->video_embed_code);
	 		        	echo $embed;
	 		        @endphp
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<h5>Description</h5>
			</div>
			<div class="col-md-8">
				@php 
	 		        	echo $package->description
	 		        @endphp
			</div>
		</div>
	</section>
</div>
<div class="modal-footer bg-whitesmoke br">
	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	<button type="button" class="btn btn-warning btn-icon icon-left" onclick="location.href='{{ url('admin/edit-package/'.$package->id) }}';">
        	<i class="fas fa-pen-fancy"></i> Edit 
      	</button>
</div>