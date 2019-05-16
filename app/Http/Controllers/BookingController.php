<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;
use App\Packages;
use App\Bookings;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class BookingController extends Controller
{
	public function index () {
		$get_bookings = Bookings::all()->where('delete', 0);
		return view('admin.dashboard.bookings')->with('bookings', $get_bookings);
	}

	function booking($slug = null){
    		$package_id = '';
    		if (isset($slug) && !empty($slug)) {
    			$package = Packages::where('slug', $slug)->first();
    			$package_id = $package->id;
    		}
    		return view('booking')->with('package_id', $package_id);
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
		if (Cookie::get('booking')) {
			$booking_id = decrypt( Cookie::get('booking') );
			$get_booking = Bookings::find($booking_id);
			return view('checkout')->with('booking', $get_booking);
		} else {
			return redirect('/');
		}
	}

	public function completeReservation (Request $request) {
		$data = $request->all();
		$booking = new Bookings;
		$booking->exists = true;
		$booking->id = $data['booking'];
		$response = $this->do_payment ($request);
		if ($response != null){
			$tresponse = $response->getTransactionResponse();
			if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
				$booking->payment_status = 1;
				$booking->auth_code = $tresponse->getAuthCode();
				$booking->transaction_id = $tresponse->getTransId();
				$booking->account_type = $tresponse->getAccountType();
			} else {
				// echo "Charge Credit Card ERROR :  Invalid response\n";
				return back()->with('msg', 'Invalid Credit Card! Please try another.');
			}
		} else {
			return back()->with('msg', 'Invalid Credit Card! Please try another.');
		}
		$booking->address = $data['address'];
		$booking->city = $data['city'];
		$booking->country = $data['country'];
		$booking->zip_code = $data['zip_code'];
		/*$booking->credit_number = $data['credit_card_number'];
		$booking->cvv = $data['credit_card_cvv'];
		$booking->exp_month = $data['credit_card_month'];
		$booking->exp_year = $data['credit_card_year'];*/
		$booking->save();
		// if ($booking->id) {
		return redirect('/thankyou');
		// }

	}

	public function guestBooking (Request $request) {
		$data = $request->all();
		$booking = new Bookings;
		if (isset($data['hide_dates']) && $data['hide_dates'] == true) {
			$booking->reservation_date = $data['reservation_date'];
		}
		if (isset($data['adults'] )) { $booking->adults = $data['adults']; }
		if (isset($data['children'] )) { $booking->children = $data['children']; }
		$booking->fullname = $data['fullname'];
		$booking->phone = $data['phone'];
		$booking->email = $data['email'];
		if (isset($data['package']) && !empty($data['package'])) {
			$booking->package_id = $data['package'];
		}
		if (isset($data['status'])) {
			$booking->status = $data['status'];
		}
		$booking->save();
		if($booking->id) { 
			$enc_book_id = encrypt($booking->id);
			Cookie::queue(Cookie::make('booking', $enc_book_id, 10));
			return redirect ('/checkout');
		} else {
			return view('booking')->with('data', $data);
		}
		
	}

	public function availableDates () {
		$availableDates = array();
		for ($i=0; $i < 28; $i++) { 
			$y = $i+1;
			$availableDates[$i] = '2019-06-'.$y;
		}
		$arr = array('availableDates' => $availableDates);
 		return Response()->json($arr);
	}

	public function do_payment ($request) {
		// Common setup for API credentials
		        $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
		        $merchantAuthentication->setName(config('services.authorize.login'));
		        $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
		        $refId = 'ref'.time();
		// Create the payment data for a credit card
		          $creditCard = new AnetAPI\CreditCardType();
		          $creditCard->setCardNumber($request->credit_card_number);
		          $expiry = $request->card_expiry_year . '-' . $request->card_expiry_month;
		          // dd($expiry);
		          // $creditCard->setExpirationDate( "2038-12");
		          $creditCard->setExpirationDate($expiry);
		          $paymentOne = new AnetAPI\PaymentType();
		          $paymentOne->setCreditCard($creditCard);
		// Create a transaction
		          $transactionRequestType = new AnetAPI\TransactionRequestType();
		          $transactionRequestType->setTransactionType("authCaptureTransaction");
		          $transactionRequestType->setAmount($request->transaction_total_cost);
		          $transactionRequestType->setPayment($paymentOne);
		          $request = new AnetAPI\CreateTransactionRequest();
		          $request->setMerchantAuthentication($merchantAuthentication);
		          $request->setRefId( $refId);
		          $request->setTransactionRequest($transactionRequestType);
		          $controller = new AnetController\CreateTransactionController($request);
		          $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
		/*if ($response != null){
			$tresponse = $response->getTransactionResponse();
			if (($tresponse != null) && ($tresponse->getResponseCode()=="1")){
				echo "Charge Credit Card AUTH CODE : " . $tresponse->getAuthCode() . "\n";
				echo "Charge Credit Card TRANS ID  : " . $tresponse->getTransId() . "\n";
			} else {
				echo "Charge Credit Card ERROR :  Invalid response\n";
			}
		} else {
			echo  "Charge Credit Card Null response returned";
		}*/
		return $response;
	}
}
