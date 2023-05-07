@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <div class="page-content">
        <div class="container-fluid">
        <form method="post" id="myForm" action="{{ route('store.condo_owner') }}" enctype="multipart/form-data">
            @csrf
  
            <div class="row">
                <div class="col-6 col-md-5">
                        <div class="card">
                            <h5 class="card-header">Add condo owner</h5>
                            <div class="card-body">
                                <h5 class="card-title">Condo Owner name</h5>
                                <input class="form-control mb-3" name="owner_name" type="text" >
                                <button type="submit" class="btn btn-primary">Add owner</button>
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