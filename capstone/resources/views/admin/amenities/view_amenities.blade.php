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
                                            <li class="breadcrumb-item">Manage amenities</li>
                                            <li class="breadcrumb-item active">All amenities</li>
                                        </ol>
                                    </div>
                                    <a href="{{route('add.amenity')}}" class="btn btn-info waves-effect waves-light">Add amenity</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            
                                
                               
                                    @forelse($amenities as $amenity)
                                    <div class="col-md-6 col-xl-3">
        
                                <!-- Simple card -->
                                <div class="card">
                                    <img class="card-img-top img-fluid" src="{{asset($amenity->amenity_image)}}" alt="Card image cap">
                                    <div class="card-body d-flex justify-content-between">
                                        <h4 class="card-title">{{$amenity->amenity_name}}</h4>

                                        <div class="d-flex">
                                            <a href="{{route('edit.amenity',$amenity->id)}}" class="card-link">Edit</a>
                                            <a id="delete_amenity" href="{{route('delete.amenity',$amenity->id)}}" class="card-link text-danger">Delete</a>
                                        </div>
                                        
                                    </div>
                                </div>
        
                            </div>
                                    @empty
                                    @endforelse
                          
                        </div>
                        
                    </div> <!-- container-fluid -->
                </div>
@endsection