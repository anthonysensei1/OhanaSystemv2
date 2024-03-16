<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\RoomType;
use Illuminate\Http\Request;

class ConfirmedBookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'bookings' => Bookings::select(
                        'bookings.id',
                        'bookings.book_from',
                        'bookings.book_start_date',
                        'bookings.book_end_date',
                        'bookings.payment_method',
                        'bookings.reference_num',
                        'bookings.payment',
                        'bookings.status',
                        'bookings.created_at',
                        'rooms.room_image',
                        'rooms.room_no',
                        'rooms.room_name',
                        'function_halls.function_hall_image',
                        'function_halls.function_hall_description',
                        'function_halls.function_hall_rate',
                        'room_types.id AS room_type_id',
                        'room_types.room_type',
                        'room_types.room_rate',
                        'ordinary_users.first_name',
                        'ordinary_users.last_name',
                        'ordinary_users.address',
                        'ordinary_users.c_number'
                    )
                    ->join('users', 'bookings.auth_user_id', '=', 'users.id')
                    ->join('ordinary_users', 'users.user_info_id', '=', 'ordinary_users.id')
                    ->leftJoin('rooms', 'bookings.room_or_hall_id', '=', 'rooms.id')
                    ->leftJoin('function_halls', 'bookings.room_or_hall_id', '=', 'function_halls.id')
                    ->leftJoin('room_types', 'rooms.room_type_id', '=', 'room_types.id')
                    ->where('bookings.status', '=', '2')
                    ->get(),
                    'room_types' => RoomType::all(),
            ];

        return view('/Admin/Pages/Bookings/confirmed_bookings', $renderData);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
