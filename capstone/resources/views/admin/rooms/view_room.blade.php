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
</style>

    <div class="page-content">
        <div class="container-fluid">
        
                <!-- start page title -->
                <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Units</li>
                                            <li class="breadcrumb-item active">View room</li>
                                        </ol>
                                    </div>
                                    <div>
                                            <a href="{{route('edit.room',$room->id)}}" class="btn btn-info btn-rounded waves-effect waves-light d-flex align-items-center">
                                                <i class="ri-edit-2-fill me-2"></i>Edit room
                                            </a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
            <div class="row">
                
                <div class="col-md-8">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <h3 class="mb-3"><strong>{{ucfirst($room->unit_type)}} unit</strong></h3>    
                                        
                            </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Room title</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" value="{{$room->room_title}}" name="room_title"   disabled>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex">
                                                <div class="col-6 pe-1">
                                                    <label  class="col-form-label">Price per night</label>
                                                    <div class="">
                                                        <input class="form-control" type="number" value="{{$room->room_price}}" name="room_price" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-6 ps-1">
                                                    <label  class="col-form-label">Max guests</label>
                                                    <div class="">
                                                        <input class="form-control" type="number" value="{{$room->max_guests}}" name="max_guests" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label  class="col col-form-label">Room description</label>
                                                <div class="col">
                                                <textarea name="room_description"   class="form-control" rows="5" disabled>{{$room->room_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Owner</label>
                                                <div class="col">
                                                    <input type="text" class="form-control" value="{{$owner->owner_name}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Is parking available to guests?</label>
                                                <div class="col">
                                                    @if($room->parking == 1)
                                                        <input type="text" class="form-control" value="Yes, free" disabled style="max-width:120px">
                                                    @elseif($room->parking == 2)
                                                        <input type="text" class="form-control" value="Yes, paid" disabled style="max-width:120px">
                                                    @else
                                                        <input type="text" class="form-control" value="No" disabled style="max-width:120px">
                                                    @endif


                                                    <!-- <select class="form-select" name="parking" >
                                                        <option selected="" disabled></option>
                                                        <option value="1">Yes, free</option>
                                                        <option value="2">Yes, paid</option>
                                                        <option value="0">No</option>
                                                    </select> -->
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col col-form-label">Type of unit</label>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <input type="text" class="form-control" value="{{$unit_type->unit_name}}" disabled>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col col-form-label">Bedrooms available</label>
                                                <div class="col-6 d-flex justify-content-between">
                                                    <div class="col d-flex align-items-center">
                                                        <input type="text" class="form-control" value="{{$room->bedrooms}}" disabled style="width:80px">
                                                   
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <label  class="col-form-label">Amenities </label>
                                            <div class="col flex-wrap d-flex">
                                                @forelse($amenities as $item)
                                                <div class="col-6 col-md-4">
                                                        <input class="form-check-input" name="amenities[]" value="{{$item->id}}" type="checkbox" id="{{$item->amenity_slug}}" disabled {{ $amenity_active->contains('amenity_id', $item->id) ? 'checked' : '' }} />
                                                        <label class="form-check-label" for="{{$item->amenity_slug}}">
                                                            {{ucfirst($item->amenity_name)}}
                                                        </label>
                                                </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                        <div class="row">
                                        <label  class="col-form-label">Features <small>*what can guests use</small></label>
                                            <div class="col flex-wrap d-flex">
                                                    
                                                @forelse($features as $item)
                                                <div class="col-6 col-md-4">
                                                        <input class="form-check-input" name="features[]" value="{{$item->id}}" type="checkbox" id="{{$item->feature_slug}}" disabled {{ $feature_active->contains('feature_id', $item->id) ? 'checked' : '' }}>
                                                        <label class="form-check-label" for="{{$item->feature_slug}}">
                                                            {{ucfirst($item->feature_name)}}
                                                        </label>
                                                </div>
                                                @empty
                                                @endforelse
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                        <label  class="col-form-label">House Rules </label>
                                            <div class="col d-flex">
                                                    
                                                <div class="form-check form-switch col-6">
                                                    <input class="form-check-input" value="1" name="smoking_allowed" type="checkbox" role="switch" id="smoking_allowed" disabled {{$room->smoking_allowed == '1' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="smoking_allowed">Smoking allowed</label>
                                                </div>
                                                <div class="form-check form-switch col-6">
                                                    <input class="form-check-input" value="1" name="pet_friendly" type="checkbox" role="switch" id="pet_friendly" disabled {{$room->pet_friendly == '1' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="pet_friendly">Pets allowed</label>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="card">
                        <img id="showImage"  class="card-img-top img-fluid"  src="{{ url($room->room_image) }}" alt="Card image cap">
                    </div>
                </div>
            </div>
            <div class="row d-flex flex-wrap">
                @foreach($thumbnails as $thumbnail)
                    <img class="col-12 col-md-3 mt-2" src="{{asset($thumbnail->thumbnail_name)}}" style="height:auto"/> 
                @endforeach
            </div>
       
        </div>
    </div>

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
<script>
    
    var minusBtn = document.getElementById("minus-btn");
    var plusBtn = document.getElementById("plus-btn");
    var quantityInput = document.getElementById("quantity-input");

    
    minusBtn.addEventListener("click", function() {
        if (quantityInput.value > 0) {
            quantityInput.value--;
        }
    });

    
    plusBtn.addEventListener("click", function() {
        quantityInput.value++;
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                room_title: {
                    required : true,
                }, 
                room_price: {
                    required : true,
                    number : true,
                }, 
                room_description: {
                    required : true,
                },
                unit_type: {
                    required : true,
                },  
                parking: {
                    required : true,
                }, 
                owner_id: {
                    required : true,
                },  
                bedrooms: {
                    required: {
                        depends: function(element) {
                            return $('#unit-type').val() !== 'studio';
                        },
                        min: 1,

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
        $('#unit_type').on('change', function() {
            if ($('#unit_type').val() === 'studio') {
            $('#bedrooms').val('').prop('disabled', true);
        } else {
            $('#bedrooms').val(1).prop('disabled', false);
        }
    });
    });
    
</script>
@endsection