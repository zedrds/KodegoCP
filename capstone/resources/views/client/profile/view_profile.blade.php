@extends('client.master_client')
@section('client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<section class="profile-page container d-flex flex-wrap">
  
            
<aside class="col-12 col-lg-5 p-lg-5">
  <form method="post" id="myForm" action="{{ route('update.profile') }}" enctype="multipart/form-data">
    @csrf 
    <div class="d-flex flex-column">
      <img class="w-50" id="showImage" src="{{ (!empty($guest->profile_pic)) ? url($guest->profile_pic) : url('upload/default.jpg') }}" style="margin: auto; border-radius: 50%; object-fit: cover;">
      <label for="customFile" class="mt-3 btn btn-outline-dark m-auto waves-effect waves-light">Upload New Photo</label>
      <input type="file" name="file" id="customFile" style="display:none">
      <div class="p-3 mt-3">
        <div>
          <h6 class="m-0">Username</h6>
          <p class="">{{$guest->username}} </p> 
        </div>
        <div>
          <h6 class="m-0">Name</h6>
          <p class="">{{$guest->first_name.' '.$guest->last_name}} </p> 
        </div>
        <div>
          <h6 class="m-0">E-mail</h6>
          <p class="">{{$guest->email}} </p> 
        </div>
        <div>
          <h6 class="m-0">Phone #</h6>
          <p class="mb-0">{{$guest->phone}} </p> 
        </div>
      </div>
    </div>
  </aside>
  <main class="col-12 col-lg-7 p-5 mt-4 mt-lg-0 border">
    
    <div class="d-flex flex-wrap pe-lg-2">
      <h2 class="col-12 mb-3">Profile</h2>
      <div class="mb-2 col-12 col-lg-6">
          <p class="form-label">First Name</p>
          <input type="text" name="first_name" value="{{$guest->first_name}}" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6 ps-lg-2">
        <p class="form-label">Last Name</p>
        <input type="text" name="last_name" value="{{$guest->last_name}}" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6">
          <p class="form-label">E-mail</p>
          <input type="email" name="email" value="{{$guest->email}}" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6 ps-lg-2">
        <p class="form-label">Contact Number</p>
        <input type="text" name="phone" value="{{$guest->phone}}" class="form-control" >
      </div>
      <div class="mb-2 col-12">
          <p class="form-label">Address</p>
          <input type="text" name="address" value="{{$guest->address}}" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6">
          <p class="form-label">Town/City</p>
          <input type="text" name="city" value="{{$guest->city}}" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6 ps-lg-2">
        <p class="form-label">Zip Code</p>
        <input type="number" name="zip" value="{{$guest->zip}}" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6">
          <p class="form-label">Password</p>
          <input type="password" id="password" name="password" class="form-control" >
      </div>
      <div class="mb-2 col-12 col-lg-6 ps-lg-2">
        <p class="form-label">Confirm Password</p>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" >
      </div>
      @error('password')
            <div class="mb-2 col-12">
                  <div class="alert alert-danger">{{ $message }}</div>
            </div>
        @enderror
      <div class=" mt-4">
        <button type="submit" class="btn btn-dark">Update Profile</button>
      </div>
    </div>
  </main>
  </form>
</section>


<section class="container my-5">
  <h1 class="border-bottom shadow-none">Booking History</h1>
  <table class="table   mt-3 w-100 justify-content-center table-striped table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Unit</th>
        <th scope="col">Start Date</th>
        <th scope="col">End Date</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reservations as $key=>$reservation)
      <tr>
        <th scope="row">{{$key+1}}</th>
        <td>{{$rooms->where('id',$reservation->room_id)->first()->room_title}}</td>
        <td>
          @if ($reservation->check_in)
                @php
                    $date_in = DateTime::createFromFormat('Y-m-d', $reservation->check_in);
                @endphp
                @if ($date_in && $date_in->format('Y-m-d') === $reservation->check_in)
                    {{ date_format($date_in, 'F j, Y') }}
                @else
                    {{ $reservation->check_in }}
                @endif
            @endif


        </td>
        <td>
          @if ($reservation->check_out)
                @php
                    $date_out = DateTime::createFromFormat('Y-m-d', $reservation->check_out);
                @endphp
                @if ($date_out && $date_out->format('Y-m-d') === $reservation->check_out)
                    {{ date_format($date_out, 'F j, Y') }}
                @else
                    {{ $reservation->check_out }}
                @endif
            @endif
        </td>
        <td>{{$reservation->status}} </td>
      </tr>
      @endforeach

    </tbody>
  </table>
</section>




<script type="text/javascript">
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                first_name: {
                    required : true,
                },
                last_name: {
                    required : true,
                }, 
                email: {
                    required : true,
                },  
                phone: {
                    required : true,
                },  
                address: {
                    required : true,
                }, 
                city: {
                    required : true,
                },  
                zip: {
                    required : true,
                }, 
                password: {
                    minlength: {
                        depends: function(element) {
                            return $(element).val().length > 0;
                        },
                        param: 8
                    },
                    equalTo: {
                        depends: function(element) {
                            return $(element).val().length > 0;
                        },
                        param: "#password_confirmation"
                    }
                },
                password_confirmation: {
                    minlength: {
                        depends: function(element) {
                            return $(element).val().length > 0;
                        },
                        param: 8
                    },
                    equalTo: {
                        depends: function(element) {
                            return $(element).val().length > 0;
                        },
                        param: "#password"
                    }
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.validate').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>
@endsection