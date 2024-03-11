<?php

namespace App\Http\Controllers;

use App\Models\Rooms;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomsController extends Controller
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
            'rooms' => Rooms::join('room_types', 'rooms.room_type_id', '=', 'room_types.id')
            ->select('rooms.*','room_types.room_type' , 'room_types.room_rate')
            ->get(),
        ];
        // dd($renderData);

        return view('/Admin/Pages/Rooms/rooms', $renderData);
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
        $roomType = Rooms::where('room_no', '=', $request->room_no)->first();
        if (isset($roomType) && $roomType->exists()) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Room no. already exist!',
            ];

            return response()->json($renderMessage);
        }
        
        $formData = [
            'room_image' => $request->room_image,
            'room_no' => $request->room_no,
            'room_name' => $request->room_name,
            'room_type_id' => $request->_room_type,
        ];

        Rooms::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Adding room sucess',
            'path' => '/Admin/Pages/Rooms/rooms'
        ];

        return response()->json($renderMessage);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_image(Request $request)
    {
        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);

            $renderMessage = [
                'response' => 1,
                'message' => $imageName
            ];

            return response()->json($renderMessage);

        } else {

            $renderMessage = [
                'response' => 0,
                'message' => 'No image found'
            ];

            return response()->json($renderMessage);

        }
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
