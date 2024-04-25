<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\OTPMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Log;


class OTPController extends Controller
{
    public function sendOTP(Request $request)
    {
        $details = '';
        $is_status = 'is_pending';

        if($request->request_type === '1'){
            $details = 'This OTP is requesting for registration.';
        }else{
            $details = 'This OTP is requesting for a password reset.';
        }

        // $table->enum('status', ['is_cancel', 'is_used', 'is_expired', 'is_error','is_pending','is_resend'])->nullable()->default('is_pending');
    
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

        
        // $created_at = "2024-04-26 00:56:41";

        // $current_time = new DateTime(); 
        // $created_time = new DateTime($created_at);

        // $time_difference = $current_time->diff($created_time);

        // $total_minutes = $time_difference->days * 24 * 60 + $time_difference->h * 60 + $time_difference->i;

        // if ($total_minutes >= 60) {

        //     echo "More than 60 minutes have passed since the record was created.";
        // } else {
        //     echo "Less than 60 minutes have passed since the record was created.";
        // }

	    $otp = rand(100000, 999999);

        DB::table('user_otps')->insert([
            'email' => $request->email,
            'details' => $details,
            'status' => $request->is_status,
            'otp' => $otp,
            'created_at' => now(),
        ]);

        $res = Mail::to($request->email)->send(new OTPMail($otp));
	    // LOG::info('Main return:: '. json_encode($res));
        return response()->json(['message' => 'OTP sent to email.']);
    }

    function verifyCode(Request $request) {

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
}