<?php

namespace App\Http\Controllers;

use App\Models\Bookings;
use App\Models\OrdinaryUser;
use App\Models\SuperUser;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Bookings::where('status', 2)->get();
        $arr_last_year = array_fill(0, 12, 0);
        $arr_current_year = array_fill(0, 12, 0);
        $currentYear = date("Y");
        $lastYear = date("Y", strtotime("-1 year"));
        $payment = 0;
        
        foreach($bookings as $booking) {
            $booking['book_end_date'] = explode("-", $booking['book_end_date']);
            if($booking['book_end_date'][0] == $currentYear) {
                $number = intval($booking['book_end_date'][1]);
                $index = $number - 1;
                $payment = $arr_current_year[$index] + $booking['payment'];
                $arr_current_year[$index] = $payment;
            } else if ($booking['book_end_date'][0] == $lastYear) {
                $number = intval($booking['book_end_date'][1]);
                $index = $number - 1;
                $payment = $arr_last_year[$index] + $booking['payment'];
                $arr_last_year[$index] = $payment;
            }
        }

        $renderData = [
            'guest' => OrdinaryUser::count(),
            'user' => SuperUser::count(),
            'pending' => Bookings::where('status', 1)->count(),
            'confirm' => Bookings::where('status', 2)->count(),
            'cancel' => Bookings::where('status', 0)->count(),
            'bookings_total' => array_sum($arr_current_year),
            'arr_last_year'=>$arr_last_year,
            'arr_current_year'=>$arr_current_year,
        ];

        return view ('/Admin/Pages/Dashboard/dashboard', $renderData);
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
