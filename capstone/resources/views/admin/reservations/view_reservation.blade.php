@extends('admin.admin_master')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Reservations</a></li>
                                            <li class="breadcrumb-item active">View Reservation</li>
                                        </ol>
                                    </div>
                                    @if($reservation->status !== 'pending')
                                    <div class="btn-group-sm">
                                        <button type="button" class="btn btn-secondary rounded-circle dropdown-toggle" style="" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i> </button>
                                        
                                        <div class="dropdown-menu">
                                            
                                            <a class="dropdown-item" href="{{ url('/admin/reservation/status/update/' . $reservation->id . '?status=cancelled') }}"><i class="me-2 ri-edit-2-line"></i>Mark as cancelled</a>
                                            <a class="dropdown-item" href="{{ url('/admin/reservation/status/update/' . $reservation->id . '?status=pending') }}"><i class="me-2 ri-edit-2-line"></i>Mark as pending</a>
                                            <a class="dropdown-item" href="{{ url('/admin/reservation/status/update/' . $reservation->id . '?status=completed') }}"><i class="me-2 ri-edit-2-line"></i>Mark as completed</a>
                                            
                                        </div>
                                        
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="invoice-title">
                                                    <h4 class="float-end font-size-16"><strong>Status: 
                                                        @if($reservation->status == 'confirmed')
                                                        <span class="badge rounded-pill bg-warning">{{$reservation->status}}</span>
                                                        @elseif($reservation->status == 'cancelled')
                                                        <span class="badge rounded-pill bg-danger">{{$reservation->status}}</span>
                                                        @elseif($reservation->status == 'pending')
                                                        <span class="badge rounded-pill bg-info">{{$reservation->status}}</span>
                                                        @elseif($reservation->status == 'completed')
                                                        <span class="badge rounded-pill bg-success">{{$reservation->status}}</span>
                                                        @endif
                                                    </strong></h4>
                                                   
                                                    <h4 class="font-size-16">
                                                            <strong>Reservation Date: </strong>{{ date('F j, Y h:i A', strtotime($reservation->created_at.' UTC+8')) }} 
                                                        </h4>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <address>
                                                        @if(is_numeric($reservation->guest_name))
                                                                {{$users->where('id',$reservation->guest_name)->first()->first_name.' '.$users->where('id',$reservation->guest_name)->first()->last_name}}<br>
                                                                @if($users->where('id',$reservation->guest_name)->first()->phone !== NULL)
                                                                   Phone # {{$users->where('id',$reservation->guest_name)->first()->phone}}<br>
                                                                @endif
                                                                @if($users->where('id',$reservation->guest_name)->first()->address !== NULL)
                                                                   {{$users->where('id',$reservation->guest_name)->first()->address}}<br>
                                                                @endif
                                                                @if($users->where('id',$reservation->guest_name)->first()->city !== NULL)
                                                                   {{$users->where('id',$reservation->guest_name)->first()->city}}
                                                                @endif
                                                                @if($users->where('id',$reservation->guest_name)->first()->zip !== NULL)
                                                                   {{$users->where('id',$reservation->guest_name)->first()->zip}}<br>
                                                                @endif
                                                                
                                                                
                                                            @else
                                                                {{$reservation->guest_name}}<br>
                                                               
                                                            @endif
                                                        </address>
                                                    </div>
                                                    <div class="col-6 text-end">
                                                        <address>
                                                        <h4 class="float-end font-size-16"><strong>Reservation # {{$reservation->reference_no}}</strong></h4>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
        
                                        <div class="row">
                                            <div class="col-12">
                                                <div>
                                                    <div class="p-2">
                                                        <h3 class="font-size-16"><strong>Reservation summary</strong></h3>
                                                    </div>
                                                    <div class="">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                <tr>
                                                                    <td><strong>Unit name</strong></td>
                                                                    <td class="text-center"><strong>Days</strong></td>
                                                                    <td class="text-center"><strong>Price</strong></td>
                                                                    <td class="text-center"><strong>Guests</strong>
                                                                    </td>
                                                                    <td class="text-end"><strong>Totals</strong></td>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <!-- foreach ($order->lineItems as $line) or some such thing here -->
                                                                <tr>
                                                                @php 
                                                                    $checkIn = Illuminate\Support\Carbon::parse($reservation->check_in);
                                                                    $checkOut = Illuminate\Support\Carbon::parse($reservation->check_out);
                                                                    $numNights = $checkIn->diffInDays($checkOut);
                                                                    $total_cost = $rooms->where('id',$reservation->room_id)->first()->room_price*$reservation->guests*$numNights;
                                                                    $array_total = [];
                                                                    $total_amount = 0;
                                                                    if(count($payments) > 0){                                                                 
                                                                        foreach($payments as $payment){
                                                                            if($payment->reservation_ref_no == $reservation->reference_no) {
                                                                                if($payment->status == 'completed'){
                                                                                    $payment_curr = $payment->amount;
                                                                                    $array_total[] = $payment_curr;
                                                                                    $total_amount += $payment_curr;
                                                                                }
                                                                                
                                                                            }
                                                                        }
                                                                    }
                                                                        
                                                                @endphp
                                                                <td>{{$rooms->where('id',$reservation->room_id)->first()->room_title}}</td>
                                                                    <td class="text-center">{{$numNights}} day(s)</td>
                                                                    <td class="text-center">{{'₱'.number_format($rooms->where('id',$reservation->room_id)->first()->room_price,2,'.',',')}}</td>
                                                                    <td class="text-center">{{$reservation->guests}}</td>
                                                                    <td class="text-end">{{'₱'.number_format($total_cost,2,'.',',')}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line"></td>
                                                                    <td class="thick-line text-center">
                                                                        <strong>Amount paid</strong></td>
                                                                    <td class="thick-line text-end">{{'- ₱'.number_format($total_amount,2,'.',',')}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line"></td>
                                                                    <td class="no-line text-center">
                                                                        <strong>Total</strong></td>
                                                                    <td class="no-line text-end"><h4 class="m-0">{{'₱'.number_format($total_cost - $total_amount,2,'.',',' )}}</h4></td>
                                                                </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
        
                                                        <div class="d-print-none">
                                                            <div class="float-end">
                                                                @if($reservation->status == 'pending')
                                                                    <a href="{{ url('/admin/reservation/status/update/' . $reservation->id . '?status=confirmed') }}" id="confirm_reservation" class="btn btn-sm btn-success waves-effect waves-light ms-2">Confirm reservation</a>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
        
                                            </div>
                                        </div> <!-- end row -->
        
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