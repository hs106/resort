@extends('front-master')



@section('content')

<section class="booking-sec">
	<div class="container">
		<form class="col-md-6 offset-md-3" id="reserveForm" method="post" action="{{ url('/booking') }}">
		      <input type="hidden" name="package" value="{{$package_id}}">
                      @csrf
			<div class="row">
				<h3 class="main-title">Select Your Preferred Travel Dates</h3>
				<div class="dates-section col-md-12">
					<div class="form-group">
						<input type="hidden" class="form-control d-none" id="calendar1" name="reservation_date" placeholder="date">
					</div>
				</div>

				<div class="col-md-12 ">
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="have-dates" name="hide_dates" value="true">
						<label class="form-check-label" for="have-dates"><a href="#">Select dates later</a></label>
					</div>
				</div>
				<h3 class="main-title">Number Of Travelers</h3>
				
				<div class="col-md-6 traveler-select">
					<div class="form-group">
						<label for="adults">Adults</label>
						<select class="form-control" id="adults" name="adults">
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
                                                        <option>6</option>
						</select>
					</div>
				</div>

				<div class="col-md-6 traveler-select">
					<div class="form-group">
						<label for="children">Children</label>
						<select class="form-control" id="children" name="children">
                                                        <option>0</option>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
                                                        <option>6</option>
						</select>
					</div>
				</div>
				<h3 class="main-title">Primary Travelers</h3>
				<div class="col-md-12">

					<div class="form-group">
						<label for="fullname">Full Name</label>
						<input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name">
					</div>

					<div class="form-group">
						<label for="phone">Phone</label>
						<input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone">
					</div>
					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
						<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
					</div>
					<div class="form-group form-check">
						<input type="checkbox" class="form-check-input" id="terms" name="terms">
						<label class="form-check-label" for="terms"> I have read and agree to the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a></label>
					</div>
				</div>
				<div class="col-md-12">
					<button type="submit" class="button-primary button button-booking">Reserve It Now</button>
				</div>



			</form>
		</div>
	</section>
@endsection

@section('scripts')
<script>
        $(document).ready(function () {
                hideCalendar();
                $('#have-dates').change(function () {
                        if( $('#have-dates').prop('checked') ) {
                            $('.caleran-inline').hide();
                        }else{
                            $('.caleran-inline').show();
                        }
                });

                /*$('reserveForm').submit(function (e) {
                        e.preventDefault();
                         $.ajaxSetup({
                        headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                        });
                        $('.publish-btn').text('Sending..');
                        $('.publish-btn').addClass('btn-progress');
                        $('.publish-btn').addClass('disabled');
                        var formData = new FormData($("#reserveForm")[0]);
                        $.ajax({
                        url: '{{ route("admin.save-booking") }}' ,
                        type: "POST",
                        contentType: false,
                        processData: false,
                        dataType: "json",
                        data: formData,
                        async: false,
          
                        success: function( response ) {
                                if (response.status == true) {
                                        window.location.href = '{{url('/checkout')}}';
                                } else {
                                        alert('Booking is not possibel at moment. Please againg later!');
                                }
                        }
                        });

                });*/
        });
                function hideCalendar(){
                     if( $('#have-dates').prop('checked') ) {
                         $('.caleran-inline').hide();
                     }else{
                         $('.caleran-inline').show();
                     }
                 }
                 // At this moment we only want the start days, we do some trick to make
                 // the other days green even if they are disabled
                 var next_available_date = moment();
                 var caleranConfig = {
                     inline: true,
                     showHeader: false,
                     showFooter: false,
                     disabledRanges: [{
                         start: next_available_date.clone().subtract(365, 'days'),
                         end:   next_available_date.clone().subtract(1, 'day')
                     }
                     ],
                     disableDays: function(day) {
                         if( document.availableDates.find(  function (date) { return day.format("YYYY-MM-DD") === date; } )) {
                             return false;
                         }

                         return true;
                     },

                     onfirstselect: function(caleran, startDate) {
                         var minAndMaxDate = startDate.clone(); // .add(4-1, 'days');
                         caleran.setEnd(minAndMaxDate);
                         caleran.globals.endSelected = true;
                         caleran.globals.startSelected = false;
                         caleran.updateInput();

                     },
                     onafterselect: function(caleran, startDate, endDate){
                         caleran.config.maxDate = null;
                         caleran.updateInput();
                         isFirstSelect = false;
                     },

                     ondraw: function(caleran) {
                         if(caleran.config.startDate){
                             var start = caleran.config.startDate.clone();
                             for(i=0; i<4; i++){
                                 var time = start.clone().add(i, 'days').middleOfDay().unix();
                                 el = $('.caleran-days-container').find("[data-value='" + time + "']");
                                 el.addClass('caleran2-trick-selected');
                             }
                         }
                     },

                     onaftermonthchange: function(caleran, month) {
                         $.get('/available_dates', {sku: "RD3NORCC", months: month.month()+1, year: month.year() } )
                          .then(function (data) {  document.availableDates = data.availableDates; return caleran;} )
                          .then(function(c) { c.reDrawCalendars(); });
                     }
                 };

                 caleranConfig.startDate =  next_available_date.clone();
                 caleranConfig.endDate = next_available_date.clone().add(4-1, 'days');
                 caleranConfig.minDate = next_available_date.clone();
                 var _calendar;
                 $.get('/available_dates', {sku: "RD3NORCC", months: (new Date().getMonth()+1), year: moment().year() } )
                  .then(function (data) {
                      document.availableDates = data.availableDates;
                      _calendar = $("#calendar1").caleran(caleranConfig);

                      $('#booking').fadeIn("slow");
                      $('#booking').removeClass('d-none');
                      $('#checking-availability').fadeOut();
                  });


                 var inputPhone = document.querySelector("#phone");
                 document.iti = window.intlTelInput(inputPhone, {
                     utilsScript: "/shared/js/utils.js",
                     initialCountry: "auto",
                     preferredCountries: ['US', 'CA'],
                     geoIpLookup: function(callback) {
                         $.get('https://ipinfo.io', function() {}, "jsonp").always(function(resp) {
                             var countryCode = (resp && resp.country) ? resp.country : "US";
                             callback(countryCode);
                         });
                     }
                 });

                 document.addEventListener('DOMContentLoaded', function () {
                     _form = FormValidation.formValidation(
                         document.getElementById('reserveForm'),
                         {
                             fields: {
                                 fullname: {
                                     validators: {
                                         notEmpty: {
                                             message: 'Full name can\'t be blank'
                                         },
                                         callback: {
                                             callback: function(input){
                                                 if(!input.value.trim()){ return false; }
                                                 return input.value.trim().split(' ').length > 1;
                                             },
                                             message: 'Full name is required'
                                         }
                                     }
                                 },
                                 phone: {
                                     validators: {
                                         notEmpty: {
                                         },
                                         callback: {
                                             message: 'Valid phone number is required',
                                             callback: function(input){
                                                 return document.iti.isValidNumber();
                                             }
                                         }
                                     },
                                 },

                                 email: {
                                     validators: {
                                         notEmpty: {
                                         },

                                         emailAddress: { }
                                     }
                                 },
                                 terms: {
                                     validators: { notEmpty: { message: 'You must read and agree to Terms and Conditions and Privacy Policy'  } }
                                 }
                             },
                             plugins: {
                                 bootstrap: new FormValidation.plugins.Bootstrap(),
                                 trigger: new FormValidation.plugins.Trigger({event: 'blur'}),
                                 submitButton: new FormValidation.plugins.SubmitButton(),
                                 defaultSubmit: new FormValidation.plugins.DefaultSubmit(),
                                 icon: new FormValidation.plugins.Icon({
                                     valid: 'fa fa-check',
                                     invalid: 'fa fa-times',
                                     validating: 'fa fa-refresh'
                                 }),
                             },
                         });
                 });

</script>
@endsection