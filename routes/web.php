<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('/Admin/Pages/Dashboard/dashboard');
});

// Auth::routes();


// Dashboard Route
// Route::get('/Pages/Dashboard/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->name('/Pages/Dashboard/dashboard');



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


//RoomType Route
Route::get('/Admin/Pages/Rooms/room_type',[App\Http\Controllers\RoomTypeController::class, 'index'])->name('/Admin/Pages/Rooms/room_type');

//FunctionHall Route
Route::get('/Admin/Pages/FunctionHall/function_hall',[App\Http\Controllers\FunctionHallController::class,'index'])->name('/Admin/Pages/FunctionHall/function_hall');

//UsersAccount Route
Route::get('/Admin/Pages/UsersAccount/users_account',[App\Http\Controllers\UsersAccountController::class,'index'])->name('/Admin/Pages/UsersAccount/users_account');

//Permissions Route
Route::get('/Admin/Pages/Roles_and_Permissions/permissions',[App\Http\Controllers\PermissionsController::class,'index'])->name('/Admin/Pages/Roles_and_Permissions/permissions');

//Roles Route
Route::get('/Admin/Pages/Roles_and_Permissions/roles',[App\Http\Controllers\RolesController::class,'index'])->name('/Admin/Pages/Roles_and_Permissions/roles');


//Assign Roles and Permissions Route
Route::get('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions',[App\Http\Controllers\AssignRolesPermissionsController::class,'index'])->name('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions');


//Report Route
Route::get('/Admin/Pages/Report/report',[App\Http\Controllers\ReportController::class,'index'])->name('/Admin/Pages/Report/report');




//Customer Side
//Home Route
Route::get('/Customer/Pages/Home/home',[App\Http\Controllers\HomeController::class,'index'])->name('/Customer/Pages/Home/home');


//Book Route
Route::get('/Customer/Pages/Book/book',[App\Http\Controllers\BookController::class,'index'])->name('/Customer/Pages/Book/book');

//About Route
Route::get('/Customer/Pages/About/about',[App\Http\Controllers\AboutController::class,'index'])->name('/Customer/Pages/About/about');


//ContactUs Route
Route::get('/Customer/Pages/ContactUs/contact_us',[App\Http\Controllers\ContactUsController::class,'index'])->name('/Customer/Pages/ContactUs/contact_us');