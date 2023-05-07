@extends('client.master_client')
@section('client')
<!--hero-->


<section class="hero-section" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset($homepage->homepage_picture)}});">      
      <div class="hero">
        <div class="container h-100 d-flex align-items-center justify-content-center">
          <div class="hero-details border border-3 p-5 text-center text-uppercase">
            <h5>{{$homepage->homepage_title}}</h5>
            <h1 class="display-1 m-0">UNWIND</h1>
          </div>
        </div>
        <div class="calendar-section">
          <div class="container p-5">
            <form class="d-flex justify-content-center flex-wrap">
              <!-- <div class="d-flex flex-column col-6 col-lg-3 px-3">
                <label for="" class="mb-2">CHECK-IN</label>
                <input type="date" class="py-2 px-4" id="check_in"/>
              </div>
              <div class="d-flex flex-column col-6 col-lg-3 px-3">
                <label for="" class="mb-2">CHECK-OUT</label>
                <input type="date" class="py-2 px-4" id="check_out"/>
              </div>
              <div class="d-flex flex-column col-6 col-lg-3 px-3 mt-2 mt-lg-0">
                <label for="" class="mb-2">GUESTS</label>
                <input type="number" min="1" class="py-2 px-4"/>
                
              </div> -->
              <div class="d-flex flex-column col-6 col-lg-3 px-3 mt-2 mt-lg-0">
                <!-- <label for="" class="mb-2">&nbsp;</label> -->
                <a href="{{route('search')}}" class="btn btn-secondary py-4 text-uppercase"> Book now</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section class="my-5 container d-flex flex-wrap reveal fade-left">
      <div class="pe-5 container-amenities-details-left col-12 col-lg-6">
        <div class="amenities-details">
            <h2>{{$homepage->about_title}}</h2>
            <h1>{{$homepage->about_title_2}}</h1><br>
            <p class="mb-3">{{$homepage->about_description}}</p>
            <a href="{{route('about.us')}}" class="btn btn-primary btn-sm justify-content-center btn-dark fs-6">MORE DETAILS</a>
        </div>
      </div>
      <div class="frame mt-5 mt-lg-0 col-12 col-lg-6 d-flex align-items-center">
        <img class="" src="{{asset($homepage->about_picture)}}">
      </div>
    </section>
    <section class="my-5 container d-flex flex-wrap reveal fade-left">
      <div class="frame-2 col-12 col-lg-6 d-flex align-items-center">
        <img class="" src="{{asset($homepage->amenities_picture)}}">
      </div>

      <div class="ps-lg-5 container-amenities-details col-12 col-lg-6">
        <div class="mt-4 mt-lg-0 amenities-details">
            <h2>{{$homepage->amenities_title}}</h2>
            <h1>{{$homepage->amenities_title_2}}</h1><br>
            <p class="mb-3">{{$homepage->amenities_description}}</p>
        </div>
      </div>
    </section>

    <section class="features-section" style="background-image: url({{asset($homepage->featured_picture)}});">
      <div class="container py-3 py-lg-0 d-flex flex-wrap align-items-center h-100">
        <div class="col-12 col-lg-4 px-3">
          <div class="card-features p-4">
            <div class="text-center">
              <div class="mb-4">{!!$homepage->featured_icon_1!!}</div>
              <h3 class="text-uppercase mb-3">{{$homepage->featured_title_1}}</h3>
            </div>
            <p>{{$homepage->featured_description_1}}</p> 
          </div>
          
        </div>
        <div class="col-12 col-lg-4 px-3 py-3 py-lg-0">
          <div class="card-features p-4">
            <div class="text-center">
              <div class="mb-4">{!!$homepage->featured_icon_2!!}</div>
              <h3 class="text-uppercase">{{$homepage->featured_title_2}}</h3>
            </div>
            <p>{{$homepage->featured_description_2}}</p> 
          </div>
          
        </div>
        <div class="col-12 col-lg-4 px-3">
          <div class="card-features p-4">
            <div class="text-center">
              <div class="mb-4"> {!!$homepage->featured_icon_3!!}</div>
             
              <h3 class="text-uppercase">{{$homepage->featured_title_3}}</h3>
            </div>
            <p>{{$homepage->featured_description_3}}</p> 
          </div>
          
        </div>
      </div>

    </section>
    <section class="container my-5 d-flex flex-wrap">
      <div class="col-12 col-lg-8">
        <img class="pic2 " src="{{asset($homepage->unit_picture)}}">
      </div>
      <div class="col-12 units-container arrow col-lg-4 px-lg-3  py-lg-5">
        <div class="p-5 units-details">
            <div class="col-6 col-lg-12">
              <h2>{{$homepage->unit_title}}</h2>
              <h1>{{$homepage->unit_title_2}}</h1><br>
            </div>
            
             
                <p class="m-0">For as low as</p>
                <h3 class="mb-2">{{'₱'.number_format($homepage->unit_price,2,'.',',')}}</h3>
           
          
              
                {!!$homepage->unit_list!!}
              
          <div class="mt-3">
            <a href="{{route('unit.types')}}" class="btn btn-primary px-5 justify-content-center btn-dark btn-sm text-uppercase">SEE UNITS</a>
          </div>
        </div>
      </div>
    </section>
    
<section class="map mb-5 d-flex flex-wrap">
  <div class="map-details col-12 col-lg-4">
    <div class="p-5">
      <h2>{{$homepage->location_title}}</h2>
      <h1>{{$homepage->location_title_2}}</h1><br>
      <p>{{$homepage->location_description}}</p>
    </div>

  </div>
  <div class="col-12 col-lg-8">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3860.6206625468535!2d121.0508218753734!3d14.620672476584373!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397b7c08193169d%3A0x568d048aa761dea3!2sSmart%20Araneta%20Coliseum!5e0!3m2!1sen!2sph!4v1681654689012!5m2!1sen!2sph"   style="border:0; width:100%; height: 100%" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
</section>

<!-- <section class="testimonial-section">
  <div class="container">
    <div class="row d-flex justify-content-center py-5">
        <div class="col-md-8">
            <div id="testimonial-slider" class="owl-carousel">
                <div class="testimonial">
                    <p class="description">
                        " Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium ad asperiores at atque culpa dolores eaque fugiat hic illo ipsam ipsum minima modi necessitatibus nemo officia, omnis perferendis placeat sit vitae, consectetur adipisicing elit ipsam. "
                    </p>
                    <h3 class="title">roleen</h3>
                    <div class="pic">
                      <img class="" src="{{asset('frontend/assets/img/profile/roleen.jpg')}}"/>
                    </div>
                </div>
                <div class="testimonial">
                    <p class="description">
                        " Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium ad asperiores at atque culpa dolores eaque fugiat hic illo ipsam ipsum minima modi necessitatibus nemo officia, omnis perferendis placeat sit vitae, consectetur adipisicing elit ipsam. "
                    </p>
                    <h3 class="title">zed</h3>
                    <div class="pic">
                      <img class="" src="{{asset('frontend/assets/img/profile/me.jpg')}}"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section> -->
@endsection