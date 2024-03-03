<?php

namespace App\Http\Controllers;

use App\Models\AssignPermissionAndRole;
use App\Models\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $renderData = [
            'permissions' => Permission::all(),
        ];
        
        return view('/Admin/Pages/Roles_and_Permissions/permissions', $renderData);
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
    public function update(Request $request)
    {
        if (count($request->u_sub_permission) < 1) {
            $request->u_sub_permission = '';
        }else {
            $request->u_sub_permission = implode(',', $request->u_sub_permission);
        }

        $formData = [
            'id' => $request->u_id,
            'permission' => $request->u_permission,
            'sub_permission' => $request->u_sub_permission,
        ];

        Permission::where('id', '=', $request->u_id)->update($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Update permission success!',
            'path' => '/Admin/Pages/Roles_and_Permissions/permissions'
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

    public function getAllPermission() {
        $user = auth()->user();
        $assign_permission_and_roles = AssignPermissionAndRole::where('assign_role', '=', $user->roles_id)->first();
        $renderData = '';
        if ($assign_permission_and_roles) {

            $permission_ids = is_array($assign_permission_and_roles['assign_permission']) ? 
            $assign_permission_and_roles['assign_permission'] : 
            explode(',', $assign_permission_and_roles['assign_permission']);

            $renderData = Permission::whereIn('id', $permission_ids)->get();

        } 
        else {
            if ($user->roles_id == '1') {
                $renderData = Permission::all();
            }
        }
        return $renderData;
    }
}
