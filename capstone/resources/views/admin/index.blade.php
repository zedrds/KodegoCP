@extends('admin.admin_master')
@section('admin')

<div class="page-content">
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Dashboard</h4>

                       

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Total Income</p>
                                                <h4 class="mb-2">₱{{number_format($total_income,2,'.',',')}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-success rounded-3">
                                                    <i class="mdi mdi-cash-multiple font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                            
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Pending Payments</p>
                                                <h4 class="mb-2">{{$pending_payments}}</h4>
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-warning rounded-3">
                                                    <i class="mdi mdi-clock-alert font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Users</p>
                                                <h4 class="mb-2">{{count($users)}}</h4>
                                                
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-primary rounded-3">
                                                    <i class="ri-user-3-line font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                            <div class="col-xl-3 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div class="flex-grow-1">
                                                <p class="text-truncate font-size-14 mb-2">Ongoing Reservations</p>
                                                <h4 class="mb-2">{{count($rooms)}}</h4>
                                                
                                            </div>
                                            <div class="avatar-sm">
                                                <span class="avatar-title bg-light text-danger rounded-3">
                                                    <i class="mdi mdi-calendar-clock font-size-24"></i>  
                                                </span>
                                            </div>
                                        </div>                                              
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->

    
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Latest Payment Transactions</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Reservation #</th>
                                                        <th>Status</th>
                                                        <th>Reference #</th>
                                                        <th>Payment Method</th>
                                                        <th>Amount</th>
                                                        <th></th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    @foreach($payment_transactions as $transaction)
                                                    <tr>
                                                        <td><h6 class="mb-0">{{is_numeric($transaction->guest_name) ? $users->where('id',$transaction->guest_name)->first()->first_name.' '.$users->where('id',$transaction->guest_name)->first()->last_name :  $transaction->guest_name}}</h6></td>
                                                        <td>{{$transaction->reservation_ref_no}}</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 @if($transaction->status == 'failed') text-danger @elseif($transaction->status == 'completed') text-success @endif  align-middle me-2"></i>{{$transaction->status}}</div>
                                                        </td>
                                                        <td>
                                                           {{$transaction->transaction_ref_no}}
                                                        </td>
                                                        <td>
                                                            {{ucfirst($transaction->payment_method)}}
                                                        </td>
                                                        <td>₱{{number_format($transaction->amount,2,'.',',')}}</td>
                                                        <td><a href="{{route('view.payment',$transaction->id)}}" class="text-dark">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            
                        </div>
                        <!-- end row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title mb-4">Latest Reservations</h4>
    
                                        <div class="table-responsive">
                                            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Name</th>
                                                        <th>Reservation #</th>
                                                        <th>Status</th>
                                                        <th>Unit</th>
                                                        <th>Date Created</th>
                                                        <th>Total Cost</th>
                                                        <th></th>
                                                    </tr>
                                                </thead><!-- end thead -->
                                                <tbody>
                                                    @foreach($reservations as $transaction)
                                                    <tr>
                                                        <td><h6 class="mb-0">{{is_numeric($transaction->guest_name) ? $users->where('id',$transaction->guest_name)->first()->first_name.' '.$users->where('id',$transaction->guest_name)->first()->last_name :  $transaction->guest_name}}</h6></td>
                                                        <td>{{$transaction->reference_no}}</td>
                                                        <td>
                                                            <div class="font-size-13"><i class="ri-checkbox-blank-circle-fill font-size-10 @if($transaction->status == 'confirmed') text-warning @elseif($transaction->status == 'cancelled') text-danger  @elseif($transaction->status == 'completed') text-success @endif  align-middle me-2"></i>{{$transaction->status}}</div>
                                                        </td>
                                                        <td>
                                                           {{$room->where('id',$transaction->room_id)->first()->room_title}}
                                                        </td>
                                                        <td>
                                                        {{date_format($transaction->created_at,'F j, Y g:i A')}}
                                                        </td>
                                                        <td>₱{{number_format($transaction->total_cost,2,'.',',')}}</td>
                                                        <td><a href="{{route('view.reservation',$transaction->id)}}" class="text-dark">View</a></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody><!-- end tbody -->
                                            </table> <!-- end table -->
                                        </div>
                                    </div><!-- end card -->
                                </div><!-- end card -->
                            </div>
                            <!-- end col -->
                            
                        </div>
                        <!-- end row -->
                    </div>
                    
                </div>


@endsection