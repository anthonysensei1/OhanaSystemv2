<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('/images/ohana.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-dark">Ohana Resort</span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                    with font-awesome or any other icon font library -->
                <li class="nav-header">PAGES</li>
                <?php
                    $permissions = app()->call(Route::getRoutes()->getByName('get_all_permission')->getAction()['controller']);
                    $getbadges = app()->call(Route::getRoutes()->getByName('get_badges_bookings')->getAction()['controller']);
                ?>
                @foreach ($permissions as $permission)
                @if (empty($permission['sub_permission']))
                <li class="nav-item">
                    <a href="{{ $permission['permission_path'] == '#' ? '#' : route($permission['permission_path']) }}"
                        class="nav-link" id="{{ $permission['permission_id'] }}">
                        <i class="nav-icon fas {{ $permission['icon'] }}"></i>
                        <p>
                            {{ $permission['permission'] }}
                        </p>
                    </a>
                </li>
                @else
                <li class="nav-item" id="{{ $permission['permission_id'] }}">
                    <a href="{{ $permission['permission_path'] == '#' ? '#' : route($permission['permission_path']) }}"
                        class="nav-link">
                        <i class="nav-icon fas {{ $permission['icon'] }}"></i>
                        <p>
                            @if ($permission['permission'] == 'MANAGE BOOKINGS')
                            <span class="badge badge-warning right">{{ $getbadges }}</span>
                            @endif
                            {{ $permission['permission'] }}
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @php
                        $arr_sub_permission = explode(",", $permission['sub_permission']);
                        $arr_sub_permission_path = explode(",", $permission['sub_permission_path']);
                        $arr_sub_permission_id = explode(",", $permission['sub_permission_id']);
                        $counter = 0;
                        @endphp
                        @foreach ($arr_sub_permission as $sub_permission)
                        <li class="nav-item">
                            <a href="{{ route($arr_sub_permission_path[$counter]) }}" class="nav-link"
                                id="{{ $arr_sub_permission_id[$counter] }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>{{ $sub_permission }}</p>
                                @if ($sub_permission == 'Pending Bookings')
                                <span class="badge badge-light right">{{ $getbadges }}</span>
                                @endif
                            </a>
                        </li>
                        @php
                        $counter++;
                        @endphp
                        @endforeach
                        <hr class="hrColor">
                    </ul>
                </li>
                @endif
                @endforeach
                <li class="nav-item">
                    <a href="/mails-logs" class="nav-link" id="mails">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Mail Logs
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>