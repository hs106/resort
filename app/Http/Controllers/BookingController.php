<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Packages;
use App\Bookings;
class BookingController extends Controller
{
	public function index () {
		$get_bookings = Bookings::all()->where('delete', 0);
		return view('admin.dashboard.bookings')->with('bookings', $get_bookings);
	}

	public function addBooking () {
		$get_packages = Packages::all();
		return view('admin.dashboard.addBooking')->with('packages', $get_packages);
	}

	public function editBooking ($id) {
		$get_packages = Packages::all();
		$booking = Bookings::find($id);
		return view('admin.dashboard.editBooking')->with(array ('packages'=>$get_packages, 'booking' => $booking));
	}

	public function saveBooking (Request $request) {
    		$data = $request->all();
    		$booking = new Bookings;
    		if (isset($data['booking'])) {
    			$booking->exists = true;
    			$booking->id = $data['booking'];
    		}
		$booking->fullname = $data['fullname'];
		$booking->phone = $data['phone'];
		$booking->email = $data['email'];
		$booking->package_id = $data['package'];
		if (isset($data['status'])) {
			$booking->status = $data['status'];
		}
		$booking->save();
		if($booking->id && isset($data['booking'])){ 
			$arr = array('msg' => 'Reservation has been updated successfully!', 'status' => true);
		} else if ($booking->id && isset($data['guest'])) {
			$enc_book_id = encrypt($booking->id);
			Cookie::queue(Cookie::make('booking', $enc_book_id, 10));
			$arr = array('msg' => 'Reservation has been added successfully!', 'status' => true);
		} else if ($booking->id) {
			$arr = array('msg' => 'Reservation has been added successfully!', 'status' => true);
		} else {
			$arr = array('msg' => 'Something goes to wrong. Please try again later!', 'status' => false);
		}
		return Response()->json($arr);
    	}

    	public function deleteBooking (Request $request) {
		$data = $request->all();
		$id = $data['id'];
		$booking = Bookings::where('id', $id)->update(array ('delete'=> 1));
		if ($booking) {
			$arr = array('msg' => 'Successfully deleted package.', 'status' => true);
 			return Response()->json($arr);
		}
	}

	public function viewBooking (Request $request) {
		$id = $request->id;
		$get_booking = Bookings::find($id);
		$view = view('admin.dashboard.showBooking')->with('booking', $get_booking)->render();
		$arr = array('msg' => 'Successfully loaded booking.', 'view' => $view);
 		return Response()->json($arr);
	}

	public function checkout () {
		
	}
}
