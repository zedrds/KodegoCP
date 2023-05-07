@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
        <form method="post" id="myForm" action="{{ route('update.condo_owner.name') }}" enctype="multipart/form-data">
            @csrf
        <input type="hidden" name="id" value="{{$owner->id}}"/>
            <div class="row">
                <div class="col-6 col-md-5">
                        <div class="card">
                            <h5 class="card-header">Edit condo owner name</h5>
                            <div class="card-body">
                                <h5 class="card-title">Condo Owner name</h5>
                                <input class="form-control mb-3" value="{{$owner->owner_name}}" name="owner_name" type="text">
                                <button type="submit" class="btn btn-primary">Update owner name</button>
                            </div>
                        </div>
                </div>
            </div>
            </form>
        </div>
    </div>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: { 
                owner_name: {
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