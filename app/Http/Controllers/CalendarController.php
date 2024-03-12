<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'bookings' => DB::table('bookings')
                        ->select('bookings.id', 'bookings.auth_user_id', 'bookings.book_from', 'bookings.book_start_date', 'bookings.book_end_date',
                            'bookings.payment_method', 'bookings.reference_num', 'bookings.payment', 'bookings.status', 'rooms.room_no', 'rooms.room_name',
                            'rooms.room_type_id', 'room_types.room_type', 'room_types.room_rate', 'function_halls.function_hall_description', 'function_halls.function_hall_rate')
                        ->leftJoin('rooms', 'bookings.room_or_hall_id', '=', 'rooms.id')
                        ->leftJoin('room_types', 'rooms.room_type_id', '=', 'room_types.id')
                        ->leftJoin('function_halls', 'bookings.room_or_hall_id', '=', 'function_halls.id')
                        ->get()
        ];
        return view('/Admin/Pages/Calendar/calendar', $renderData);
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
