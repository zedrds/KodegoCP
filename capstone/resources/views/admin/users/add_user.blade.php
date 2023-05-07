@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Manage Users</li>
                                            <li class="breadcrumb-item active">Create new user</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
        <form method="post" id="myForm" action="{{ route('store.user') }}" enctype="multipart/form-data">
            @csrf     
            <div class="row">
                
                <div class="col-md-8">
                    <div class="card">
                        
                        <div class="card-body">
                        <h3 class="mb-3"><strong>Create new user</strong></h3>
                    
                                        <div class="row">
                                            <div class="col-12 col-md-6 ">
                                                <label  class="col col-form-label">First Name</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="first_name"  placeholder="Enter first name" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <label  class="col col-form-label">Last name</label>
                                                <div class="col-sm">
                                                    <input class="form-control" type="text" name="last_name"  placeholder="Enter last name" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 ">
                                                <label  class="col col-form-label">Email</label>
                                                <div class="col">
                                                    <input class="form-control" type="text" name="email"  placeholder="Enter email" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label  class="col col-form-label">Username</label><div class="input-group">
                                                <div class="input-group">
                                                    <span class="input-group-text" id="basic-addon1">@</span>
                                                    <input type="text" class="form-control" name="username" placeholder="Enter username" >
                                                </div>
                                            </div>
                                        </div>
                                     
                                        <div class="row">
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">Password</label>
                                                <div class="col">
                                                    <input class="form-control" type="password" id="password" name="password"  placeholder="Enter password" >
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 validate">
                                                <label  class="col col-form-label">Confirm Password</label>
                                                <div class="col-sm">
                                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="Confirm password" >
                                                </div>
                                            </div>
                                        </div>
                            <div class="mt-3">
                            <button type="submit" class="mt-3 btn btn-info btn-rounded waves-effect waves-light">Create User</button>
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
                username: {
                    required : true,
                    minlength: {
                        depends: function(element) {
                            return $(element).val().length > 0;
                        },
                        param: 5
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
                password: {
                    required: true,
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
                    required: true,
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
            messages :{
                password: {
                    equalTo : 'The password confirmation does not match.',
                },
                confirm_password: {
                    equalTo : 'Password and confirm password does not match.',
                },
                zip: {
                    number : 'Please enter a valid zip code.',
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