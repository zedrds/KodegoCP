@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<style>
    /* Hide the arrow buttons */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type=number] {
        max-width:150px
    }
</style>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Reservations</li>
                                            <li class="breadcrumb-item active">Create new reservation</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
        <form method="post" id="myForm" action="{{ route('store.reservation') }}" enctype="multipart/form-data">
            @csrf     
            <div class="row">
                
                <div class="col-12">
                    <div class="card">
                        
                        <div class="card-body">
                        <h3 class="mb-3"><strong>Create new reservation</strong></h3>
                    
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Guest name</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="guest_name" id="guest_name"  placeholder="Enter guest name" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="d-flex align-items-center">
                                                    <label  class="col-form-label">Guest username</label>
                                                    <input class="ms-3 me-1 form-check-input" type="checkbox" id="use_username">
                                                    <small>*Use this if you want username to be inputted</small>
                                                </div>
                                                <div class="col-sm">
                                                    <select class="form-select" name="guest_username" disabled id="guest_username" >
                                                        <option selected="" disabled></option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->username}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            
                                           
                                            <div class="col-12 col-md-6 ">
                                                
                                                <label  class="col col-form-label">Unit Type</label>
                                                <div class="col-sm">
                                                <select class="form-select" name="unit_type" >
                                                    <option selected="" disabled>Open this select menu</option>
                                                    @foreach($unit_types as $unit_type)
                                                        <option value="{{$unit_type->unit_slug}}">{{$unit_type->unit_name}}</option>
                                                    @endforeach
                                                    </select>
                                            
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Unit name</label>
                                                <div class="col-sm">
                                                    <select class="form-select" name="room_title" id="room_title" >
                                                        <option selected="" disabled></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                
                                                <label  class="col col-form-label">Check-in date</label>
                                                <div class="col-sm">
                                                    <input class="form-control" type="date" id="check_in" name="check_in" value="" />
                                            
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">Check-out date</label>
                                                <div class="col-sm">
                                                <input class="form-control" type="date" id="check_out" name="check_out" value="" />
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <label  class="col col-form-label validate"># of Guests</label>
                                                <div class="col">
                                                    <input class="form-control" type="number" name="guests" min="1" placeholder="Enter # of guests" id="guests">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 validate">
                                            <label  class="col col-form-label">Total cost</label>
                                            <div class="input-group mb-3">
                                                <span class="input-group-text">₱</span>
                                                <input type="text" class="form-control" name="total_cost" id="total_cost" readonly style="max-width:200px">
                                            </div>
                                               
                                            </div>
                                            
                                        </div>
                                     
                                        
                            <div class="mt-3">
                            <button type="submit" class="mt-3 btn btn-info btn-rounded waves-effect waves-light">Create reservation</button>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
<script>
    const currentDate = new Date();
    const check_in = document.getElementById('check_in');
    check_in.valueAsDate = currentDate;

    const nextDay = new Date(currentDate);
    nextDay.setDate(currentDate.getDate() + 1);

    const check_out = document.getElementById('check_out');
    check_out.valueAsDate = nextDay;
  
    check_in.addEventListener('change', function() {
        const selectedDate = new Date(check_in.value);
        const minDate = new Date(selectedDate.getTime() + 86400000); 
        check_out.min = minDate.toISOString().split('T')[0]; 
    });
    check_out.addEventListener('change', function() {
            const selectedDate = new Date(check_out.value);
            const minDate = new Date(check_in.valueAsNumber + 86400000); 
            if (selectedDate.getTime() < minDate.getTime()) {
                check_out.value = ''; 
            }
    });

    function getRoomPrice(room_id,guests,check_in,check_out) {
        fetch(`/admin/rooms/get-price/${room_id}`)
            .then(response => response.json())
            .then(data => {
                const totalNights = Math.round((new Date(check_out) - new Date(check_in)) / (1000 * 60 * 60 * 24));
                let totalCost = data.total_cost * guests * totalNights;
                document.getElementById('total_cost').value = totalCost;
            })
            .catch(error => console.error(error));
    }
    function getMaxGuests(room_id) {
        fetch(`/admin/rooms/get-max-guests/${room_id}`)
        .then(response => response.json())
        .then(data => {
            const guestsInput = document.getElementById('guests');
            guestsInput.setAttribute('max', data.max_guests);
            guestsInput.insertAdjacentHTML('afterend', `<small>*max guests is ${data.max_guests}</small>`);
        })
        .catch(error => console.error(error));
    }
    

    document.getElementById('room_title').addEventListener('change', function() {
        const room_id = this.value;
        if (room_id) {
            getMaxGuests(room_id);
        }
    });
    document.getElementById('guests').addEventListener('input', function() {
        const room_id = document.getElementById('room_title').value;
        const check_in_date = document.getElementById('check_in').value;
        const check_out_date = document.getElementById('check_out').value;
        const guests = parseInt(this.value) || 0;
        if (room_id) {
            getRoomPrice(room_id, guests, check_in_date,check_out_date);
        }
    });

    document.getElementById('check_in').addEventListener('input', function() {
    const room_id = document.getElementById('room_title').value;
    const check_in_date = this.value;
    const check_out_date = document.getElementById('check_out').value;
    const guests = parseInt(document.getElementById('guests').value) || 0;
    if (room_id && check_in_date && check_out_date) {
        getRoomPrice(room_id, guests, check_in_date, check_out_date);
    }
    });

    document.getElementById('check_out').addEventListener('input', function() {
    const room_id = document.getElementById('room_title').value;
    const check_in_date = document.getElementById('check_in').value;
    const check_out_date = this.value;
    const guests = parseInt(document.getElementById('guests').value) || 0;
    if (room_id && check_in_date && check_out_date) {
        getRoomPrice(room_id, guests, check_in_date, check_out_date);
    }
    });
</script>



<script>
    
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="unit_type"]').on('change',function(){
            let unit_type = $(this).val();
            if(unit_type){
                $.ajax({
                    url: " {{ url('/admin/reservations/ajax') }}/"+unit_type,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="room_title"]').html('');
                        let d = $('select[name="room_title"]').empty();
                        $('select[name="room_title"]').append('<option selected disabled></option>');
                        $.each(data,function(key,value){
                            if(value.status == 1){
                                $('select[name="room_title"]').append('<option value="'+value.id +'" >'+ value.room_title + '</option>');
                            }else{
                                $('select[name="room_title"]').append('<option value="'+value.id +'" disabled >'+ value.room_title + '  --UNAVAILABLE--</option>');
                            }
                            
                        });
                    }
                })
            }
        })
    })
</script>


<script type="text/javascript">
  const useUsernameCheckbox = document.getElementById('use_username');
  const guestNameInput = $('#guest_name');
  const guestUsernameInput = $('#guest_username');

  useUsernameCheckbox.addEventListener('change', function() {
    if (useUsernameCheckbox.checked) {
      guestNameInput.val('').prop('disabled', true);
      guestUsernameInput.prop('disabled', false);
    } else {
      guestNameInput.prop('disabled', false);
      guestUsernameInput.val('').prop('disabled', true);
    }
  });
</script>


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
                unit_type: {
                    required : true,
                }, 
                room_title: {
                    required : true,
                }, 
                check_in: {
                    required : true,
                }, 
                check_out: {
                    required : true,
                }, 
                guests: {
                    required : true,
                    number : true,
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
    $(document).ready(function(){
        $('button[type="submit"]').prop('disabled', true);
        $('input[name="guest_name"], select[name="guest_username"]').on('input', function() {
            if ($('input[name="guest_name"]').val() || $('select[name="guest_username"]').val()) {
                $('button[type="submit"]').prop('disabled', false); 
            } else {
                
                $('button[type="submit"]').prop('disabled', true); 
            }
        });
    });
</script>
@endsection