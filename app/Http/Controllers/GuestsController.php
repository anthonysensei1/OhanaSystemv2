<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'users' => DB::table('users')
                    ->select('users.*', 'users.id AS user_id', 'ordinary_users.*')
                    ->leftJoin('ordinary_users', 'users.user_info_id', '=', 'ordinary_users.id')
                    ->whereNull('users.roles_id')
                    ->get()
        ];
        
        return view('/Admin/Pages/Guests/guests', $renderData);
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
    public function destroy(Request $request)
    {
        switch ($request->status) {
            case 0:
                $request->status = 1;
                break;
            case 1:
                $request->status = 0;
                break;
        }

        $formData = [
            'status' => $request->status
        ];

        User::where('id', '=', $request->id)->update($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Update user success!',
            'path' => '/Admin/Pages/Guests/guests'
        ];

        return response()->json($renderMessage);
    }
}
