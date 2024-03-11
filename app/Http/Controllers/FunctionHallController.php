<?php

namespace App\Http\Controllers;

use App\Models\FunctionHall;
use Illuminate\Http\Request;

class FunctionHallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'function_halls' => FunctionHall::all()
        ];

        return view('/Admin/Pages/FunctionHall/function_hall', $renderData);
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
        $formData = [
            'function_hall_image' => $request->function_hall_image,
            'function_hall_description' => $request->function_hall_description,
            'function_hall_rate' => $request->function_hall_rate,
        ];

        FunctionHall::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Adding function hall sucess',
            'path' => '/Admin/Pages/FunctionHall/function_hall'
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
            $image->move(public_path('functional_hall_images'), $imageName);

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
    public function update(Request $request)
    {
        if ($request->u_function_hall_image == '') {
            $formData = [
                'function_hall_description' => $request->u_function_hall_description,
                'function_hall_rate' => $request->u_function_hall_rate,
            ];
            
        } else {
            $formData = [
                'function_hall_image'=> $request->u_function_hall_image,
                'function_hall_description' => $request->u_function_hall_description,
                'function_hall_rate' => $request->u_function_hall_rate,
            ];
        }
        
        FunctionHall::where('id', '=', $request->u_id)->update($formData);
        

        $renderMessage = [
            'response' => 1,
            'message' => 'Updating function hall sucess',
            'path' => '/Admin/Pages/FunctionHall/function_hall'
        ];

        return response()->json($renderMessage);
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
