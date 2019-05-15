@extends('front-master')

@section('content')
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
<section class="section-package">
    <div class="package-box">
        <div class="container">
            <div class="row">
                @foreach ($packages as $row)
                        <div class="col-md-4">
                            <div class="single-package">
                                <figure>
                                    <img width="656" height="437" src="{{asset('upload/'.$row->featured_image)}}" class="img-responsive" alt="">
                                </figure>
                                <h3>{{$row->location}}</h3>
                                <div class="pack_desc">
                                    <p>{{$row->sub_title}}</p>
                                </div>
                                <div class="pack_price">
                                    <p>Original Price <strike>${{$row->orignal_price}}</strike></p>
                                    <h2>Today’s Price ${{$row->price}}*</h2>
                                </div>
                                <div class="pack_btn">
                                    <a href="{{url('resort/'.$row->slug)}}">VIEW THIS OFFER NOW!</a>
                                </div>
                                <div class="pack_terms">
                                    <p>*Resort Preview Rate</p>
                                    <p>*Taxes & Resort Fees Not Included</p>
                                </div>
                            </div>
                        </div>
                @endforeach     
            </div>
        </div>
    </div>
</section>
<section class="section-gateway">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="gateway-image-box">
                    <img src="https://www.resortdaddy.com/wp-content/uploads/2019/01/nikola-johnny-mirkovic-587056-unsplash-copy.jpg" class="img-responsive" alt="image">
                </div>
            </div>     
            <div class="col-md-7 center-sec">
                <div class="gateway-detail-box detail-box">
                    <h2>Luxurious Getaways In Just 4 Simple Steps</h2>
                    <p><i class="fa_prepended fa fa-binoculars"></i><b>Step #1: </b>Find Your Perfect Destination Package</p>
                    <p><i class="fa_prepended fa fa-ticket"></i><b>Step #2: </b>Reserve Your Amazing Price</p>
                    <p><i class="fa_prepended fa fa-calendar"></i><b>Step #3: </b>Book Your Travel Dates</p>
                    <p><i class="fa_prepended fa fa-child"></i><b>Step #4: </b>Sit Back &amp; Relax!</p>
                    <p><a href="#scroll-1%20column%20row" class="gateway-detail-link button-primary">YES! Show Me The Deals Now
                        <span class="link-sub">Reserve Your Deal Today &amp; Book Anytime In The Next 18 Months!</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="sell-packages">
        <div class="container">
            <div class="row">
                <div class="col-md-7 center-sec center-sec-inverse">
                    <div class="gateway-detail-box detail-box">
                        <h2>So How Can We Sell Our Packages So Low?</h2>
                        <p>Simple! Our travellers agree to participate in a breakfast or lunch Resort Preview showcasing all of the Amenities & Benefits of the resort they visit.</p>
                        <p>It’s fun, informative and something the entire family can enjoy. In return, they never pay more then $499 for any of our featured Resort Getaways. It’s that simple and the savings are worth it!</p>
                        <a href="#scroll-1%20column%20row" class="gateway-detail-link button-primary">YES! Show Me The Deals Now
                            <span class="link-sub">Reserve Your Deal Today &amp; Book Anytime In The Next 18 Months!</span></a>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="gateway-image-box">
                            <img src="https://www.resortdaddy.com/wp-content/uploads/2019/01/rawpixel-423646-unsplash-copy.jpg" class="img-responsive" alt="image">
                        </div>
                    </div>     
                </div>
            </div>
        </section>
        <section class="faqs">
            <div class="container">
                <div class="row">
                   <center>
                    <h2><i class="fa_prepended fa fa-question-circle" contenteditable="false"></i>&nbsp;&nbsp;Frequently Asked Questions
                    </h2>   
                </center>
            </div>


            <div class="row sect-accord ">




    

                <div class="col-md-6">
                    <div class="accordion" id="accordionExample">
                      <div class="card">
                        <div class="card-header" id="headingOne">
                          <h5 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              Collapsible Group Item #1
                          </button>
                      </h5>
                  </div>

                  <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                      <div class="card-body">
                        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                      Collapsible Group Item #2
                  </button>
              </h5>
          </div>
          <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
          <h5 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              Collapsible Group Item #3
          </button>
      </h5>
  </div>
  <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
    </div>
</div>
</div>
</div>
</div>





<div class="col-md-6">
 <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
          Collapsible Group Item #1
      </button>
  </h5>
</div>

<div id="collapseFour" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
  <div class="card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div>
<div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Collapsible Group Item #2
      </button>
  </h5>
</div>
<div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
  <div class="card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div>
<div class="card">
    <div class="card-header" id="headingSix">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
          Collapsible Group Item #3
      </button>
  </h5>
</div>
<div id="collapseSix" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
  <div class="card-body">
    Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
</div>
</div>
</div>
</div> 


</div> 

<div class="col-md-12 button-div">
    <center>
        <a href="#scroll-1%20column%20row" class="gateway-detail-link button-primary">YES! Show Me The Deals Now
            <span class="link-sub">Reserve Your Deal Today &amp; Book Anytime In The Next 18 Months!</span></a>
        </center>
</div>


</div>
</div>
</section>
@endsection
