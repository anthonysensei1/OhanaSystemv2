<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\OrdinaryUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class CustomerLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/Customer/Pages/Login/sign_in');
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
        if($request->password != $request->c_password) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Password and confirm password is not the same!',
                'path' => '/Customer/Pages/Login/sign_in'
            ];

            return response()->json($renderMessage);

        }

        if($request->c_number[0] != '0' || $request->c_number[1] != '9' || strlen($request->c_number) != 11) {

            $renderMessage = [
                'response' => 0,
                'message' => 'Invalid phone number!',
                'path' => '/Customer/Pages/Login/sign_in'
            ];

            return response()->json($renderMessage);

        }

        $userCredentials = User::where('username', $request->username)->first();

        if ($userCredentials) {
            $renderMessage = [
                'response' => 0,
                'message' => 'Username is invalid!',
                'path' => '/Customer/Pages/Login/sign_in'
            ];

            return response()->json($renderMessage); 
        }

        $request->password = password_hash($request->password, PASSWORD_BCRYPT);


        // -- OrdinaryUser table --
        $formData = [
            'first_name' => $request->firstname,
            'last_name' => $request->lastname,
            'address' => $request->address,
            'c_number' => $request->c_number,
        ];

        OrdinaryUser::create($formData);
        // -- OrdinaryUser table --
        
        // -- User table --
        $ordinary_user = OrdinaryUser::latest()->first();
        $formData = [
            'user_info_id' => $ordinary_user->id,
            'username' => $request->username,
            'password' => $request->password,
            'user_type' => '2'
        ];

        User::create($formData);
        // -- User table --

        $renderMessage = [
            'response' => 1,
            'message' => 'Registration success!',
            'path' => '/Customer/Pages/Login/sign_in'
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

    public function customer_login(Request $request)
    {
        
        $userCredentials = User::select('users.id', 'users.username', 'users.password', 'users.user_type',
                                DB::raw('CONCAT(ordinary_users.first_name, " ", ordinary_users.last_name) AS ordinary_users'))
                                ->join('ordinary_users', 'users.user_info_id', '=', 'ordinary_users.id')
                                ->where('users.user_type', 2)
                                ->where('users.username', $request->username)
                                ->where('users.status', '=', 1)
                                ->first();

        if ($userCredentials && Hash::check($request->password, $userCredentials->password)) {

            if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
                
                $request->session()->regenerate();

                $renderMessage = [
                    'response' => 1,
                    'message' => 'Login successful! Hi ' . $userCredentials->ordinary_users,
                    'path' => '/Customer/Pages/Home/home'
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
    
    public function customer_logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        $renderMessage = [
            'response' => 1,
            'message' => 'Logout sucess!',
            'path' => '/Customer/Pages/Login/sign_in'
        ];

        return response()->json($renderMessage);
    }
}
