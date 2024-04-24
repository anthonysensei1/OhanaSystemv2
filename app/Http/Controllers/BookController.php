<?php

namespace App\Http\Controllers;

use DB;
use DateTime;
use App\Models\User;
use App\Models\Rooms;
use App\Models\Bookings;
use App\Models\FunctionHall;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUserId = auth()->user()->id;
        $renderData = [
            'rooms' => Rooms::select('rooms.id', 'rooms.room_image', 'rooms.room_no', 'rooms.room_name', 'room_types.room_type', 'room_types.room_rate')
            ->join('room_types', 'room_types.id', '=', 'rooms.room_type_id')
            ->get(),
            'function_hall' => FunctionHall::select('id', 'function_hall_image', 'function_hall_description', 'function_hall_rate')
            ->first(),
            'current_user' => User::select('users.id', DB::raw('CONCAT(ordinary_users.first_name, " ", ordinary_users.last_name) AS ordinary_user_fullname'), 'ordinary_users.address', 'ordinary_users.c_number')
                ->join('ordinary_users', 'ordinary_users.id', '=', 'users.user_info_id')
                ->where('users.id', $currentUserId)
                ->where('users.user_type', 2)
                ->first(),
        ];

        return view('/Customer/Pages/Book/book', $renderData);
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
        $arr_reservation = explode("-", $request->reservation);

        $i = 0;
        while ($i < count($arr_reservation)) {
            $date = DateTime::createFromFormat('m/d/Y', trim($arr_reservation[$i]));
            if ($i < 1) {
                $book_start = $date->format('Y-m-d');
            } else {
                $book_end = $date->format('Y-m-d');
            }

            $i++;
        }

        $modal_type = $request->modal_type;
        $currentDateTime = date("Y-m-d");
        $date1 = new DateTime($book_start . ' 14:00:00');
        $date2 = new DateTime($book_end . ' 12:00:00');
        $interval = $date1->diff($date2);
        $total_days = $interval->days + (int)$modal_type;

        $room_rate_per_day = $request->room_rate;
        $total_amount = $room_rate_per_day * $total_days;

        

        if ($currentDateTime > $book_start) {
            $renderMessage = [
                'response' => 0,
                'message' => 'Invalid date, Please try again!',
            ];

            return response()->json($renderMessage);
        }

        if ($request->payment != $total_amount) {
            $renderMessage = [
                'response' => 0,
                'message' => 'Invalid payment,Total amount is P' . number_format($total_amount, 2),
            ];

            return response()->json($renderMessage);
        }

        $book = DB::table('bookings')
                    ->where(function ($query) use ($book_start, $book_end) {
                        $query->where(function ($query) use ($book_start, $book_end) {
                            $query->where('book_start_date', '=', $book_start)
                                ->orWhere('book_end_date', '=', $book_end);
                        })
                        ->orWhere(function ($query) use ($book_start, $book_end) {
                            $query->where('book_start_date', '<=', $book_start)
                                ->where('book_end_date', '>=', $book_start);
                        });
                    })
                    ->where('room_or_hall_id', '=', $request->b_id)
                    ->where('book_from', '=', $request->b_from)
                    // ->where('status', '=', '1')
                    ->first();
                    
        if (!empty($book)) {

            $renderMessage = [
                'response' => 0,
                'message' => 'This day is already book, please see calendar for available days!',
            ];

            return response()->json($renderMessage);
        }

        $formData = [
            'auth_user_id' => $request->auth_id,
            'room_or_hall_id' => $request->b_id,
            'book_from' => $request->b_from,
            'book_start_date' => $book_start,
            'book_end_date' => $book_end,
            'payment_method' => $request->payment_method,
            'reference_num' => $request->reference_num,
            'payment' => $request->payment,
            'status' => 1,
        ];

        Bookings::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Booking sucess!',
            'path' => '/Customer/Pages/Book/book'
        ];

        return response()->json($renderMessage);
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
