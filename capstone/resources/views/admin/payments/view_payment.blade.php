@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Payments</a></li>
                                            <li class="breadcrumb-item active">View payment</li>
                                        </ol>
                                    </div>
                                    @if($payment->status == 'pending')
                                        <a href="{{ url('/admin/payments/update/status/' . $payment->id . '?status=failed') }}" id="mark_failed" class="btn btn-danger btn-sm waves-effect waves-light ms-2">Mark as failed</a>
                                    @else
                                    <div class="btn-group-sm">
                                                    <button type="button" class="btn btn-secondary rounded-circle dropdown-toggle" style="" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{ url('/admin/payments/update/status/' . $payment->id . '?status=failed') }}"><i class="me-2 ri-edit-2-line"></i>Mark as failed</a>
                                                        <a class="dropdown-item" id="" href="#"><i class="me-2 fas fa-trash-alt"></i>Mark as pending</a>
                                                    </div>
                                                </div>
                                    @endif
                                    

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12 col-md-8">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                <h4 class="float-end font-size-16"><strong>Status:</strong> 
                                                @if($payment->status == 'pending')
                                                    <span class="ms-2 badge rounded-pill bg-info float-end">{{$payment->status}}</span>
                                                @elseif($payment->status == 'completed')
                                                    <span class="ms-2 badge rounded-pill bg-success float-end">{{$payment->status}}</span>
                                                @elseif($payment->status == 'failed')
                                                    <span class="ms-2 badge rounded-pill bg-danger float-end">{{$payment->status}}</span>
                                                @endif
                                                </h4>
                                                    
                                                        <h4 class="font-size-16">
                                                            <strong>Payment Date: </strong>{{ date('F j, Y h:i A', strtotime($payment->created_at)) }}
                                                        </h4>
                                                    
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <address>
                                                            <strong>Paid by:</strong><br>
                                                            @if(is_numeric($payment->guest_name))
                                                                {{$users->where('id',$payment->guest_name)->first()->first_name.' '.$users->where('id',$payment->guest_name)->first()->last_name}}<br>
                                                                @if($users->where('id',$payment->guest_name)->first()->phone !== NULL)
                                                                   Phone # {{$users->where('id',$payment->guest_name)->first()->phone}}<br>
                                                                @endif
                                                                <strong>Reservation # {{$payment->reservation_ref_no}}</strong><br>
                                                                
                                                            @else
                                                                {{$payment->guest_name}}<br>
                                                                Reservation # {{$payment->reservation_ref_no}}
                                                            @endif
                                                            
                                                        </address>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <address>
                                                            <strong>Payment Method:</strong><br>
                                                            {{ucfirst($payment->payment_method)}}<br>
                                                            {{'₱'.number_format($payment->amount,2,'.',',')}}<br>
                                                            @if($payment->payment_method !== 'cash')
                                                                <strong>Ref #:</strong> {{$payment->transaction_ref_no}}
                                                            @endif
                                                            
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Payment summary</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Unit name</strong></td>
                                                                    <td class="text-center"><strong>Price</strong></td>
                                                                    <td class="text-center"><strong>Days</strong></td>
                                                                    <td class="text-center"><strong>Guests</strong>
                                                                    </td>
                                                                    <td class="text-end"><strong>Total</strong></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                @php 
                                                                    $reservation = $reservations->where('reference_no', $payment->reservation_ref_no)->first();
                                                                    $checkIn = Illuminate\Support\Carbon::parse($reservation->check_in);
                                                                    $checkOut = Illuminate\Support\Carbon::parse($reservation->check_out);

                                                                    $numNights = $checkIn->diffInDays($checkOut);
                                                                    $total_cost = $rooms->where('id',$reservations->where('reference_no',$payment->reservation_ref_no)->first()->room_id)->first()->room_price*$reservations->where('reference_no',$payment->reservation_ref_no)->first()->guests*$numNights;
                                                                @endphp
                                                                <tr>
                                                                    <td>{{$rooms->where('id',$reservations->where('reference_no',$payment->reservation_ref_no)->first()->room_id)->first()->room_title}}</td>
                                                                    <td class="text-center">{{'₱'.number_format($rooms->where('id',$reservations->where('reference_no',$payment->reservation_ref_no)->first()->room_id)->first()->room_price, 2, '.', ',')}}</td>
                                                                    <td class="text-center">{{$numNights}} day(s)</td>
                                                                    <td class="text-center">{{$reservations->where('reference_no',$payment->reservation_ref_no)->first()->guests}}</td>
                                                                    <td class="text-end">{{'₱'.number_format($total_cost,2,'.',',')}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line text-center">
                                                                        <strong>Amount Paid</strong></td>
                                                                    <td class="thick-line text-end">{{'- ₱'.number_format($payment->amount,2,'.',',')}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line text-center">
                                                                        <strong>Total</strong></td>
                                                                    
                                                                    <td class="no-line text-end"><h4 class="m-0">{{'₱'.number_format($total_cost - $payment->amount,2,'.',',')}}</h4></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
        
                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                            @if($payment->status == 'pending')
                                                                <a href="{{ url('/admin/payments/update/status/' . $payment->id . '?status=completed') }}" id="confirm_payment" class="btn btn-sm btn-success waves-effect waves-light ms-2">Confirm Payment</a>
                                                            @endif
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div> <!-- end row -->
                                        @if($payment->notes)
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                Notes: {{$payment->notes}}
                                            </div>
                                        </div>
                                        @endif
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
<script>
  $(document).ready(function() {
    $('#guest-count').on('change', function() {
        var price = parseFloat($('#price').html().replace(/[^\d.-]/g, ''));
      var guest = parseInt($('#guest-count').html());
      var total = price * guest;
      $('#total').text('₱' + total.toFixed(2));
    });
  });
</script>
@endsection