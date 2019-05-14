<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;

class PackagesController extends Controller
{
	public function index () {
		$get_packages = Packages::all()->where('status', 1);
		return view('admin.dashboard.package')->with('packages', $get_packages);
	}

	public function addPackages () {
		return view('admin.dashboard.addPackage');
	}
	public function savePackage (Request $request) {
		request()->validate([
		        'title' => 'required',
		        'sub_title' => 'required',
		        'location' => 'required',

		        ]);
	        $data = $request->all();
	        $data['slug'] = str_slug($data['title'], '-');
	        if (isset($data['id'])) {
	        	if ($data['edited'] == 1) {
	        		$data['description'] = $this->upload_description_images($data['description']);
	        	}
	        	if ($request->featured_image && $request->hasFile('featured_image')) {
	        		$data['featured_image'] = $this->upload_image (request()->featured_image);
	        	}
	        	$check = $this->update($data);
	        } else {
	        	$data['description'] = $this->upload_description_images($data['description']);
	        	if ($request->featured_image && $request->hasFile('featured_image')) {
	        		$data['featured_image'] = $this->upload_image ($data['featured_image']);
	        	}
	        	$check = $this->create($data);
	        }
	        if($check){ 
	        	$arr = array('msg' => 'Your package has been updated successfully!', 'status' => true);
	        } else {
	        	$arr = array('msg' => 'Something goes to wrong. Please try again later!', 'status' => true);
	        }
	        return Response()->json($arr);
	}

	public function create ($data) {
		$package = new Packages;
		$package->title = $data['title'];
		$package->sub_title = $data['sub_title'];
		$package->slug = $data['slug'];
		if (isset($data['featured_image'])) {
			$package->featured_image = $data['featured_image'];
		}
		$package->location = $data['location'];
		$package->orignal_price = $data['orignal_price'];
		$package->price = $data['price'];
		$package->percent_off = $data['percent_off'];
		$package->sales_end_time = $data['sales_end_time'];
		$package->video_embed_code = $data['video_embed_code'];
		$package->description = $data['description'];
		$package->save();
		return $package->id;
	}

	public function update ($data) {
		$package = new Packages;
		$package->exists = true;
		$package->id = $data['id'];
		$package->title = $data['title'];
		$package->sub_title = $data['sub_title'];
		$package->slug = $data['slug'];
		if (isset($data['featured_image'])) {
			$package->featured_image = $data['featured_image'];
		}
		$package->location = $data['location'];
		$package->orignal_price = $data['orignal_price'];
		$package->price = $data['price'];
		$package->percent_off = $data['percent_off'];
		$package->sales_end_time = $data['sales_end_time'];
		$package->video_embed_code = $data['video_embed_code'];
		$package->description = $data['description'];
		$package->save();
		return $package->id;
	}

	public function upload_description_images ($detail) {
		$document = new \DOMDocument('1.0', 'UTF-8');
		$internalErrors = libxml_use_internal_errors(true);
		$document->loadHTML($detail);
		libxml_use_internal_errors($internalErrors);
		
	       	$images = $document->getElementsByTagName('img');
	       	foreach($images as $k => $img) {
			$data = $img->getAttribute('src');
			list($type, $data) = explode(';', $data);
			list(, $data)      = explode(',', $data);
			$data = base64_decode($data);
			$image_name= "/upload/" . time().$k.'.png';
			$path = public_path() . $image_name;
			file_put_contents($path, $data);
			$img->removeAttribute('src');
			$img->setAttribute('src', $image_name);
	       	}
	       $detail = $document->saveHTML();
	       return $detail;
	}

	public function upload_image () {
		request()->validate([  'featured_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  ]);
		$imageName = time().'.'.request()->featured_image->getClientOriginalExtension();
		request()->featured_image->move(public_path('upload'), $imageName);
		return $imageName;
	}

	public function deletePackage (Request $request) {
		$data = $request->all();
		$id = $data['id'];
		$user = Packages::where('id', $id)->update(array ('status'=> 0));
		if ($user) {
			$arr = array('msg' => 'Successfully deleted package.', 'status' => true);
 			return Response()->json($arr);
		}
	}
	public function editPackage ($id) {
		$get_package = Packages::find($id);
		return view('admin.dashboard.editPackage')->with('package', $get_package);
	}

	public function viewPackage (Request $request) {
		$id = $request->id;
		$get_package = Packages::find($id);
		$view = view('admin.dashboard.showPackage')->with('package', $get_package)->render();
		$arr = array('msg' => 'Successfully loaded package.', 'view' => $view);
 		return Response()->json($arr);
	}
}
