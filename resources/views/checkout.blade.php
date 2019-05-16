@extends('front-master')

@section('content')
<section class="booking-sec checkout-sec">
	<div class="container">
		@if($errors->any())
			<div class="alert alert-danger" role="alert">
		        {{$errors->first()}}! Please call us at <a href="tel:+11-855-370-3898">1-855-370-3898</a>
		    </div>
		@endif
		<div class="checkout-description col-md-10 offset-md-1">
			<div class="row checkout-desc-row">
				<div class="col-md-8 description-side">
					
					<div class="description-side-inner">
						<h4>Vacation Description</h4>
						<p class="listing-title">{{$booking->package->title}}</p>
						<p class="duration">{{$booking->package->sub_title}}</p>
						<p class="dates-status"><span class="date-selected">Date Selected</span><span class="status">to be confirmed</span></p>
						<div class="col-md-6 stars-section"></div>
						<div class="col-md-6 review-section"></div>	
					</div>
				</div>
				<div class="col-md-4 price-side">
					<div class="price-side-inner">
						<h4>Price</h4>
						<p class="retail-price">${{$booking->package->price + 0}}<span class="original-price">(${{$booking->package->orignal_price + 0}})</span></p>
						<p class="discount">{{$booking->package->percent_off}}%</p>
					</div>
				</div>
			</div>
		</div>

		<form class="col-md-10 offset-md-1 checkout-form" method="post" action="{{url('/complete-reservation')}}">
			
			<input type="hidden" name="booking" value="{{$booking->id}}">
			<input type="hidden" name="transaction_total_cost" value="{{$booking->package->price}}">
			<input type="hidden" name="fullname" value="{{$booking->fullname}}">
			@csrf
			<div class="row">
				<h3 class="main-title">Billing information</h3>
				<h4 class="resort warning"> This resort is in high demand. No worries, we have reserved your vacation request for 10 minutes.</h4>
				<!-- <p class="checkout-timer"></p> -->
				<span class="today-sale-timer">
                        	<div class="text-center align-self-end">
                            	<p class="ltxt min"></p>
                            	<p class="smtxt">MINUTES</p>
                        	</div>
                        	<div class="text-center align-self-end">
                            	<p class="ltxt sec"></p>
                            	<p class="smtxt">SECONDS</p>
                        	</div>
						</span></div>
				

				<div class="container">

					<div class="form-group col-md-12">
						<label for="Billing-Address">Billing Address</label>
						<input type="text" class="form-control" id="address" name="address" placeholder="Address">
					</div>
					<div class="form-group col-md-12">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="City">
					</div>
					<div class="col-md-12 country-select">
						<div class="form-group">
							<label for="country">Country</label>
							<select class="form-control" id="country" name="country">
								<option value="USA">USA</option>
								<option value="CANADA">CANADA</option>
							</select>
						</div>
					</div>
					<div class="col-md-12 state-select">
						<div class="form-group">
							<label for="state">State</label>
							<select class="form-control" id="state" name="state">
								<option value="">Choose your state</option>
								<option value="Alberta">Alberta</option>
								<option value="British Columbia">British Columbia</option>
								<option value="Manitoba">Manitoba</option>
								<option value="New Brunswick">New Brunswick</option>
								<option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
								<option value="Nova Scotia">Nova Scotia</option>
								<option value="Ontario">Ontario</option>
								<option value="Prince Edward Island">Prince Edward Island</option>
								<option value="Quebec">Quebec</option>
								<option value="Saskatchewan">Saskatchewan</option>
								<option value="Northwest Territories">Northwest Territories</option>
								<option value="Nunavut">Nunavut</option>
								<option value="Yukon">Yukon</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="zip-code">Zip Code</label>
						<input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">
					</div>
					<div class="form-group col-md-12">
						<label for="Credit-Number">Credit Number</label>
						<input type="text" class="form-control" id="credit_card_number" name="credit_card_number" placeholder="---- --- -----">
					</div>
					<div class="form-group col-md-12">
						<label for="credit_card_cvv">CVV</label>
						<input type="text" class="form-control" id="credit_card_cvv" name="credit_card_cvv" placeholder="----">
					</div>
				</div>
				
				<div class="container">
					<div class="row">
					<div class="col-md-6 Expiration-month">
						<div class="form-group">
							<label for="Expiration-month">Expiration Month</label>
							<select class="form-control" id="credit_card_month" name="credit_card_month">
								<option>Chooose...</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 country-select">
						<div class="form-group">
							<label for="Expiration-year">Expiration-Year</label>
							<select class="form-control" id="credit_card_year" name="credit_card_year">
								<option value="" selected="">Choose...</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022">2022</option>
                                <option value="2023">2023</option>
                                <option value="2024">2024</option>
                                <option value="2025">2025</option>
                                <option value="2026">2026</option>
                                <option value="2027">2027</option>
                                <option value="2028">2028</option>
                                <option value="2029">2029</option>
                                <option value="2030">2030</option>
                                <option value="2031">2031</option>
                                <option value="2032">2032</option>
                                <option value="2033">2033</option>
                                <option value="2034">2034</option>
                                <option value="2035">2035</option>
                                <option value="2036">2036</option>
                                <option value="2037">2037</option>
                                <option value="2038">2038</option>
                                <option value="2039">2039</option>
                                <option value="2040">2040</option>
							</select>
						</div>
					</div>
					</div>
				</div>
					<!-- 
					<div class="form-check">
						<input type="checkbox" class="form-check-input" id="exampleCheck1">
						<label class="form-check-label" for="exampleCheck1"> I have read and agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
					</div> -->
				
				<div class="col-md-12">
					<button type="submit" class="button-primary button button-booking">Complete Reservation</button>
				</div>



			</form>
		</div>
	</section>
	@endsection

@section('scripts')
@php
$time = $booking->created_at;
/*$newtimestamp = strtotime($time .'+ 5 hours');
echo $time =  date('Y-m-d H:i:s', $newtimestamp);*/
$newtimestamp = strtotime($time .'+ 10 minutes');
$plus_time =  date('Y-m-d H:i:s', $newtimestamp);
if (strtotime($plus_time) > strtotime($time)) { 
@endphp
<script>
    jQuery(document).ready(function ($) {
        var countdown = moment.tz('{{$plus_time}}', "America/New_York")
        jQuery('.hr').countdown(countdown.toDate(), function(event) {
          jQuery(this).html(event.strftime('%H'));
        });
        jQuery('.min').countdown(countdown.toDate(), function(event) {
          jQuery(this).html(event.strftime('%M'));
        });
        jQuery('.sec').countdown(countdown.toDate(), function(event) {
          jQuery(this).html(event.strftime('%S'));
        });
    });
</script>
@php
}
@endphp

<script>
@endsection




