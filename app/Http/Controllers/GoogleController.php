<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Google_Client;
use Google_Service_Gmail;
use Google_Service_Gmail_Message;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')
            ->scopes([Google_Service_Gmail::GMAIL_COMPOSE])
            ->redirect();
    }
    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();
        $token = $user->token;

        $client = new Google_Client();
        $client->setAccessToken($token);
        
        $service = new Google_Service_Gmail($client);
        $message = new Google_Service_Gmail_Message();
        $rawMessageString = "From: your-email@gmail.com\r\n";
        $rawMessageString .= "To: recipient-email@gmail.com\r\n";
        $rawMessageString .= "Subject: Subject Here\r\n\r\n";
        $rawMessageString .= "Email body.";
        
        $rawMessage = base64_encode($rawMessageString);
        $message->setRaw($rawMessage);

        try {
            $service->users_messages->send('me', $message);
            return redirect('/')->with('success', 'Email sent successfully');
        } catch (Exception $e) {
            return redirect('/')->with('error', 'Failed to send email. ' . $e->getMessage());
        }
    }
}
