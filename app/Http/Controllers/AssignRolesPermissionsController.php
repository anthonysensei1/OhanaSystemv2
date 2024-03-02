<?php

namespace App\Http\Controllers;

use App\Models\AssignPermissionAndRole;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class AssignRolesPermissionsController extends Controller
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
            'roles' => Role::all(),
            'assign_permission_and_roles' => AssignPermissionAndRole::join('roles', 'assign_permission_and_roles.assign_role', '=', 'roles.id')
            ->select('assign_permission_and_roles.*', 'roles.role')
            ->get(),
        ];

        $renderData['assign_permission_and_roles'] = $renderData['assign_permission_and_roles']->map(function ($item) {

            $arr_assign_permission = explode(',', $item['assign_permission']);
            $arr_assign_permission = array_map('intval', $arr_assign_permission);
            $data = Permission::select('permission')->whereIn('id', $arr_assign_permission)->get();
            $permissionValues = $data->pluck('permission')->toArray();
            $item['assign_permission_name'] = implode(",", $permissionValues);

            return $item->toArray();
        });

        return view('/Admin/Pages/Roles_and_Permissions/assign_roles_permissions', $renderData);
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
        $assignPermissionAndRole = AssignPermissionAndRole::where('assign_role', '=', $request->assign_role)->first();
        if (isset($assignPermissionAndRole) && $assignPermissionAndRole->exists()) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Assigning permission on this role already exist!',
            ];

            return response()->json($renderMessage);
        }

        if (empty($request->assign_permission)) {
            $renderMessage = [
                'response' => 0,
                'message' => 'No permission selected please select atlest one!',
            ];

            return response()->json($renderMessage);
        }

        $request->assign_permission = implode(",", $request->assign_permission);
        $formData = [
            'assign_role' => $request->assign_role,
            'assign_permission' => $request->assign_permission,
        ];

        AssignPermissionAndRole::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Assigning permission on this role sucess',
            'path' => '/Admin/Pages/Roles_and_Permissions/assign_roles_permissions'
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
        if (empty($request->u_assign_permission)) {
            $renderMessage = [
                'response' => 0,
                'message' => 'No permission selected, Please select atlest one!',
            ];
            
            return response()->json($renderMessage);
        }

        $request->u_assign_permission = implode(",", $request->u_assign_permission);
        $formData = [
            'assign_permission' => $request->u_assign_permission,
        ];

        AssignPermissionAndRole::where('id', '=', $request->u_id)->update($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Updating assign permission on this role sucess',
            'path' => '/Admin/Pages/Roles_and_Permissions/assign_roles_permissions'
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
