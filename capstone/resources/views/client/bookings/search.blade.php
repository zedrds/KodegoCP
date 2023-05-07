@extends('client.master_client')
@section('client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<!--hero-->
   <div class="book-cover d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset('frontend/assets/img/hero.jpg')}});">
      <h1 class="text-white text-uppercase">search</h1>
    </div>
   

    <section class="search-content container d-flex flex-wrap my-5">
      <div class="for-form col-12 col-lg-4 text-white mb-4">
        <form action="#" class="bg-secondary p-4 ">
          <div class="mb-3">
            <label for="" class="text-uppercase">unit type</label>
            <select id="unit-type-select" class="form-select rounded-0" aria-label="Default select example">
  <option selected disabled>Select Unit</option>
  @foreach($unit_types as $unit_type)
    <option value="{{ $unit_type->unit_slug }}">{{ $unit_type->unit_name }}</option>
  @endforeach
</select>
          </div>
          <!-- <div class="mb-3">
            <p class="m-0 text-uppercase">Check-in</p>
            
            <input type="date" class="py-2 px-2 w-100" id="check_in">
          </div>
          <div class="mb-3">
            <p class="m-0 text-uppercase">Check-out</p>
            
            <input type="date" class="py-2 px-2 w-100" id="check_out">
          </div> -->
          <div class="mb-3">
    <p class="m-0 text-uppercase">Check-in</p>
    <input type="date" class="py-2 px-2 w-100" id="check_in">
</div>
<div class="mb-3">
    <p class="m-0 text-uppercase">Check-out</p>
    <input type="date" class="py-2 px-2 w-100" id="check_out">
</div>
          <div class="mb-3 form-group w-100">
            <span class="form-label text-uppercase">Guests</span>
            <select id="guests-select" class="form-control rounded-0">
  <option value="" selected disabled>Choose...</option>
  @for($i=1;$i<=10;$i++)
    <option value="{{ $i }}">{{ $i }}</option>
  @endfor
</select>
                
          </div>
          <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
          
        </form>
      </div>
      <div id="unit-list" class="col-lg-8 ps-lg-3 d-flex flex-wrap">
      @foreach($units as $unit)
    <div class="unit-item col-12 col-lg-6 pt-lg-0 pb-3 pt-3 px-lg-2" data-unit-type="{{ $unit->unit_type }}" data-max-guests="{{ $unit->max_guests }}">
      <div class="border">
            <a href="#">
              <img src="{{asset($unit->room_image)}}" class="card-img-top" alt="..." />
            </a>
            <div class="p-3">
              <h4 class="text-uppercase" style="font-weight: 600;">{{$unit->room_title}}</h4>
              <div class="mb-3 d-flex">
                <p class="me-3 mb-0">{{$unit->max_guests}} of guests</p> ₱{{number_format($unit->room_price,2,'.',',')}} / GUEST</div>
              <p>{{Str::limit($unit->room_description,150)}}</p>
              <hr class="mt-0">
              <div class="d-flex justify-content-between align-items-center">
                <a href="{{route('book',$unit->id)}}" class="btn px-4 py-2 btn-outline-secondary text-uppercase btn-sm">BOOK NOW</a>
                <div class="d-flex">
                  <a href="{{ route('view.unit', [$unit->unit_type, $unit->id]) }}" class="text-secondary text-decoration-none text-uppercase me-1">Full info</a>
                  <i class="text-secondary ri-arrow-right-line"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach

      </div>
      
    </section>

<script>
  const unitTypeSelect = document.querySelector('#unit-type-select');
  const guestsSelect = document.querySelector('#guests-select');
  
  const unitItems = document.querySelectorAll('.unit-item');
  

  unitTypeSelect.addEventListener('change', filterUnits);
  guestsSelect.addEventListener('change', filterUnits);
  
  function filterUnits() {
    const selectedUnitType = unitTypeSelect.value;
    const selectedGuests = guestsSelect.value;
    

    unitItems.forEach(item => {
      const unitType = item.dataset.unitType;
      const maxGuests = item.dataset.maxGuests;
      
      if (
        (selectedUnitType === 'all' || unitType === selectedUnitType) &&
        (selectedGuests === '' || maxGuests >= selectedGuests)
      ) {
        item.style.display = 'block';
      } else {
        item.style.display = 'none';
      }
    });
  }
</script>
@endsection