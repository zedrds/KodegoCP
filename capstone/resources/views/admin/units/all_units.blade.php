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
                                            <li class="breadcrumb-item active">View all units</li>
                                        </ol>
                                    </div>
                                    <a href="{{route('add.room')}}" class="btn btn-info waves-effect waves-light"><i class="ri-add-line me-1"></i>Add a unit</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            @forelse($unit_types as $unit_type)
                            <div class="col-lg-4">
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset($unit_type->unit_image)}}" alt="Card image cap">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center justify-content-between">
                                            <h4 class="card-title">{{$unit_type->unit_name}}</h4>
                                            <div class="d-flex">
                                            <a href="{{route('edit.type.units',$unit_type->unit_slug)}}" class="me-2 btn btn-warning btn-sm waves-effect waves-light">Edit</a>
                                            <a href="{{route('all.type.units',$unit_type->unit_slug)}}" class="btn btn-info btn-sm waves-effect waves-light">View</a>
                                            </div>
                                        </div>                                        
                                        <div>
                                            <small class="d-flex">
                                                <p class="mb-0 text-success me-2">Available: {{$rooms->where('unit_type', $unit_type->unit_slug)->count() > 0 ? $rooms->where('unit_type', $unit_type->unit_slug)->where('status',1)->count() : '0'}}</p>
                                                <p class="mb-0 text-danger">Reserved: {{$rooms->where('unit_type', $unit_type->unit_slug)->count() > 0 ? $rooms->where('unit_type', $unit_type->unit_slug)->where('status',0)->count() : '0'}}</p>
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