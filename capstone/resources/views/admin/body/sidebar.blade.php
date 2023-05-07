<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

<div data-simplebar class="h-100">

    <!--- Sidemenu -->
    <div id="sidebar-menu">
        <!-- Left Menu Start -->
        <ul class="metismenu list-unstyled" id="side-menu">
            <li class="menu-title">Menu</li>

            <li>
                <a href="{{route('admin.dashboard')}}" class="waves-effect">
                    <i class="ri-dashboard-line"></i>
                    <span>Dashboard</span>
                </a>
            </li>


            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-pool"></i>
                    <span>Amenities</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('view.amenities')}}">View all amenities</a></li>
                    <li><a href="{{route('add.amenity')}}">Add amenity</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-home-city"></i>
                    <span>Features</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('view.features')}}">View all features</a></li>
                    <li><a href="{{route('add.feature')}}">Add a feature</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-bed"></i>
                    <span>Units</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.units')}}">View all unit types</a></li>
                    <li><a href="{{route('all.rooms')}}">View all units</a></li>
                    <li><a href="{{route('all.type.units','studio')}}">Studio units</a></li>
                    <li><a href="{{route('all.type.units','cozy')}}">Cozy units</a></li>
                    <li><a href="{{route('all.type.units','luxury')}}">Luxury units</a></li>
                    <li><a href="{{route('all.type.units','vip')}}">VIP units</a></li>
                    <li><a href="{{route('add.room')}}">Add a unit</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-handshake"></i>
                    <span>Condo owners</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('view.condo_owners')}}">View all owners</a></li>
                    <li><a href="{{route('add.condo_owner')}}">Add condo owner</a></li>
                </ul>
            </li> 
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                <i class="mdi mdi-calendar-account"></i>
                    <span>Reservations</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.reservations')}}">View all reservations</a></li>
                    <li><a href="{{route('add.reservation')}}">Add a reservation</a></li>
                </ul>
            </li>
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-cash"></i>
                    <span>Payments</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.payments')}}">View all payments</a></li>
                    <li><a href="{{route('make.payment')}}">Pay reservation</a></li>
                </ul>
            </li>  
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-account-multiple"></i>
                    <span>Guests</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('all.users')}}">View all guests</a></li>
                    <li><a href="{{route('add.user')}}">Create new guest</a></li>
                </ul>
            </li> 
            <li>
                <a href="javascript: void(0);" class="has-arrow waves-effect">
                    <i class="mdi mdi-web"></i>
                    <span>Webpage</span>
                </a>
                <ul class="sub-menu" aria-expanded="false">
                    <li><a href="{{route('edit.homepage')}}">Edit homepage</a></li>
                </ul>
            </li>           

        </ul>
    </div>
    <!-- Sidebar -->
</div>
</div>
<!-- Left Sidebar End -->