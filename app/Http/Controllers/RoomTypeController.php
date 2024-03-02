<?php

namespace App\Http\Controllers;

use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'room_types' => RoomType::all(),
        ];

        return view('/Admin/Pages/Rooms/room_type', $renderData);
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
        $roomType = RoomType::where('room_type', '=', $request->room_type)->first();
        if (isset($roomType) && $roomType->exists()) {
            
            $renderMessage = [
                'response' => 0,
                'message' => 'Room type already exist!',
            ];

            return response()->json($renderMessage);
        }
        
        $formData = [
            'room_type' => $request->room_type,
            'room_rate' => $request->room_rate,
        ];

        RoomType::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Adding room type sucess',
            'path' => '/Admin/Pages/Rooms/room_type'
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
        $roomType = RoomType::find($id);

        $renderData = [
            'u_id' => $roomType->id,
            'u_room_type' => $roomType->room_type,
            'u_room_rate' => $roomType->room_rate
        ];

        return response()->json($renderData);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $formData = [
            'room_type' => $request->u_room_type,
            'room_rate' => $request->u_room_rate,
        ];

        RoomType::where('id', '=', $request->u_id)->update($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Update room type success!',
            'path' => '/Admin/Pages/Rooms/room_type'
        ];

        return response()->json($renderMessage);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        RoomType::where('id', '=', $request->d_id)->delete();

        $renderMessage = [
            'response' => 1,
            'message' => 'Delete room type success!',
            'path' => '/Admin/Pages/Rooms/room_type'
        ];

        return response()->json($renderMessage);
    }
}
