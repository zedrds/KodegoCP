@extends('client.master_client')
@section('client')
<section class="unit-title">
      <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
        <h2>Unwind and Embrace</h2>
        <h1>Our {{$unit_type}} Units</h1>
      </div>
     </section>

     
    <section class="unit-rooms-section mb-5">
      <div class="container">
        @forelse($units as $unit)
        <div class="unit-rooms p-3">
          <div class="d-flex flex-wrap">
            <div class="unit-rooms-picture col-12 col-lg-4 p-3" style="background-image: url({{asset($unit->room_image)}}); background-size: cover;">
              <div class="border-button-view border p-5 w-100 h-100 d-flex flex-column align-item-center justify-content-center">
                <div class="button-view d-flex justify-content-center">
                  <a href="{{ route('view.unit', [$unit->unit_type, $unit->id]) }}" class="px-4 btn btn-secondary text-center">VIEW</a>
                </div>
              </div>
            </div>
            <div class="unit-room-details col-12 col-lg-5 p-4 p-lg-5">
              <h4>{{$unit->room_title}}</h4>
              <p>{{Str::limit($unit->room_description,100)}}</p>
            </div>
            <div class="unit-room-pricing col-12 col-lg-3 p-4 p-lg-5 d-flex flex-column align-items-center justify-content-center">
              <h4>₱{{number_format($unit->room_price,2,'.',',')}}</h4>
              <h6>per night</h6>
              <a href="{{ route('view.unit', [$unit->unit_type, $unit->id]) }}" class="btn btn-outline-secondary">MORE DETAILS</a>
            </div>
          </div>
        </div>
        @empty 
        @endforelse
        
      </div>

    </section>
@endsection