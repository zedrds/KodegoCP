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
                                <div class="page-title-box">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Reservations</li>
                                            <li class="breadcrumb-item active">Create new reservation</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
        <form method="post" id="myForm" action="{{ route('store.payment') }}">
            @csrf     
            <div class="row">
                
                <div class="col-12 col-md-10">
                    <div class="card">
                        
                        <div class="card-body">
                        <h3 class="mb-3"><strong>Pay a reservation</strong></h3>
                    
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                
                                                    <label  class="col-form-label">Guest Name</label>
                                                
                                                <div class="col-sm">
                                                <select class="form-select" name="guest_name" id="guest_name">
                                                    <option selected disabled></option>
                                                    @php
                                                        $added_names = [];
                                                        $guest_name = '';
                                                    @endphp
                                                    @foreach($reservations as $reservation)
                                                        @php
                                                        if($reservation->status == 'pending') {
                                                            if (is_numeric($reservation->guest_name)) {
                                                                $guest = App\Models\User::find($reservation->guest_name);
                                                                if ($guest) {
                                                                    $guest_name = $guest->first_name.' '.$guest->last_name;
                                                                } else {
                                                                    $guest_name = '';
                                                                }
                                                            } else {
                                                            $guest_name = $reservation->guest_name;
                                                            }
                                                        }
                                                        @endphp
                                                        @if(!in_array($guest_name, $added_names) && $guest_name !== '')
                                                            <option value="{{ $guest->id ?? $guest_name }}">{{ $guest_name }}</option>
                                                            @php
                                                                $added_names[] = $guest_name;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                
                                                <label  class="col-form-label">Reservation Ref. #</label>
                                                <div class="col-sm">
                                                    <select class="form-select" name="reservation_ref_no" id="reservation_ref_no" >
                                                        <option selected="" disabled></option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 d-flex">
                                                <div class="col-6 pe-1">
                                                    <label class="col-form-label">Payment Method</label>
                                                    <div class="col-sm">
                                                        <select class="form-select" name="payment_method" id="payment_method" >
                                                            <option selected="" disabled></option>
                                                            <option value="gcash">GCash</option>
                                                            <option value="bank">Bank</option>
                                                            <option value="maya">Maya</option>
                                                            <option value="cash">Cash</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-6 ps-1">
                                                    <label class="col-form-label">Amount</label>
                                                    <div class="col-sm">
                                                        <input type="number" class="form-control" name="amount" id="amount">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <label class="col-form-label">Payment Ref. #</label>
                                                <div class="col-sm">
                                                    <input type="text" class="form-control" name="transaction_ref_no" id="transaction_ref_no">
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <label class="col-form-label">Notes</label>
                                                <div class="col-sm">
                                                    <textarea class="form-control" name="notes" rows="5"></textarea>
                                                </div>
                                            </div>
                                            
                                            
                                        </div>
                                     
                            <div class="mt-3">
                            <button type="submit" class="mt-3 btn btn-info btn-rounded waves-effect waves-light">Pay reservation</button>
                            </div>
                       
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>


<script>
    $(document).ready(function(){
        $('select[name="payment_method"]').on('change', function() {
            if ($('select[name="payment_method"]').val() == 'cash') {
                $('#transaction_ref_no').val('').prop('disabled', true); 
            } else {
                $('#transaction_ref_no').prop('disabled', false); 
            }
        });
    });
</script>



<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="guest_name"]').on('change',function(){
            let guest_name = $(this).val();
            if(guest_name){
                $.ajax({
                    url: " {{ url('/admin/reservations/get-payor/ajax') }}/"+guest_name,
                    type: "GET",
                    dataType: "json",
                    success:function(data){
                        $('select[name="reservation_ref_no"]').html('');
                        let d = $('select[name="reservation_ref_no"]').empty();
                        $('select[name="reservation_ref_no"]').append('<option selected disabled></option>');
                        $.each(data,function(key,value){
                            if(value.status == 'pending'){
                                $('select[name="reservation_ref_no"]').append('<option value="'+value.reference_no +'" >'+ value.reference_no + '</option>');
                            }                                
                        });
                    }
                })
            }
        })
    })
</script>



<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                guest_name: {
                    required : true,
                }, 
                reservation_ref_no: {
                    required : true,
                }, 
                payment_method: {
                    required : true,
                }, 
                amount: {
                    required : true,
                }, 
                transaction_ref_no: {
                    required : {
                        depends: function(element) {
                            return $('#payment_method').val() !== 'cash';
                        },
                    },
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