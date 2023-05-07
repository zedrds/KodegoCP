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
                                            <li class="breadcrumb-item">Units</li>
                                            <li class="breadcrumb-item active">{{ucfirst($unit_type).' units'}}</li>
                                            @if(count($rooms) > 0)
                                            <span class="ms-1 d-flex align-items-center badge rounded-pill bg-primary float-end">{{count($rooms)}}</span>
                                            @else
                                            <span class="ms-1 d-flex align-items-center badge rounded-pill bg-danger float-end">{{count($rooms)}}</span>
                                            @endif
                                        </ol>
                                    </div>
                                    <a href="{{route('add.room')}}" class="btn btn-info waves-effect waves-light"><i class="ri-add-line me-1"></i>Add a unit</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            @forelse($rooms as $room)
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset($room->room_image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title">{{$room->room_title}}</h4>
                                            <a href="{{route('view.room',$room->id)}}" class="btn btn-info btn-sm waves-effect waves-light">View</a>
                                        </div>                                        
                                        <div>
                                            <small class="d-flex">
                                                @if($room->status == 1)
                                                    <span class="badge rounded-pill bg-success d-flex align-items-center">Available</span>
                                                @else
                                                    <span class="badge rounded-pill bg-danger d-flex align-items-center">Reserved</span>
                                                @endif
                                            </small>
                                            
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="d-flex justify-content-center">
                                <h1>No available room</h1>
                            </div>
                            @endforelse

                            
        
                        </div>
                        
                    </div> <!-- container-fluid -->
                </div>
@endsection