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
        <form method="post" id="myForm" action="{{ route('update.room') }}" enctype="multipart/form-data">
                @csrf
                <!-- start page title -->
                <input type="hidden" name="id" value="{{$room->id}}"/>
                <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Features</li>
                                            <li class="breadcrumb-item active">View all features</li>
                                        </ol>
                                    </div>
                                    <a id="delete_room" href="{{route('delete.room',$room->id)}}" class="btn btn-danger">Delete room</a>
                                   
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
            <div class="row">
                
                <div class="col-md-8">
                    <div class="card">
                        
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                            <h3 class="mb-3"><strong>Edit room</strong></h3>    
                                        <div>
                                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light d-flex align-items-center">
                                            <i class="ri-save-fill me-1"></i>Update room
                                            </button>
                                        </div>
                            </div>                   
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Room title</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" value="{{$room->room_title}}" name="room_title"  >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex">
                                                <div class="col-6 pe-1">
                                                    <label  class="col-form-label">Price per night</label>
                                                    <div class="">
                                                        <input class="form-control" type="number" value="{{$room->room_price}}" name="room_price"  >
                                                    </div>
                                                </div>
                                                <div class="col-6 ps-1">
                                                    <label  class="col-form-label">Max guests</label>
                                                    <div class="">
                                                        <input class="form-control" type="number" value="{{$room->max_guests}}" name="max_guests"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label  class="col col-form-label">Room description</label>
                                                <div class="col">
                                                <textarea name="room_description"   class="form-control" rows="5">{{$room->room_description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Owner</label>
                                                <div class="col">
                                                    <select class="form-select" name="owner_id" >
                                                        <option selected="" disabled></option>                                                    
                                                        @foreach($owners as $owner)
                                                            <option value="{{$owner->id}}" {{$room->owner_id == $owner->id ? 'selected' : ''}}>{{$owner->owner_name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Is parking available to guests?</label>
                                                <div class="col">
                                                    <select class="form-select" name="parking" >
                                                        <option selected="" disabled></option>
                                                        <option value="1" {{$room->parking == '1' ? 'selected' : ''}}>Yes, free</option>
                                                        <option value="2" {{$room->parking == '2' ? 'selected' : ''}}>Yes, paid</option>
                                                        <option value="0" {{$room->parking == '0' ? 'selected' : ''}}>No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col col-form-label">Type of unit</label>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <select class="form-select" id="unit_type" name="unit_type"  style="max-width:200px">
                                                        <option selected="" disabled></option>
                                                        @foreach($unit_types as $unit_type)
                                                            <option value="{{$unit_type->unit_slug}}" {{$room->unit_type == $unit_type->unit_slug ? 'selected' : ''}}>{{$unit_type->unit_name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col col-form-label">Bedrooms available</label>
                                                <div class="col-6 d-flex justify-content-between">
                                                    <div class="col d-flex align-items-center">
                                                       
                                                            <select class="form-select" id="bedrooms" name="bedrooms"  style="width:100px">
                                                                <option selected="" disabled></option>
                                                                <option value="1" {{$room->bedrooms == '1' ? 'selected' : ''}}>1</option>
                                                                <option value="2" {{$room->bedrooms == '2' ? 'selected' : ''}}>2</option>
                                                                <option value="3" {{$room->bedrooms == '3' ? 'selected' : ''}}>3</option>
                                                            </select>
                                                   
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                        <label  class="col-form-label">Amenities </label>
                                            <div class="col flex-wrap d-flex">
                                                @forelse($amenities as $item)
                                                <div class="col-6 col-md-4">
                                                        <input class="form-check-input" name="amenities[]" value="{{$item->id}}" type="checkbox" id="{{$item->amenity_slug}}" {{ $amenity_active->contains('amenity_id', $item->id) ? 'checked' : '' }} />
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
                                                        <input class="form-check-input" name="features[]" value="{{$item->id}}" type="checkbox" id="{{$item->feature_slug}}" {{ $feature_active->contains('feature_id', $item->id) ? 'checked' : '' }}>
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
                                                    <input class="form-check-input" value="1" name="smoking_allowed" type="checkbox" role="switch" id="smoking_allowed" {{$room->smoking_allowed == '1' ? 'checked' : ''}}>
                                                    <label class="form-check-label" for="smoking_allowed">Smoking allowed</label>
                                                </div>
                                                <div class="form-check form-switch col-6">
                                                    <input class="form-check-input" value="1" name="pet_friendly" type="checkbox" role="switch" id="pet_friendly" {{$room->pet_friendly == '1' ? 'checked' : ''}}>
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
                        <div class="card-body d-flex flex-column align-items-center">
                           
                                <label for="customFile" class="btn btn-info btn-rounded waves-effect waves-light">Upload Main Photo</label>
                                <input type="file" name="file" id="customFile" style="display:none">
                            @if ($errors->has('file'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                </div>             
                            @else
                                <div class="alert alert-secondary text-center" role="alert">
                                    <p>Set main room image. Larger image will be resized automatically.</p>
                                    <p class="mb-0">Maximum upload size is <strong>3 MB</strong></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            </form>

            <form method="post" id="myForm" action="{{route('update.room.thumbnail')}}" enctype="multipart/form-data">
                @csrf
            <div class="row">
                <div>
                    <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light mb-3">Update Thumbnail Photos</button>
                </div>
        
            </div>
            <div class="row d-flex flex-wrap mb-5">
                @foreach($thumbnails as $thumbnail)
                <div class="col-md-6 col-xl-3">
                    
                    <div class="card">
                        <img class="card-img-top img-fluid" src="{{asset($thumbnail->thumbnail_name)}}" alt="Card image cap">
                        <div class="card-body">
                            <label for="thumbnail{{$thumbnail->id}}" class="text-primary me-2" style="cursor:pointer">Change photo</label>
                            <input type="file" name="thumbnail[{{$thumbnail->id}}]" id="thumbnail{{$thumbnail->id}}" style="display:none" multiple="">
                            <a href="{{route('delete.room.thumbnail',$thumbnail->id)}}" id="delete_thumbnail" class="card-link text-danger">Delete</a>
                        </div>
                    </div>

                </div>
                @endforeach
                            
        
            </div>
            </form>
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
                max_guests: {
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


   $(document).ready(function() {
        $('#unit_type').on('change', function() {
            if ($(this).val() === 'studio') {
                $('#bedrooms').val('').prop('disabled', true);
            } else {
                $('#bedrooms').val(1).prop('disabled', false);
            }
        }).change(); // trigger change event on page load
    });

    });
    
</script>
@endsection