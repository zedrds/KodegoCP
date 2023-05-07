@extends('client.master_client')
@section('client')


@php
  $room = App\Models\Room::where('id',$reservation->room_id)->first();
@endphp

<div class="book-cover d-flex align-items-center justify-content-center" style="background-image: linear-gradient(rgba(0, 0, 0, 0.4), rgba(0, 0, 0, 0.4)), url({{asset('frontend/assets/img/hero.jpg')}});">
      <h1 class="text-white text-uppercase">Receipt</h1>
    </div>

      <div class="container d-flex justify-content-center my-5 p-3 paymentContainer flex-wrap">

 
<div class="col-12 col-lg-7 border p-4">
  <div class="alert alert-success d-flex align-items-center" role="alert">
    <div>
      Your booking has been submitted successfully. Please note that your reservation is subject to availability and we will confirm your reservation within 24 hours after we have confirmed your payment.
    </div>
  </div>
  <img class="m-auto d-flex rounded" src="{{asset('frontend/assets/img/UNWINDLOGO.png')}}" style="width:100px; height:100px"/>
  <h4 class="text-center mb-4"><strong>BOOKING RECEIPT</strong></h4>
  <div class="d-flex">
    <label for="" class="col-6">Reservation #:</label>
    <p style="font-weight: 600;">{{$payment->reservation_ref_no}}</p> 
  </div>
  <div class="d-flex">
    <label for="" class="col-6">Full name:</label>
    <p style="font-weight: 600;">{{$user->first_name.' '.$user->last_name}}</p>
  </div>
  <div class="d-flex">
    <label for="" class="col-6">Email:</label>
    <p style="font-weight: 600;">{{$user->email}}</p>
  </div>
  <div class="d-flex">
    <label for="" class="col-6">Unit:</label>
    <p style="font-weight: 600;">{{$room->room_title}}</p>
  </div>
  <div class="d-flex">
    <label for="" class="col-6">Payment thru:</label>
    <p style="font-weight: 600;">{{ucfirst($payment->payment_method)}}</p>
  </div>
  @if($payment->transaction_ref_no)
  <div class="d-flex">
    <label for="" class="col-6">Reference #:</label>
  <p style="font-weight: 600;">{{$payment->transaction_ref_no}}</p>
  </div>
  @endif
  
  <div class="d-flex">
    <label for="" class="col-6">Total Price:</label>
  <p style="font-weight: 600;">₱{{number_format($payment->amount,2,'.',',')}}</p>
  </div>
  <div class="d-flex">
    <label for="" class="col-6">Notes:</label>
    <p style="font-weight: 600;">{{$payment->notes}}</p>
  </div>
  
  
  
  
  

<a href="{{route('home')}}"  class="btn btn-dark mt-4 w-100">Continue</a>
</div>
        
      
      </div>
   
@endsection