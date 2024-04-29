<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OTPMail;
use App\Mail\forgotpass;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Log;




class OTPController extends Controller
{

    public function getLogs() {
        $emails = DB::table('user_otps')
                ->select('*')->get();

        return view('Admin.Pages.Mails.index',compact('emails'));
    }
    public function sendOTP(Request $request)
    {
        $details = '';
        $is_status = 'is_pending';

        if($request->request_type === '3'){
            $otp = 000000;
            DB::table('user_otps')->insert([
                'email' => $request->email,
                'details' => 'Sending confirmation.',
                'status' => 'is_confirm',
                'otp' => $otp,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    
            $res = Mail::to($request->email)->send(new OTPMail($otp,$request->request_type));
            // LOG::info('Main return:: '. json_encode($res));
            return response()->json(['message' => 'OTP sent to email.']);

        }else{

            if($request->request_type === '1'){
                $details = 'This OTP is requesting for registration.';
            }else{
                $details = 'This OTP is requesting for a password reset.';
            }
    
      
        
            $request->validate(['email' => 'required|email']);
    
            // LOG::info('Request:: '.json_encode($request->input()));
    
            $get_time = DB::table('user_otps')
                        ->select('*')
                        ->where('email',$request->email)
                        ->whereNull('updated_at')
                        ->first();
    
            if($get_time){
                DB::table('user_otps')
                ->where('email', $request->email)
                ->update([
                    'updated_at' => now(),
                ]);
            }
    
    
    
            $otp = rand(100000, 999999);
    
            DB::table('user_otps')->insert([
                'email' => $request->email,
                'details' => $details,
                'status' => $request->is_status,
                'otp' => $otp,
                'created_at' => now(),
            ]);
    
            $res = Mail::to($request->email)->send(new OTPMail($otp,$request->request_type));
            // LOG::info('Main return:: '. json_encode($res));
            return response()->json(['message' => 'OTP sent to email.']);

        }

       
    }

    

    public function verifyCode(Request $request) {

        $request->validate(['otp_code' => 'required']);

        $get_time = DB::table('user_otps')
                    ->select('id','created_at')
                    ->where('email',$request->email)
                    ->where('otp',$request->otp_code)
                    ->whereNull('updated_at')
                    ->first();

        $created_at_timestamp = strtotime($get_time->created_at);
        $current_timestamp = time();
      
        $time_difference = $current_timestamp - $created_at_timestamp;
        $getText = "";
        if ($time_difference >= 60) {
          
            $getText = "is_expired";
        } else {
            $getText = "is_verify";
            
        }

        DB::table('user_otps')
        ->where('id', $get_time->id)
        ->update([
            'status' => $getText,
            'updated_at' => now(),
        ]);

        return response()->json(['message' => $getText, 'data' => $get_time,'data_time'=>  $time_difference]);

    }

    public function checkEmail(Request $request) {
        $user = User::where('email',$request->email)->first();
        if ($user) {
           return 1;
        }
        return 0;
    }


    public function forgotPass(Request $request){
        
        $otp = 000000;
        $user = User::where('email',$request->email)->first();

        DB::table('user_otps')->insert([
            'email' => $user->email,
            'details' => 'User Forgot password!.',
            'status' => 'is_confirm',
            'otp' => $otp,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $res = Mail::to($request->email)->send(new forgotpass($user->id));
        // LOG::info('Main return:: '. json_encode($res));
        return response()->json(['message' => 'OTP sent to email.']);
        
    }
    
    public function requestPass(Request $request){
        if ($request->id) {
            $user = User::where('id',$request->id)->first();
            $user->password = password_hash($request->new_password, PASSWORD_BCRYPT);
            $user->save();

            return response()->json(['message' => 'success']);
            
        }else{
            return response()->json(['message' => 'error']);
        }
    }

    public function resetPassword(Request $request){
        $id = isset($_GET['id']) ? $_GET['id'] : '0';

        if ($id == '0') {
            return redirect('/');
        }

        $user = User::where('id',$id)->first();
        if (!$user) {
            return redirect('/');
        }

        return redirect('/request-password')->with('id',$id);
    }
    public function routeEmail(){
        return view('emails.recover');
    }
}