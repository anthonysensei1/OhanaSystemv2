<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\SuperUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Log;

class UsersAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr_permission = explode(',', session('assign_permission'));

        if (!in_array('7', $arr_permission) && session('username') != 'Admin') {
            abort(404);
        }

        $renderData = [
            'roles' => Role::all(),
            'users' => DB::table('users')
                ->select('users.*', 'users.id AS user_id', 'super_users.*', 'roles.role AS role_name')
                ->leftJoin('super_users', 'users.user_info_id', '=', 'super_users.id')
                ->leftJoin('roles', 'users.roles_id', '=', 'roles.id')
                ->whereNotNull('users.roles_id')
                ->get()
        ];

        return view('/Admin/Pages/UsersAccount/users_account', $renderData);
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
        if ($request->password != $request->cpassword) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Password and confirm password is not the same!',
                'path' => '/Admin/Pages/UsersAccount/users_account'
            ];

            return response()->json($renderMessage);
        }

        $userCredentials = User::where('username', $request->username)->first();

        if ($userCredentials) {
            $renderMessage = [
                'response' => 0,
                'message' => 'Username is invalid!',
                'path' => '/Admin/Pages/UsersAccount/users_account'
            ];

            return response()->json($renderMessage);
        }

        $formData = [
            'name' => $request->fullname,
        ];

        SuperUser::create($formData);

        $request->password = password_hash($request->password, PASSWORD_BCRYPT);
        $super_user = SuperUser::latest()->first();
        $formData = [
            'user_info_id' => $super_user->id,
            'username' => $request->username,
            'password' => $request->password,
            'roles_id' => $request->user_role,
            'user_type' => 1
        ];

        User::create($formData);

        $renderMessage = [
            'response' => 1,
            'message' => 'Adding super user sucess',
            'path' => '/Admin/Pages/UsersAccount/users_account'
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

    public function index_login()
    {
        return view('/Admin/Pages/Login/login');
    }

    public function user_login(Request $request)
    {
        $use_name = $this->checkUser($request->username);
        $valid = User::select('roles_id')->where($use_name , $request->username)->first();

        if ($valid) {

            $userCredentials = User::select('users.id', 'super_users.name', 'users.username', 'users.password','users.email');

            if ($valid->roles_id != '1') {
                $userCredentials = User::select('users.id', 'super_users.name', 'users.username', 'users.password', 'assign_permission_and_roles.assign_permission','users.email');
                $userCredentials = $userCredentials->join('roles', 'users.roles_id', '=', 'roles.id');
                $userCredentials = $userCredentials->join('assign_permission_and_roles', 'roles.id', '=', 'assign_permission_and_roles.assign_role');
            }

            $userCredentials = $userCredentials->join('super_users', 'users.user_info_id', '=', 'super_users.id');
            $userCredentials = $userCredentials->where('users.user_type', 1);
            $userCredentials = $userCredentials->where($use_name, $request->username);
            $userCredentials = $userCredentials->first();

            if ($userCredentials && Hash::check($request->password, $userCredentials->password)) {

                if (auth()->attempt(['username' => $userCredentials->username, 'password' => $request->password])) {
                    $request->session()->regenerate();
                    $request->session()->regenerateToken();


                    $arr_sessions = [
                        'assign_permission' => $userCredentials->assign_permission,
                        'username' => $userCredentials->username,
                    ];

                    Session::put($arr_sessions);

                    $permissions = explode(',', $userCredentials->assign_permission);
                    $path = '/Admin/Pages/Dashboard/dashboard';

                    if ($valid->roles_id != '1') {
                        foreach ($permissions as $permission) {
                            switch ($permission) {
                                case "1":
                                    $path = '/Admin/Pages/Dashboard/dashboard';
                                    break 2;
                                case "2":
                                    $path = '/Admin/Pages/Guests/guests';
                                    break 2;
                                case "3":
                                    $path = '/Admin/Pages/Bookings/pending_bookings';
                                    break 2;
                                case "4":
                                    $path = '/Admin/Pages/Calendar/calendar';
                                    break 2;
                                case "5":
                                    $path = '/Admin/Pages/Rooms/rooms';
                                    break 2;
                                case "6":
                                    $path = '/Admin/Pages/FunctionHall/function_hall';
                                    break 2;
                                case "7":
                                    $path = '/Admin/Pages/UsersAccount/users_account';
                                    break 2;
                                case "8":
                                    $path = '/Admin/Pages/Roles_and_Permissions/permissions';
                                    break 2;
                                case "9":
                                    $path = '/Admin/Pages/Report/report';
                                    break 2;
                            }
                        }
                    }

                    $renderMessage = [
                        'response' => 1,
                        'message' => 'Login successful! Hi ' . $userCredentials->name,
                        'path' => $path
                    ];

                    return response()->json($renderMessage);
                } else {
                    $renderMessage = [
                        'response' => 0,
                        'message' => 'Failed to authenticate!',
                    ];

                    return response()->json($renderMessage);
                }
            } else {
                $renderMessage = [
                    'response' => 0,
                    'message' => 'Wrong username or password!',
                ];

                return response()->json($renderMessage);
            }

        }else{
            $renderMessage = [
                'response' => 0,
                'message' => 'User not exist!',
            ];

            return response()->json($renderMessage);
        }

        
    }

    public function user_logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $renderMessage = [
            'response' => 1,
            'message' => 'Logout sucess!',
            'path' => '/Admin/Pages/Login/login'
        ];

        return response()->json($renderMessage);
    }

    public function checkUser($data) {
        $valid = User::select('*')->where('username', $data)->first();
        if($valid){
            return 'username';
        }
        return 'email';
    }

    // public function checkUserRole($data) {
        
    //     $valid = User::select('role')->where($data->name, $data->value)->first();
    //     if($valid){
    //         return 'username';
    //     }
    //     return 'email';
    // }
}
