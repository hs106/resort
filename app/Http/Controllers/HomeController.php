<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use App\Bookings;
use DateTime;

class HomeController extends Controller
{
	function index () {
    		$get_packages = Packages::all()->where('status', 1);
        	return view('index')->with('packages', $get_packages);;    
    	}
    	function resotPreview($slug){
    		$package = Packages::where('slug', $slug)->firstOrFail();
    		return view('singleResort')->with('package', $package);
    	}
}
