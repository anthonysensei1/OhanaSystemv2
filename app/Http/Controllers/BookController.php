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
            ->get()
            ->map(function ($room) {
                $room->room_image = explode(',', $room->room_image);
                return $room;
            }),
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

        // Explode reservation dates and time range from the request
        $arr_reservation = explode(" - ", $request->reservation); 
        $book_start = null;
        $book_end = null;

        // Parse the dates
        for ($i = 0; $i < count($arr_reservation); $i++) {
            $date = DateTime::createFromFormat('m/d/Y H:i', trim($arr_reservation[$i]));
            if ($date === false) {
                // Return a response immediately if a date is invalid
                return response()->json([
                    'response' => 0,
                    'message' => 'Invalid date format in reservation array at index ' . $i
                ]);
            }

            if ($i == 0) {
                $book_start = $date;  // Keep as DateTime object for start
            } elseif ($i == 1) {
                $book_end = $date;  // Keep as DateTime object for end
            }
        }

        // Calculate the booking interval and total days
        $modal_type = $request->modal_type;
        $interval = $book_start->diff($book_end);
        $total_days = $interval->days + (int)$modal_type;

        // Calculate the total amount
        $room_rate_per_day = $request->room_rate;
        $total_amount = $room_rate_per_day * $total_days;

        // Check if the booking start date is in the past
        $currentDateTime = new DateTime("now");
        if ($currentDateTime > $book_start) {
            return response()->json([
                'response' => 0,
                'message' => 'Invalid date, Please try again!'
            ]);
        }

        // Verify payment amount
        if ($request->payment != $total_amount) {
            return response()->json([
                'response' => 0,
                'message' => 'Invalid payment, Total amount is P' . number_format($total_amount, 2)
            ]);
        }

        // Check for existing bookings that might overlap
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
            // Uncomment the following line if status checking is needed
            // ->where('status', '=', '1')
            ->first();

        // Handle existing bookings
        if (!empty($book)) {
            return response()->json([
                'response' => 0,
                'message' => 'This day is already booked, please see calendar for available days!',
            ]);
        }

        // Create booking record
        $formData = [
            'auth_user_id' => $request->auth_id,
            'room_or_hall_id' => $request->b_id,
            'book_from' => $request->b_from,
            'book_start_date' => $book_start->format('Y-m-d H:i:s'),  // Formatting DateTime object
            'book_end_date' => $book_end->format('Y-m-d H:i:s'),
            'payment_method' => $request->payment_method,
            'reference_num' => $request->reference_num,
            'payment' => $request->payment,
            'status' => 1,
        ];

        Bookings::create($formData);

        // Return a success response
        return response()->json([
            'response' => 1,
            'message' => 'Booking success!',
            'path' => '/Customer/Pages/Book/book'
        ]);
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
