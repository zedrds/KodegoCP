@extends('admin.admin_master')
@section('admin')
<div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item">Payments</li>
                                            <li class="breadcrumb-item active">All payments</li>
                                        </ol>
                                    </div>
                                    <a href="{{route('add.reservation')}}" class="btn btn-info waves-effect waves-light">Add payment</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Total payments: {{count($payments)}}</h4>
                                        
        
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                            <tr role="row">
                                                <th>#</th>    
                                                <th>Reference #</th>    
                                                <th>Guest Name</th>
                                                
                                                <th>Payment Method</th>    
                                                <th>Amount</th>    
                                                <th>Transaction Ref. #</th>
                                                <th>Status</th>    
                                                <th></th>    
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($payments as $key => $payment)
                                            <tr class="odd">
                                                <td>{{$key+1}}</td>
                                                <td>{{$payment->reservation_ref_no}}</td>
                                                <td>
                                                    @if(is_numeric($payment->guest_name))
                                                        {{$users->find($payment->guest_name)->first_name.' '.$users->find($payment->guest_name)->last_name}}
                                                    @else
                                                        {{$payment->guest_name}}
                                                    @endif

                                                </td>
                                                
                                                <td>{{ucfirst($payment->payment_method)}}</td>
                                                <td>{{'₱'.number_format($payment->amount,2,'.',',')}}</td>
                                                <td>{{$payment->transaction_ref_no}}</td>
                                                <td>
                                                    @if($payment->status == 'pending')
                                                        <span class="badge rounded-pill bg-info">{{$payment->status}}</span>
                                                    @elseif($payment->status == 'completed')
                                                        <span class="badge rounded-pill bg-success">{{$payment->status}}</span>
                                                    @elseif($payment->status == 'failed')
                                                        <span class="badge rounded-pill bg-danger">{{$payment->status}}</span>
                                                    @endif
                                                
                                                </td>
                                                
                                                <td>
                                                <a class="dropdown-item" href="{{route('view.payment',$payment->id)}}"><i class="me-2 mdi mdi-eye-settings"></i>View</a>
                                               
                                            </td>
                                            </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        
                    </div> <!-- container-fluid -->
                </div>
@endsection