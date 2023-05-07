<header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box d-flex justify-content-center align-items-center">
                        <a href="{{route('admin.dashboard')}}" class="m-0 d-flex align-items-center"><img src="{{asset('frontend/assets/img/logo.png')}}" class="rounded-circle" alt="logo-sm" style="width:50px">
                        <h3 class="d-none d-lg-block text-white ms-2 my-0">Unwind</h3>
                        </a>
                        </div>

                        <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                            <i class="ri-menu-2-line align-middle"></i>
                        </button>


                        
                    </div>

                    <div class="d-flex">



                        <div class="dropdown d-none d-lg-inline-block ms-1">
                            <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                                <i class="ri-fullscreen-line"></i>
                            </button>
                        </div>

                        
                        @php
                            $id = Illuminate\Support\Facades\Auth::user()->id;
                            $adminData = App\Models\User::find($id);
                        @endphp
                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user" src="{{ (!empty($adminData->profile_pic)) ? url($adminData->profile_pic) : url('upload/default.jpg') }}"
                                    alt="Header Avatar">
                                <span class="d-none d-xl-inline-block ms-1">{{ $adminData->name }}</span>
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{route('admin.profile')}}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item text-danger" href="{{route('admin.logout')}}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

            
                    </div>
                </div>
            </header>