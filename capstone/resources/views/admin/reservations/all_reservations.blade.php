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
                                            <li class="breadcrumb-item">Reservations</li>
                                            <li class="breadcrumb-item active">All reservations</li>
                                        </ol>
                                    </div>
                                    <a href="{{route('add.reservation')}}" class="btn btn-info waves-effect waves-light">Add reservation</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Total reservations: {{count($reservations)}}</h4>
                                        
        
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                            <tr role="row">
                                                <th>#</th>    
                                                <th>Reference #</th>    
                                                <th>Guest name</th>    
                                                   
                                                <th>Unit name</th>    
                                                <!-- <th>Current balance</th>     -->
                                                <th>Check-in Date</th>    
                                                <th>Status</th>    
                                                <th></th>    
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($reservations as $key => $reservation)
                                            <tr class="odd">
                                                <td>{{$key+1}}</td>
                                                <td>{{$reservation->reference_no}}</td>
                                                <td>
                                                    @if(is_numeric($reservation->guest_name))
                                                        {{$users->find($reservation->guest_name)->first_name.' '.$users->find($reservation->guest_name)->last_name}}
                                                    @else
                                                        {{$reservation->guest_name}}
                                                    @endif


                                                </td>
                                               
                                                <td>{{$rooms->find($reservation->room_id)->room_title}}</td>
                                                <!-- <td>{{'₱'.number_format($reservation->total_cost,2,'.',',')}}</td> -->
                                                <td>{{ date('F j, Y', strtotime($reservation->check_in)) }}</td>
                                                <td>
                                                    @if($reservation->status == 'pending')
                                                        <span class="badge rounded-pill bg-info">{{$reservation->status}}</span>
                                                    @elseif($reservation->status == 'confirmed')
                                                        <span class="badge rounded-pill bg-warning">{{$reservation->status}}</span>
                                                    @elseif($reservation->status == 'cancelled')
                                                        <span class="badge rounded-pill bg-danger">{{$reservation->status}}</span>
                                                    @elseif($reservation->status == 'completed')
                                                        <span class="badge rounded-pill bg-success">{{$reservation->status}}</span>
                                                    @endif
                                                
                                                </td>
                                                
                                                <td> 
                                                <a class="dropdown-item" href="{{route('view.reservation',$reservation->id)}}"><i class="me-2 mdi mdi-eye-settings"></i>View</a>
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