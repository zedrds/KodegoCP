@extends('client.master_client')
@section('client')
<div class="book-cover d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset('frontend/assets/img/hero.jpg')}});">
      <h1 class="text-white text-uppercase">checkout / summary</h1>
    </div>


      <section class="container p-3 mb-5 payment-container">
        <form method="post" class="d-flex flex-wrap" action="{{ route('store.book') }}" enctype="multipart/form-data">
          @csrf
          <div class="col-lg-7 p-3 pt-0 col-12 d-flex flex-wrap">
            <div class="w-100 border mb-3" style="height:300px; background-size:cover; background-position:center; background-image: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url({{asset($unit->room_image)}});">

            </div>
            <div class="form-floating mb-3 pe-lg-1 col-12 col-lg-6">
              <input type="text" class="form-control" id="first_name" value="{{$guest->first_name}}" disabled placeholder="First name">
              <label for="first_name">First Name</label>
            </div>
            <div class="form-floating mb-3 ps-lg-1 col-12 col-lg-6">
              <input type="text" class="form-control" id="last_name" value="{{$guest->last_name}}" disabled placeholder="Last name">
              <label for="last_name">Last Name</label>
            </div>
            <div class="form-floating mb-3 pe-lg-1 col-12 col-lg-6">
              <input type="email" class="form-control" id="email" value="{{$guest->email}}" disabled placeholder="Email">
              <label for="email">Email Address</label>
            </div>
            <div class="form-floating mb-3 ps-lg-1 col-12 col-lg-6">
              <input type="email" class="form-control" id="phone" value="{{$guest->phone}}" disabled placeholder="Phone number">
              <label for="phone">Phone number</label>
            </div>
            <div class="form-floating mb-3 col-12">
              <textarea class="form-control" placeholder="Leave Notes Here" id="notes" style="height: 100px" name="notes"></textarea>
              <label for="notes">Notes</label>
            </div>

            
          </div>

          <div class="col-lg-5 col-12 p-4 mt-4 mt-lg-0 border d-flex flex-wrap">            
              @error('guests')
                <div class="col-12">
                      <div class="alert alert-danger">{{ $message }}</div>
                </div>
            @enderror           
              @error('payment_method')
                <div class="col-12">
                      <div class="alert alert-danger">{{ $message }}</div>
                </div>
            @enderror
            <div class="col-12 mb-3">
              <h5 class="m-0">Unit</h5>
              <input class="form-control bg-secondary-subtle" value="{{$unit->room_title}}" readonly/>
              <input type="hidden" id="room_title"  name="room_title" value="{{$unit->id}}" />
            </div>
            <div class="col-6 mb-3 pe-1">
              <h5 class="m-0">Check-in</h5>
              <input type="date" name="check_in" id="check_in" class="form-control" required/>
            </div>
            <div class="col-6 mb-3 ps-1">
              <h5 class="m-0">Check-out</h5>
              <input type="date" name="check_out" id="check_out" class="form-control" required/>
            </div>
            <div class="col-6 mb-3 pe-1">
                <h5 class="m-0">Guests</h5>
                <select class="form-control rounded-0" name="guests" id="guests" required>
                <option selected disabled>Choose...</option>
                @php
                    $max_guest = $unit->max_guests;
                @endphp        
                  @for($i=1;$i<=$max_guest;$i++)
                  <option value="{{$i}}">{{$i}}</option>
                  @endfor
            </select>
            </select>
            </div>
            <div class="col-6 mb-3 ps-1">
                <h5 class="m-0">Total Price</h5>
                <input type="text" class="form-control bg-secondary-subtle" name="total_cost" id="total_cost" readonly>
            </div>
            <div class="col-12">
                <h5 style="font-weight: 600;">Payment method</h5>
                <select class="form-select" id="paymentOption" name="payment_method" aria-label="Example select with button addon" required>
                    <option selected="" disabled>Choose...</option>
                    <option value="gcash">Gcash</option>
                    <option value="bank">Bank</option>
                    <option value="maya">Maya</option>
                    <option value="cash">Cash</option>
                </select>
            </div>
            
            <div id="gcashInfo" class="p-3 col-12 mt-3 bg-secondary-subtle " style="display: none;">
                <div class=" d-flex align-items-center justify-content-between">
                    <div>
                      <p class="m-0">Gcash Account #: 09982315679</p>
                      <p class="m-0">Name: Marc Aaron Pasaraba</p>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#gcashModal" class="btn btn-dark">QR</button>
                </div>
            </div>
            <div id="bankInfo" class="p-3 col-12 mt-3 bg-secondary-subtle " style="display: none;">
                <div class=" d-flex align-items-center justify-content-between">
                    <div>
                      <p class="m-0">Bank Name: KOMO</p>
                      <p class="m-0">Bank Account #: 99197392</p>
                      <p class="m-0">Name: Marc Aaron Pasaraba</p>
                    </div>
                </div>
            </div>
            <div id="mayaInfo" class="p-3 col-12 mt-3 bg-secondary-subtle " style="display: none;">
                <div class=" d-flex align-items-center justify-content-between">
                    <div>
                      <p class="m-0">Maya Account #: 09982315679</p>
                      <p class="m-0">Name: Marc Aaron Pasaraba</p>
                    </div>
                    <button type="button" data-bs-toggle="modal" data-bs-target="#mayaModal" class="btn btn-dark">QR</button>
                </div>
            </div>
            <div id="uploadPayment" class="col-12" style="display:none">
              <div class="col-6">
                <label for="customFile" class="mt-3 btn btn-outline-dark waves-effect waves-light">Upload Receipt</label>
                <input type="file" name="file" id="customFile" style="display:none">
                
              </div>
              <div class="col-6">
                <img id="showImage" class="w-100 mt-3"/>
              </div>
              <div class="col-12 mt-3">
                <h5 style="font-weight: 600;">Reference number</h5>
                
                  <input class="form-control" type="text" name="reference_no" id="reference_no"/>
                  <small>*dont forget to upload your receipt</small>
              </div>
            </div>
            <div class="mt-3 col-12 d-flex justify-content-end">
             
              <a href="{{route('home')}}" class="btn btn-light border-black d-flex align-items-center">Cancel</a>
              <button type="submit" href="#" class="btn btn-dark ms-2">Proceed</button>
            </div>
          </div>
        </form>
      </section>
   
    @include('client.bookings.modals')
    


<script type="text/javascript">
    const paymentOption = document.getElementById('paymentOption');
    const gcashInfo = document.getElementById('gcashInfo');
    const bankInfo = document.getElementById('bankInfo');
    const mayaInfo = document.getElementById('mayaInfo');
    const uploadPayment = document.getElementById('uploadPayment');
    const referenceNoInput = document.getElementsByName('reference_no')[0];

    paymentOption.addEventListener('change', (event) => {
        if (event.target.value === 'gcash') {

          uploadPayment.style.display = 'block';
            gcashInfo.style.display = 'block';
            bankInfo.style.display = 'none';
            mayaInfo.style.display = 'none';
        }else if(event.target.value === 'bank'){
          uploadPayment.style.display = 'block';
          gcashInfo.style.display = 'none';
          mayaInfo.style.display = 'none';
          bankInfo.style.display = 'block';
        }else if(event.target.value === 'maya'){
          uploadPayment.style.display = 'block';
          gcashInfo.style.display = 'none';
          mayaInfo.style.display = 'block';
          bankInfo.style.display = 'none';
        } else {
          uploadPayment.style.display = 'none';
            gcashInfo.style.display = 'none';
            bankInfo.style.display = 'none';
            mayaInfo.style.display = 'none';
        }
        if (event.target.value === 'cash') {
          referenceNoInput.removeAttribute('required');
        } else {
          referenceNoInput.setAttribute('required', true);
        }
    });

    $(document).ready(function(){
        $('#customFile').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

@endsection