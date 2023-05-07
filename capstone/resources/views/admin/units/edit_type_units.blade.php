@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
        <form method="post" id="myForm" action="{{ route('update.type.units',$unit_type->unit_slug) }}" enctype="multipart/form-data">
            @csrf
        <input type="hidden" name="id" value="{{$unit_type->id}}"/>
            <div class="row">
                
                <div class="col-12 col-md-5 order-2 order-md-1">
                    <div class="card">
                    <img id="showImage"  class="card-img-top img-fluid"  src="{{ asset($unit_type->unit_image) }}" alt="Card image cap">
                        <div class="card-body d-flex flex-column align-items-center">
                           
                                <label for="customFile" class="btn btn-info btn-rounded waves-effect waves-light">Upload Photo</label>
                                <input type="file" name="file" id="customFile" style="display:none">
                            @if ($errors->has('file'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                </div>             
                            @else
                                <div class="alert alert-secondary text-center" role="alert">
                                    <p>Larger image will be resized automatically.</p>
                                    <p class="mb-0">Maximum upload size is <strong>3 MB</strong></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-5 order-1 order-md-2">
                        <div class="card">
                                    <h5 class="card-header">Update {{$unit_type->unit_name.' type details'}}</h5>
                                    <div class="card-body">
                                        <h5 class="card-title">{{$unit_type->unit_name.' type description'}}</h5>
                                            <textarea required="" class="form-control" rows="5" name="unit_description">{{$unit_type->unit_description}}</textarea>
                                        <button type="submit"  class="mt-3 btn btn-primary">Update</button>
                                    </div>
                                </div>
                </div>
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

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                file: {
                    required : true,
                }, 
                unit_description: {
                    required : true,
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