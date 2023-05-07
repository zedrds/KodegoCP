@extends('client.master_client')
@section('client')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <div>
        <img
          class="unitInfoImg"
          src="{{asset($unit->room_image)}}"
          alt="Snow"
          style="width: 100%"
        />
      </div>

      <!--Unit info-->
      <section
        class="container d-block d-lg-flex my-3 flex-wrap"
      >
        <div class="p-lg-4 container col-12 col-lg-9 d-flex flex-column">
          <div class="unitName reveal active fade-left mb-4">
            <div class="d-flex justify-content-between">
              <div>
                <h1 class="text-uppercase">{{$unit->room_title}}</h1>
                <p class="text-uppercase">Starts From <strong>₱{{number_format($unit->room_price,2,'.',',')}} / Guest</strong></p>
              </div>
            </div>
            <hr class="mt-0">
            <p>
             {{$unit->room_description}}
            </p>
            <div>
              <a href="{{route('book',$unit->id)}}" class="btn btn-secondary  text-uppercase">book now</a>
            </div>
            
          </div>

            <div id="carouselExampleControls" class="carousel carousel-dark slide cslide" data-bs-ride="carousel">
              <div class="carousel-inner">
              @foreach($thumbnails as $key => $thumbnail)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                  <img src="{{ asset($thumbnail->thumbnail_name) }}" class="d-block cslideimg" alt="...">
                </div>
              @endforeach
              </div>
              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
            </div>
            
             

          <div class="mt-4 room-features">
            <h1 class="text-uppercase">ROOM FEATURES</h1>
            <hr class="mt-0">
            <ul class="d-flex flex-wrap">
            @foreach($room_features as $room_feature)
              <li class="col-12 col-sm-6"><span>{{$features->where('id',$room_feature->feature_id)->first()->feature_name}}</span></li>
            @endforeach
            </ul>
          </div>

          

          
        </div>

        <div class="pt-4 col-12 col-lg-3 col-6  reveal active fade-right">
          <div class="mb-4">
            <h4 class="text-uppercase">Additional Information</h4>
            <div class="d-flex flex-wrap">
              <div class="mb-2 d-flex col-6 col-lg-12">
                <div class="bg p-1 me-2 rounded-1 d-flex align-items-center">
                  <i class="fs-5 ri-wheelchair-fill"></i>
                </div>
                <div>
                  <h6 class="m-0">Max Guests</h6>
                  <small class="">{{$unit->max_guests}} pax</small>
                </div>
              </div>
              <div class="mb-2 d-flex col-6 col-lg-12">
                <div class="bg p-1 me-2 rounded-1 d-flex align-items-center">
                  <i class="fs-5 ri-hotel-bed-fill"></i>
                </div>
                <div>
                  <h6 class="m-0">Bedrooms</h6>
                  <small class="">{{$unit->bedrooms}}</small>
                </div>
              </div>
              <div class="mb-2 d-flex col-6 col-lg-12">
                <div class="bg p-1 me-2 rounded-1 d-flex align-items-center">
                  @if($unit->pet_friendly == 1)
                  <i class="mdi mdi-paw"></i> 
                  @else 
                  <i class="mdi mdi-paw-off"></i> 
                  @endif
                </div>
                <div>
                  <h6 class="m-0">Pet Friendly</h6>
                  <small class="">@if($unit->pet_friendly == 1) Yes @else  No @endif </small>
                  
                </div>
              </div>
              <div class="mb-2 d-flex col-6 col-lg-12">
                <div class="bg p-1 me-2 rounded-1 d-flex align-items-center">
                @if($unit->smoking_allowed == 1)
                  <i class="mdi mdi-smoking"></i>
                  @else 
                  <i class="mdi mdi-smoking-off"></i> 
                  @endif
                </div>
                <div>
                  <h6 class="m-0">Smoke-free</h6>
                  <small class="">@if($unit->smoking_allowed == 1) Yes @else  No @endif </small>
                </div>
              </div>
              <div class="mb-2 d-flex col-6 col-lg-12">
                <div class="bg p-1 me-2 rounded-1 d-flex align-items-center">
                @if($unit->parking == 0)
                  <i class="mdi mdi-baby-carriage-off"></i>
                  @else
                  <i class="mdi mdi-baby-carriage"></i> 
                  @endif
                </div>
                <div>
                  <h6 class="m-0">Parking</h6>
                  <small class="">@if($unit->parking == 0) No @elseif($unit->parking == 1) Yes, free @elseif($unit->parking == 2) Yes, paid  @endif </small>
                </div>
              </div>
            </div>
          </div>


          
          
          <div class="d-flex flex-column mb-4">
          <h4 class="text-uppercase">Ameneties</h4>
          @foreach($room_amenities as $room_amenity)
            <div class="amenetiesImgTextcontainer mb-2" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset($amenities->where('id',$room_amenity->amenity_id)->first()->amenity_image)}});">
              <div class="d-flex h-100 p-3 flex-column justify-content-end">{{$amenities->where('id',$room_amenity->amenity_id)->first()->amenity_name}}</div>
            </div>
            @endforeach
            
          </div>
        </div>
      </section>

      <section class="container mb-4 p-lg-4">
        <h1 class="text-uppercase">Discover more Units</h1>
        <hr class="mt-0">
        <div class="d-flex flex-wrap">
        @foreach($units as $unit)
        <div class="more-units-card col-lg-3 col-6 px-3">
            <div class="more-units-img">
              <a href="#">
                <img
                  src="{{asset($unit->room_image)}}"
                  class="w-100"
                  alt="..."
                  style="height: 200px; object-fit:cover; ">
              </a>
            </div>
            <div class="p-4 text-center">
              <h4 class="" style="font-weight: 700;">{{$unit->room_title}}</h4>
              <h6>₱{{number_format($unit->room_price,2,'.',',')}} / GUEST</h6>
              <div class="mt-3">
                <a href="{{ route('view.unit', [$unit->unit_type, $unit->id]) }}" class="btn btn-dark btn-sm text-uppercase">go here</a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
    </section>
  
@endsection