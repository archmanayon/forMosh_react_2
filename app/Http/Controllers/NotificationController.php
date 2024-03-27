<?php

namespace App\Http\Controllers;

use App\Mail\MyEmail;
use App\Models\User;
use App\Notifications\UploadNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{
    public function send(Request $request){
        $subject = $request[0]["subject"];

        $sending = Mail::to('montontami112@gmail.com')
            ->send(new MyEmail($request));

        return $sending ? "successfully sent to". $request[0]["name"] : "error";

    }

    public function notify(Request $request){
        
        $users = User::all();

        Notification::send($users, 
            new UploadNotification(
                $users, 'EC - second param ni ha, pwedelink ni'
                )
        );

        return response([
            "message_ec" => "EC: Successful Notification"
        ], 200);
    }
}

