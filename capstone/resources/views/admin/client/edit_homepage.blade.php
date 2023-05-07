@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
        <form method="post" id="myForm" action="{{ route('update.homepage') }}" enctype="multipart/form-data">
            @csrf     
            <input type="hidden" name="id" value="1"/>
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Webpage</li>
                                            <li class="breadcrumb-item active">Edit Homepage</li>
                                        </ol>
                                    </div>
                                    <button type="submit" class="btn btn-info waves-effect waves-light">Update Homepage</button>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3"><strong>Hero section</strong></h3>
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Homepage Title</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="homepage_title" value="{{$homepage_details->homepage_title}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <img id="showImage_hero" class="card-img-top img-fluid" src="{{url($homepage_details->homepage_picture)}}" alt="Card image cap">
                        <div class="card-body d-flex flex-column align-items-center">
                            <label for="homepage_picture" class="btn btn-info btn-rounded waves-effect waves-light">Upload Photo</label>
                            <input type="file" name="homepage_picture" id="homepage_picture" style="display:none">
                            <div class="alert alert-secondary text-center" role="alert">
                                
                                <p class="mb-0">Maximum upload size is <strong>8 MB</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3"><strong>About section</strong></h3>
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">About title</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="about_title" value="{{$homepage_details->about_title}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">About title 2</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="about_title_2" value="{{$homepage_details->about_title_2}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">About description</label>
                                    <div class="col">
                                        <textarea name="about_description" class="form-control" rows="5">{{$homepage_details->about_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                   <div class="card">
                        <img id="showImage_about" class="card-img-top img-fluid" src="{{url($homepage_details->about_picture)}}" alt="Card image cap">
                        <div class="card-body d-flex flex-column align-items-center">
                            <label for="about_picture" class="btn btn-info btn-rounded waves-effect waves-light">Upload Photo</label>
                            <input type="file" name="about_picture" id="about_picture" style="display:none">
                            <div class="alert alert-secondary text-center" role="alert">
                                
                                <p class="mb-0">Maximum upload size is <strong>8 MB</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3"><strong>Amenities section</strong></h3>
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Amenities title</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="amenities_title" value="{{$homepage_details->amenities_title}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Amenities title 2</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="amenities_title_2" value="{{$homepage_details->amenities_title_2}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Amenities description</label>
                                    <div class="col">
                                        <textarea name="amenities_description" class="form-control" rows="5">{{$homepage_details->amenities_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                   <div class="card">
                        <img id="showImage_amenities" class="card-img-top img-fluid" src="{{url($homepage_details->amenities_picture)}}" alt="Card image cap">
                        <div class="card-body d-flex flex-column align-items-center">
                            <label for="amenities_picture" class="btn btn-info btn-rounded waves-effect waves-light">Upload Photo</label>
                            <input type="file" name="amenities_picture" id="amenities_picture" style="display:none">
                            <div class="alert alert-secondary text-center" role="alert">
                                
                                <p class="mb-0">Maximum upload size is <strong>8 MB</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3"><strong>Featured section</strong></h3>
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured title 1</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="featured_title_1" value="{{$homepage_details->featured_title_1}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured icon 1</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="featured_icon_1" value="{{$homepage_details->featured_icon_1}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured description 1</label>
                                    <div class="col">
                                        <textarea name="featured_description_1" class="form-control" rows="5">{{$homepage_details->featured_description_1}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <img id="showImage_featured" class="card-img-top img-fluid" src="{{url($homepage_details->featured_picture)}}" alt="Card image cap">
                        <div class="card-body d-flex flex-column align-items-center">
                            <label for="featured_picture" class="btn btn-info btn-rounded waves-effect waves-light">Upload Photo</label>
                            <input type="file" name="featured_picture" id="featured_picture" style="display:none">
                            <div class="alert alert-secondary text-center" role="alert">
                                
                                <p class="mb-0">Maximum upload size is <strong>8 MB</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured title 2</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="featured_title_2" value="{{$homepage_details->featured_title_2}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured icon 2</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="featured_icon_2" value="{{$homepage_details->featured_icon_2}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured description 2</label>
                                    <div class="col">
                                        <textarea name="featured_description_2" class="form-control" rows="5">{{$homepage_details->featured_description_2}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured title 3</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="featured_title_3" value="{{$homepage_details->featured_title_3}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured icon 3</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="featured_icon_3" value="{{$homepage_details->featured_icon_3}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Featured description 3</label>
                                    <div class="col">
                                        <textarea name="featured_description_3" class="form-control" rows="5">{{$homepage_details->featured_description_3}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3"><strong>Unit section</strong></h3>
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Unit title</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="unit_title" value="{{$homepage_details->unit_title}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Unit title 2</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="unit_title_2" value="{{$homepage_details->unit_title_2}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Unit price</label>
                                    <div class="col">
                                        <input class="form-control" type="number" name="unit_price" value="{{$homepage_details->unit_price}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Unit list</label>
                                    <div class="col">
                                        <textarea id="elm1" name="unit_list">{{ $homepage_details->unit_list}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <img id="showImage_unit" class="card-img-top img-fluid" src="{{url($homepage_details->unit_picture)}}" alt="Card image cap">
                        <div class="card-body d-flex flex-column align-items-center">
                            <label for="unit_picture" class="btn btn-info btn-rounded waves-effect waves-light">Upload Photo</label>
                            <input type="file" name="unit_picture" id="unit_picture" style="display:none">
                            <div class="alert alert-secondary text-center" role="alert">
                                
                                <p class="mb-0">Maximum upload size is <strong>8 MB</strong></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="mb-3"><strong>Location section</strong></h3>
                            <div class="row">
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Location title</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="location_title" value="{{$homepage_details->location_title}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Location title 2</label>
                                    <div class="col">
                                        <input class="form-control" type="text" name="location_title_2" value="{{$homepage_details->location_title_2}}"  >
                                    </div>
                                </div>
                                <div class="col-12 validate">
                                    <label  class="col col-form-label">Location description</label>
                                    <div class="col">
                                        <textarea name="location_description" class="form-control" rows="5">{{$homepage_details->location_description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        </div>
    </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#homepage_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage_hero').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
    $(document).ready(function(){
        $('#about_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage_about').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
    $(document).ready(function(){
        $('#amenities_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage_amenities').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
    $(document).ready(function(){
        $('#unit_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage_unit').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
    $(document).ready(function(){
        $('#featured_picture').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage_featured').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    });
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                homepage_title: {
                    required : true,
                },
                about_title: {
                    required : true,
                },
                about_title_2: {
                    required : true,
                },
                about_description: {
                    required : true,
                },
                amenities_title: {
                    required : true,
                },
                amenities_title_2: {
                    required : true,
                },
                amenities_description: {
                    required : true,
                },
                featured_title_1: {
                    required : true,
                },
                featured_icon_1: {
                    required : true,
                },
                featured_description_1: {
                    required : true,
                },
                featured_title_2: {
                    required : true,
                },
                featured_icon_2: {
                    required : true,
                },
                featured_description_2: {
                    required : true,
                },
                featured_title_3: {
                    required : true,
                },
                featured_icon_3: {
                    required : true,
                },
                featured_description_3: {
                    required : true,
                },
                unit_title: {
                    required : true,
                }, 
                unit_title_2: {
                    required : true,
                }, 
                unit_price: {
                    required : true,
                }, 
                unit_list: {
                    required : true,
                }, 
                location_title: {
                    required : true,
                }, 
                location_title_2: {
                    required : true,
                }, 
                location_description: {
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