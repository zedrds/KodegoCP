@extends('client.master_client')
@section('client')
<section class="unit-title">
    <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
      <h2>Unwind and Embrace</h2>
      <h1>Our Condotel's Units</h1>
    </div>
   </section>

    <!--Cards-->
    <section class="units d-flex flex-wrap">

    @foreach($unit_types as $unit_type)
    @php 
      if($unit_type->unit_slug == 'studio'){
        $unit_slug = $unit_type->unit_slug;
      }elseif($unit_type->unit_slug == 'cozy'){
        $unit_slug = $unit_type->unit_slug;
      }elseif($unit_type->unit_slug == 'luxury'){
        $unit_slug = $unit_type->unit_slug;
      }elseif($unit_type->unit_slug == 'vip'){
        $unit_slug = $unit_type->unit_slug;
      }
    @endphp
    <div class="col-12 col-lg-6 studio p-5" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset($unit_type->where('unit_slug',$unit_slug)->first()->unit_image)}});">
        <div class="card-animation p-5">
          <h2 class="card-animation-title mb-3">{{$unit_types->where('unit_slug',$unit_slug)->first()->unit_name.' units'}}</h2>
          <p class="card-text mb-4">
          {{$unit_types->where('unit_slug',$unit_slug)->first()->unit_description}}
          </p>
          <a href="{{route('view.unit.type',$unit_slug)}}" class="btn btn-secondary">More Info</a>
        </div>
      </div>
    @endforeach
    </section>
@endsection