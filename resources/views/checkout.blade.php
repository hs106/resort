@include('header')


<section class="booking-sec">
	<div class="container">
		<div class="checkout-description col-md-10 offset-md-1">
			<div class="row checkout-desc-row">
				<div class="col-md-8 description-side">
					
					<div class="description-side-inner">
						<h4>Vacation Description</h4>
						<p class="listing-title">The Cancun Luxury Resort Family Package</p>
						<p class="duration">5-days 4-nights</p>
						<p class="dates-status"><span class="date-selected">Date Selected</span><span class="status">to be confirmed</span></p>
						<div class="col-md-6 stars-section"></div>
						<div class="col-md-6 review-section"></div>	
					</div>
				</div>
				<div class="col-md-4 price-side">
					<div class="price-side-inner">
						<h4>Price</h4>
						<p class="retail-price">$499<span class="original-price">$988</span></p>
						<p class="discount">50%</p>
					</div>
				</div>
			</div>
		</div>

		<form class="col-md-10 offset-md-1 checkout-form">
			

			<div class="row">
				<h3 class="main-title">Billing information</h3>
				<h4 class="resort warning"> This resort is in high demand. No worries, we have reserved your vacation request for 10 minutes.</h4>
				<p class="checkout-timer">12:12:12:00</p>
				

				<div class="container">

					<div class="form-group col-md-12">
						<label for="Billing-Address">Billing Address</label>
						<input type="text" class="form-control" id="Billing-Address" placeholder="Address">
					</div>
					<div class="form-group col-md-12">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" placeholder="City">
					</div>
					<div class="col-md-12 country-select">
						<div class="form-group">
							<label for="exampleFormControlSelect1">Country</label>
							<select class="form-control" id="exampleFormControlSelect2">
								<option>Country1</option>
								<option>Country2</option>
								<option>Country3</option>
								<option>Country4</option>
								<option>Country5</option>
							</select>
						</div>
					</div>
					<div class="form-group col-md-12">
						<label for="zip-code">Zip Code</label>
						<input type="text" class="form-control" id="zip-code" placeholder="Zip Code">
					</div>
					<div class="form-group col-md-12">
						<label for="Credit-Number">Credit Number</label>
						<input type="text" class="form-control" id="Credit-Number" placeholder="---- --- -----">
					</div>
					<div class="form-group col-md-12">
						<label for="Credit-Number">CVV</label>
						<input type="text" class="form-control" id="Cvv" placeholder="----">
					</div>
				</div>
				
				<div class="container">
					<div class="row">
					<div class="col-md-6 Expiration-month">
						<div class="form-group">
							<label for="Expiration-month">Expiration Month</label>
							<select class="form-control" id="Expiration-Month">
								<option>Country1</option>
								<option>Country2</option>
								<option>Country3</option>
								<option>Country4</option>
								<option>Country5</option>
							</select>
						</div>
					</div>
					<div class="col-md-6 country-select">
						<div class="form-group">
							<label for="Expiration-year">Expiration-Year</label>
							<select class="form-control" id="Expiration-Year">
								<option>Country1</option>
								<option>Country2</option>
								<option>Country3</option>
								<option>Country4</option>
								<option>Country5</option>
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


	@include('footer')

	<section class="section-holiday">
		<div class="holiday-box">
			<div class="holiday-box-overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<h2>Enjoy Holiday Packages At Incredibly Low Rates</h2>
						<div class="s-head">Search ResortDaddy.Com’s Incredible Packages BelowHi there</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	@include('footer')

