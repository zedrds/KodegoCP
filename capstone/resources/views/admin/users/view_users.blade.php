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
                                            <li class="breadcrumb-item">Manage Users</li>
                                            <li class="breadcrumb-item active">All Users</li>
                                        </ol>
                                    </div>
                                    <a href="{{route('add.user')}}" class="btn btn-info waves-effect waves-light">Add User</a>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Total users: {{count($users)}}</h4>
                                        
        
                                        <div id="datatable-buttons_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                  
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable-buttons_info">
                                            <thead>
                                            <tr role="row">
                                                <th>Name</th>    
                                                <th>Username</th>    
                                                <th>Email</th>    
                                                <th>Created On</th>    
                                                <th></th>    
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            @foreach($users as $key => $user)
                                            <tr class="odd">
                                                <td><img src="{{ (!empty($user->profile_pic)) ? url($user->profile_pic) : url('upload/default.jpg')}}" class="rounded-circle me-2" style="width:35px"/>{{ ucfirst($user->first_name).' '.ucfirst($user->last_name)}}</td>
                                                <td>{{$user->username}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{ Carbon\Carbon::parse($user->created_at)->format('d M Y')}}</td>
                                                <td> 
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-secondary rounded-circle dropdown-toggle" style="" data-bs-toggle="dropdown" aria-expanded="false"><i class="mdi mdi-dots-horizontal"></i> </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="{{route('edit.user',$user->id)}}"><i class="me-2 ri-edit-2-line"></i>Edit</a>
                                                        <a class="dropdown-item" id="delete_user" href="{{route('delete.user',$user->id)}}"><i class="me-2 fas fa-trash-alt"></i>Delete</a>
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