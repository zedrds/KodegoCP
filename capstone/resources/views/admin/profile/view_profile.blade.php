@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
        <form method="post" id="myForm" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf     
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                            
                        <div class="card-body d-flex flex-column align-items-center">
                            <h3>{{ ucfirst($adminData->first_name).' '.ucfirst($adminData->last_name)}}</h3>
                            <h4 class="card-title">{{ '@'.$adminData->username }}</h4>
                            <img id="showImage" class="rounded-circle border mt-3 avatar-xl" src="{{ (!empty($adminData->profile_pic)) ? url($adminData->profile_pic) : url('upload/default.jpg') }}" alt="Card image cap">
                            
                                <label for="customFile" class="mt-3 btn btn-info btn-rounded waves-effect waves-light">Upload New Photo</label>
                                <input type="file" name="file" id="customFile" style="display:none">
                            @if ($errors->has('file'))
                                <div class="alert alert-danger" role="alert">
                                    <span class="text-danger">{{ $errors->first('file') }}</span>
                                </div>             
                            @else
                                <div class="alert alert-secondary text-center" role="alert">
                                    <p>Upload a new avatar. Larger image will be resized automatically.</p>
                                    <p class="mb-0">Maximum upload size is <strong>3 MB</strong></p>
                                </div>
                            @endif
                            
                            
                            <h4 class="card-title mt-3">Member since: <strong>{{ Carbon\Carbon::parse($adminData->created_at)->format('d M Y')}}</strong></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        
                        <div class="card-body">
                        <h3 class="mb-3"><strong>Edit Profile</strong></h3>
                    
                                        <div class="row">
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">First Name</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="first_name" value="{{$adminData->first_name}}" placeholder="Enter your first name" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Last name</label>
                                                <div class="col-sm">
                                                    <input class="form-control" type="text" name="last_name" value="{{$adminData->last_name}}" placeholder="Enter your last name" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Email</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="email" value="{{$adminData->email}}" placeholder="Enter your email" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">Phone Number</label><div class="input-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">+63</span>
                                                    <input type="text" class="form-control" name="phone" placeholder="Enter phone number" value="{{$adminData->phone}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <label  class="col col-form-label">Address</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="address" value="{{$adminData->address}}" placeholder="Your street name and house/apartment number" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Town/City</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="city" placeholder="Enter town/city" value="{{$adminData->city}}" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Zip code</label>
                                                <div class="col-sm">
                                                    <input class="form-control" type="text" name="zip" placeholder="Enter zip code"   value="{{$adminData->zip}}" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">Password</label>
                                                <div class="col">
                                                    <input class="form-control" type="password" id="new_password" name="new_password"  placeholder="Enter your new password" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">Confirm Password</label>
                                                <div class="col-sm">
                                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm your new password" >
                                                </div>
                                            </div>
                                        </div>
                            <div class="mt-3">
                            <button type="submit" class="mt-3 btn btn-info btn-rounded waves-effect waves-light">Save Changes</button>
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
                    email : true,
                }, 
                phone: {
                    required : true,
                    number : true,
                    minlength: {
                        depends: function(element) {
                            return $(element).val().length > 0;
                        },
                        param: 10
                    },
                }, 
                address: {
                    required : true,
                }, 
                city: {
                    required : true,
                }, 
                zip: {
                    required : true,
                    number : true,
                }, 
                new_password: {
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
                        param: "#confirm_password"
                    }
                },
                confirm_password: {
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
                        param: "#new_password"
                    }
                }, 
            },
            messages :{
                new_password: {
                    equalTo : 'The password confirmation does not match.',
                },
                confirm_password: {
                    equalTo : 'New password and confirm password does not match.',
                },
                phone: {
                    minlength : 'Please enter a valid phone number.',
                    number : 'Please enter a valid phone number.',
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