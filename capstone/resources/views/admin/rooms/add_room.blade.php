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
        <form method="post" id="myForm" action="{{ route('store.room') }}" enctype="multipart/form-data">
                @csrf
                <!-- start page title -->
                <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Units</li>
                                            <li class="breadcrumb-item active">Add new unit</li>
                                        </ol>
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
                            <h3 class="mb-3"><strong>Add a new unit</strong></h3>    
                                        <div>
                                            <button type="submit" class="btn btn-info btn-rounded waves-effect waves-light d-flex align-items-center">
                                                <i class="ri-add-line me-1"></i>Add a unit
                                            </button>
                                        </div>
                            </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Room title</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="room_title"  >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex">
                                                <div class="col-6 pe-1">
                                                    <label  class="col-form-label">Price per night</label>
                                                    <div class="">
                                                        <input class="form-control" type="number" name="room_price"  >
                                                    </div>
                                                </div>
                                                <div class="col-6 ps-1">
                                                    <label  class="col-form-label">Max guests</label>
                                                    <div class="">
                                                        <input class="form-control" type="number" name="max_guests"  >
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label  class="col col-form-label">Room description</label>
                                                <div class="col">
                                                <textarea name="room_description"   class="form-control" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Owner</label>
                                                <div class="col">
                                                    <select class="form-select" name="owner_id" >
                                                        <option selected="" disabled></option>                                                    
                                                        @foreach($owners as $owner)
                                                            <option value="{{$owner->id}}">{{$owner->owner_name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Is parking available to guests?</label>
                                                <div class="col">
                                                    <select class="form-select" name="parking" >
                                                        <option selected="" disabled></option>
                                                        <option value="1">Yes, free</option>
                                                        <option value="2">Yes, paid</option>
                                                        <option value="0">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <label  class="col col-form-label">Type of unit</label>
                                                <div class="col-12 d-flex justify-content-between">
                                                    <select class="form-select" id="unit_type" name="unit_type"  style="max-width:200px">
                                                        <option selected="" disabled></option>
                                                        @foreach($unit_types as $unit_type)
                                                        <option value="{{$unit_type->unit_slug}}">{{$unit_type->unit_name}}</option>
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
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
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
                                                        <input class="form-check-input" name="amenities[]" value="{{$item->id}}" type="checkbox" id="{{$item->amenity_slug}}">
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
                                                        <input class="form-check-input" name="features[]" value="{{$item->id}}" type="checkbox" id="{{$item->feature_slug}}">
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
                                                    <input class="form-check-input" value="1" name="smoking_allowed" type="checkbox" role="switch" id="smoking_allowed">
                                                    <label class="form-check-label" for="smoking_allowed">Smoking allowed</label>
                                                </div>
                                                <div class="form-check form-switch col-6">
                                                    <input class="form-check-input" value="1" name="pet_friendly" type="checkbox" role="switch" id="pet_friendly">
                                                    <label class="form-check-label" for="pet_friendly">Pets allowed</label>
                                                </div>
                                            </div>
                                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-4">
                    <div class="card">
                    <img id="showImage"  class="card-img-top img-fluid"  src="{{ url('upload/default.jpg') }}" alt="Card image cap">
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
            <div class="row">
                <div>
                    <label for="thumbnails" class="btn btn-info btn-rounded waves-effect waves-light">Upload Thumbnail Photos</label>
                    <input type="file" name="thumbnail[]" id="thumbnails" style="display:none" multiple="">
                </div>
        
            </div>
            <div class="row d-flex flex-wrap mb-5" id="preview_img">
                            
        
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
  $(document).ready(function(){
   $('#thumbnails').on('change', function(){ 
      if (window.File && window.FileReader && window.FileList && window.Blob) 
      {
          var data = $(this)[0].files; 
          $('#preview_img').empty(); 
           
          $.each(data, function(index, file){ 
              if(/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file.type)){ 
                  var fRead = new FileReader(); 
                  fRead.onload = (function(file){ 
                  return function(e) {
                      var img = $('<img/>').addClass('col-12 col-md-3 mt-2').attr('src', e.target.result).height('auto'); 
                      $('#preview_img').append(img);
                  };
                  })(file);
                  fRead.readAsDataURL(file);
              }
          });
           
      }else{
          alert("Your browser doesn't support File API!"); 
      }
   });
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
                            return $('#unit_type').val() !== 'studio';
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