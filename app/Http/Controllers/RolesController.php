<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'roles' => Role::all()
        ];

        return view('/Admin/Pages/Roles_and_Permissions/roles', $renderData);
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
        $role = Role::where('role', '=', $request->role)->first();
        if (isset($role) && $role->exists()) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Role already exist!',
            ];

            return response()->json($renderMessage);
        }

        $request->role = ucfirst($request->role);
        $formData = [
            'role' => $request->role
        ];

        Role::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Adding role sucess',
            'path' => '/Admin/Pages/Roles_and_Permissions/roles'
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
    public function update(Request $request)
    {
        $request->u_role = ucfirst($request->u_role);
        $formData = [
            'role' => $request->u_role
        ];

        Role::where('id', '=', $request->u_id)->update($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Updating role sucess',
            'path' => '/Admin/Pages/Roles_and_Permissions/roles'
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
