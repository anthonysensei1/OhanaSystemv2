<aside class="main-sidebar sidebar-light-primary elevation-4">
<!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Ohana Resort</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
    <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-header">PAGES</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                        DASHBOARD
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Admin/Pages/Guests/guests')}}" class="nav-link" id="guests">
                    <i class="nav-icon fas fa-users"></i>
                        <p>
                        GUESTS
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="open_manage_bookings">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            MANAGE BOOKINGS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                        <a href="{{route('/Admin/Pages/Bookings/pending_bookings')}}" class="nav-link" id="pending">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Pending Bookings</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{route('/Admin/Pages/Bookings/confirmed_bookings')}}" class="nav-link" id="confirm">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Confirmed Bookings</p>
                        </a>
                        </li>
                        <li class="nav-item">
                        <a href="{{route('/Admin/Pages/Bookings/cancelled_bookings')}}" class="nav-link" id="cancel">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Cancelled Bookings</p>
                        </a>
                        </li>
                        <hr class="hrColor">
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Admin/Pages/Calendar/calendar')}}" class="nav-link" id="calendar_active">
                    <i class="nav-icon fas fa-calendar"></i>
                        <p>
                        CALENDAR
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="open_manage_rooms">
                    <a href="#" class="nav-link" id="menu">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            MANAGE ROOMS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('/Admin/Pages/Rooms/rooms')}}" class="nav-link" id="rooms">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Rooms</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('/Admin/Pages/Rooms/room_type')}}" class="nav-link" id="room_type">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Room Type</p>
                            </a>
                        </li>
                        <hr class="hrColor">
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Admin/Pages/FunctionHall/function_hall')}}" class="nav-link" id="function_hall">
                    <i class="nav-icon fas fa-users"></i>
                        <p>
                        FUNCTION HALL
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Admin/Pages/UsersAccount/users_account')}}" class="nav-link" id="users_account">
                    <i class="nav-icon fas fa-users"></i>
                        <p>
                        USERS ACCOUNT
                        </p>
                    </a>
                </li>
                <li class="nav-item" id="open_roles_permissions">
                    <a href="#" class="nav-link" id="menu">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            MANAGE ROLES & PERMISSION
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('/Admin/Pages/Roles_and_Permissions/permissions')}}" class="nav-link" id="permissions">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                Permissions
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('/Admin/Pages/Roles_and_Permissions/roles')}}" class="nav-link" id="roles">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                Roles
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions')}}" class="nav-link" id="assign_roles_permissions">
                            <i class="far fa-circle nav-icon"></i>
                                <p>
                                Assign Roles and Permissions
                                </p>
                            </a>
                        </li>
                        <hr class="hrColor">
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{route('/Admin/Pages/Report/report')}}" class="nav-link" id="report">
                    <i class="nav-icon fas fa-users"></i>
                        <p>
                        REPORT
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>