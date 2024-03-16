<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\SuperUser;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        if($request->password != $request->cpassword) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Password and confirm password is not the same!',
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
        
        $userCredentials = User::select('users.id', 'super_users.name', 'users.username', 'users.password')
                                ->join('super_users', 'users.user_info_id', '=', 'super_users.id')
                                ->where('users.user_type', 1)
                                ->where('users.username', $request->username)
                                ->first();

        if ($userCredentials && Hash::check($request->password, $userCredentials->password)) {

            if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
                $request->session()->regenerate();

                $renderMessage = [
                    'response' => 1,
                    'message' => 'Login successful! Hi ' . $userCredentials->name,
                    'path' => '/Admin/Pages/Dashboard/dashboard'
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
}
