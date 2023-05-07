@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
        <form method="post" id="myForm" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
            @csrf     
            <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">{{$owner->owner_name}}</h4>

                                   

                                </div>
                            </div>
                        </div>
                        <div class="row">
                            
                            <h4 class="my-3">Condo units owned</h4>
                           
                                @forelse($rooms as $room)
                                <div class="col-md-6 col-lg-4">
    
                                    <!-- Simple card -->
                                    <div class="card">
                                        <img class="card-img-top img-fluid" src="{{asset($room->room_image)}}" alt="Card image cap">
                                        <div class="card-body">
                                            <h4 class="card-title">{{$room->room_title}}</h4>

                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <a href="{{route('edit.room',$room->id)}}" class="card-link">Edit</a>
                                                    <a href="{{route('view.room',$room->id)}}" class="card-link">View</a>
                                                </div>
                                                
                                                    @if($room->status == 1)
                                                        <small class="text-success">Available</small>   
                                                    @else
                                                        <small class="text-danger">Reserved</small>
                                                    @endif

                                            </div>
                                            
                                        </div>
                                    </div>
            
                                </div>
                                @empty
                                <div class="d-flex justify-content-center">
                                <h1>No condo units owned</h1>
                            </div>
                                @endforelse
                      
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