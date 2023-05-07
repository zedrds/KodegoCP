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
                                            <li class="breadcrumb-item">Owners</li>
                                            <li class="breadcrumb-item active">View all owners</li>
                                        </ol>
                                    </div>
                                    <a href="{{route('add.condo_owner')}}" class="btn btn-info waves-effect waves-light">Add owner</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-8">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Total owners: {{count($owners)}}</h4>
                                        
        
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                            <tr role="row">
                                            <th>#</th>
                                            <th># of Units Owned</th>
                                                <th>Owner name</th>    
                                                    
                                                
                                                <th style="width: 25px;"></th>    
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($owners as $key => $owner)
                                            <tr class="odd">
                                                
                                                <td>{{$key+1}}</td>
                                                <td>{{count($rooms->where('owner_id',$owner->id))}}</td>
                                                <td>{{ucfirst($owner->owner_name)}}</td>
                               
                                                <td class="d-flex justify-content-end"> 
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary rounded-circle dropdown-toggle" style="" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="mdi mdi-dots-horizontal">

                                                            </i> 
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item" href="{{route('edit.condo_owner.name',$owner->owner_slug)}}"><i class="me-2 ri-edit-2-line"></i>Edit name</a>
                                                            <a class="dropdown-item" href="{{route('view.condo_owner',$owner->owner_slug)}}"><i class="me-2 ri-eye-fill"></i></i>View</a>
                                                            
                                                        </div>
                                                    </div>
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