<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\RoomsController;
use App\Http\Controllers\RoomTypeController;
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\FunctionHallController;
use App\Http\Controllers\AssignRolesPermissionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/Admin/Pages/Login/login', function () {
    return view('/Admin/Pages/Login/login');
});

Auth::routes();


// Dashboard Route
Route::get('/Admin/Pages/Dashboard/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('/Admin/Pages/Dashboard/dashboard');



//Bookings | Pending Route
Route::get('/Admin/Pages/Bookings/pending_bookings',[App\Http\Controllers\PendingBookingsController::class,'index'])->name('/Admin/Pages/Bookings/pending_bookings');

//Bookings | Confirmed Route
Route::get('/Admin/Pages/Bookings/confirmed_bookings',[App\Http\Controllers\ConfirmedBookingsController::class,'index'])->name('/Admin/Pages/Bookings/confirmed_bookings');

//Bookings | Cancelled Route
Route::get('/Admin/Pages/Bookings/cancelled_bookings',[App\Http\Controllers\CancelledBookingsController::class,'index'])->name('/Admin/Pages/Bookings/cancelled_bookings');


// Guests Route
Route::get('/Admin/Pages/Guests/guests', [App\Http\Controllers\GuestsController::class, 'index'])->name('/Admin/Pages/Guests/guests');


// Calendar Route
Route::get('/Admin/Pages/Calendar/calendar',[App\Http\Controllers\CalendarController::class, 'index'])->name('/Admin/Pages/Calendar/calendar');


//Rooms Route
Route::get('/Admin/Pages/Rooms/rooms',[App\Http\Controllers\RoomsController::class, 'index'])->name('/Admin/Pages/Rooms/rooms');
Route::post('/Admin/Pages/Rooms/rooms/image', [RoomsController::class, 'store_image'])->name('room_image');
Route::post('/Admin/Pages/Rooms/rooms/store', [RoomsController::class, 'store'])->name('room_store');


//RoomType Route
Route::get('/Admin/Pages/Rooms/room_type',[App\Http\Controllers\RoomTypeController::class, 'index'])->name('/Admin/Pages/Rooms/room_type');
Route::post('/Admin/Pages/Rooms/room_type/store', [RoomTypeController::class, 'store'])->name('room_type_store');
Route::get('/Admin/Pages/Rooms/room_type/edit/{id}', [RoomTypeController::class, 'edit'])->name('room_type_edit'); //not use but can be use in the future.
Route::post('/Admin/Pages/Rooms/room_type/update', [RoomTypeController::class, 'update'])->name('room_type_update');
Route::post('/Admin/Pages/Rooms/room_type/destroy', [RoomTypeController::class, 'destroy'])->name('room_type_destroy');

//FunctionHall Route
Route::get('/Admin/Pages/FunctionHall/function_hall',[App\Http\Controllers\FunctionHallController::class,'index'])->name('/Admin/Pages/FunctionHall/function_hall');
Route::post('/Admin/Pages/FunctionHall/function_hall/image', [FunctionHallController::class, 'store_image'])->name('function_hall_image');
Route::post('/Admin/Pages/FunctionHall/function_hall/store', [FunctionHallController::class, 'store'])->name('function_hall_store');
Route::post('/Admin/Pages/FunctionHall/function_hall/update', [FunctionHallController::class, 'update'])->name('function_hall_update');

//UsersAccount Route
Route::get('/Admin/Pages/UsersAccount/users_account',[App\Http\Controllers\UsersAccountController::class,'index'])->name('/Admin/Pages/UsersAccount/users_account');

//Permissions Route
Route::get('/Admin/Pages/Roles_and_Permissions/permissions',[App\Http\Controllers\PermissionsController::class,'index'])->name('/Admin/Pages/Roles_and_Permissions/permissions');
Route::post('/Admin/Pages/Roles_and_Permissions/permissions/getAllPermission', [PermissionsController::class, 'getAllPermission'])->name('get_all_permission');
Route::post('/Admin/Pages/Roles_and_Permissions/permissions/update', [PermissionsController::class, 'update'])->name('permissions_update');

//Roles Route
Route::get('/Admin/Pages/Roles_and_Permissions/roles',[App\Http\Controllers\RolesController::class,'index'])->name('/Admin/Pages/Roles_and_Permissions/roles');
Route::post('/Admin/Pages/Roles_and_Permissions/roles/store', [RolesController::class, 'store'])->name('roles_store');
Route::post('/Admin/Pages/Roles_and_Permissions/roles/update', [RolesController::class, 'update'])->name('roles_update');


//Assign Roles and Permissions Route
Route::get('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions',[App\Http\Controllers\AssignRolesPermissionsController::class,'index'])->name('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions');
Route::post('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions/store', [AssignRolesPermissionsController::class, 'store'])->name('assign_roles_permissions_store');
Route::post('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions/update', [AssignRolesPermissionsController::class, 'update'])->name('assign_roles_permissions_update');


//Report Route
Route::get('/Admin/Pages/Report/report',[App\Http\Controllers\ReportController::class,'index'])->name('/Admin/Pages/Report/report');




//Customer Side
//Home Route
Route::get('/Customer/Pages/Home/home',[App\Http\Controllers\HomeController::class,'index'])->name('/Customer/Pages/Home/home');


//Book Route
Route::get('/Customer/Pages/Book/book',[App\Http\Controllers\BookController::class,'index'])->name('/Customer/Pages/Book/book');

//About Route
Route::get('/Customer/Pages/About/about',[App\Http\Controllers\AboutController::class,'index'])->name('/Customer/Pages/About/about');

