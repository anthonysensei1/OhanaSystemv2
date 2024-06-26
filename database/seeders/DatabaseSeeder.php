<?php

namespace Database\Seeders;

use App\Models\AssignPermissionAndRole;
use App\Models\Permission;
use App\Models\Role;
use App\Models\SuperUser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Permission::factory()->create([
            'icon' => 'fa-tachometer-alt',
            'permission_id' => 'dashboard',
            'permission' => 'DASHBOARD',
            'sub_permission_id' => '',
            'sub_permission' => '',
            'permission_path' => '/Admin/Pages/Dashboard/dashboard', 
            'sub_permission_path' => ''
        ]);

        Permission::factory()->create([
            'icon' => 'fa-users',
            'permission_id' => 'guests',
            'permission' => 'GUESTS',
            'sub_permission_id' => '',
            'sub_permission' => '',
            'permission_path' => '/Admin/Pages/Guests/guests',
            'sub_permission_path' => ''
        ]);

        Permission::factory()->create([
            'icon' => 'fa-envelope',
            'permission_id' => 'open_manage_bookings',
            'permission' => 'MANAGE BOOKINGS',
            'sub_permission_id' => 'pending,confirm,cancel',
            'sub_permission' => 'Pending Bookings, Confirmed Bookings, Cancelled Bookings',
            'permission_path' => '#', 'sub_permission_path' => '/Admin/Pages/Bookings/pending_bookings,/Admin/Pages/Bookings/confirmed_bookings,/Admin/Pages/Bookings/cancelled_bookings'
        ]);

        Permission::factory()->create([
            'icon' => 'fa-calendar',
            'permission_id' => 'calendar_active',
            'permission' => 'CALENDAR',
            'sub_permission_id' => '',
            'sub_permission' => '',
            'permission_path' => '/Admin/Pages/Calendar/calendar',
            'sub_permission_path' => ''
        ]);

        Permission::factory()->create([
            'icon' => 'fa-box', 
            'permission_id' => 'open_manage_rooms',
            'permission' => 'MANAGE ROOMS', 
            'sub_permission_id' => 'rooms,room_type',
            'sub_permission' => 'Rooms, Room Type', 
            'permission_path' => '#', 
            'sub_permission_path' => '/Admin/Pages/Rooms/rooms,/Admin/Pages/Rooms/room_type'
        ]);

        Permission::factory()->create([
            'icon' => 'note-icon-picture', 
            'permission_id' => 'function_hall',
            'permission' => 'FUNCTION HALL', 
            'sub_permission_id' => '',
            'sub_permission' => '', 
            'permission_path' => '/Admin/Pages/FunctionHall/function_hall', 
            'sub_permission_path' => ''
        ]);

        Permission::factory()->create([
            'icon' => 'fa-users', 
            'permission_id' => 'users_account',
            'permission' => 'USERS ACCOUNT', 
            'sub_permission_id' => '',
            'sub_permission' => '', 
            'permission_path' => '/Admin/Pages/UsersAccount/users_account', 
            'sub_permission_path' => ''
        ]);

        Permission::factory()->create([
            'icon' => 'fa-box', 
            'permission_id' => 'open_roles_permissions',
            'permission' => 'MANAGE ROLES & PERMISSION', 
            'sub_permission_id' => 'permissions,roles,assign_roles_permissions',
            'sub_permission' => 'Permissions, Roles, Assign Roles and Permissions', 
            'permission_path' => '#', 
            'sub_permission_path' => '/Admin/Pages/Roles_and_Permissions/permissions,/Admin/Pages/Roles_and_Permissions/roles,/Admin/Pages/Roles_and_Permissions/assign_roles_permissions'
        ]);

        Permission::factory()->create([
            'icon' => 'ion-stats-bars', 
            'permission_id' => 'report',
            'permission' => 'REPORT', 
            'sub_permission_id' => '',
            'sub_permission' => '', 
            'permission_path' => '/Admin/Pages/Report/report', 
            'sub_permission_path' => ''
        ]);

        Role::factory()->create([
            'role' => 'Admin'
        ]);

        Role::factory()->create([
            'role' => 'Staff'
        ]);

        $password = "1234a";
        $hash = password_hash($password, PASSWORD_BCRYPT);

        User::factory()->create([
            'user_info_id' => '1',
            'username' => 'Admin',
	    'email' => 'admin@gmail.com',
            'password' => $hash,
            'roles_id' => '1',
            'user_type' => '1',
            'status' => '1',
        ]);

        User::factory()->create([
            'user_info_id' => '2',
            'username' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => $hash,
            'roles_id' => '2',
            'user_type' => '1',
            'status' => '1',
        ]);

        SuperUser::factory()->create([
            'name' => 'Admin',
        ]);

        SuperUser::factory()->create([
            'name' => 'Staff',
        ]);

        AssignPermissionAndRole::factory()->create([
            'assign_role' => '2',
            'assign_permission' => '1',
        ]);
    }
}
