<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Sender;
use App\Receiver;
use App\Message;
class AccessController extends Controller
{
    public function verifyUser(Request $request){
        $email = $request->userEmail;
        $password = $request->userPassword;
        $fuser = DB::table('senders')->where(['sender_email'=>$email,'password'=>$password])->get();
        if(count($fuser) == 1){

            $found_User = DB::table('senders')->where('sender_email',$email)->first();
            // who mailed me list showing
            $receiverId = $found_User->id;
            $receiverinfo = Receiver::find($receiverId);
            $mailList =  $receiverinfo->messages;

            //whome i mailed
            $senderId = $found_User->id;
            $senderInfo = Sender::find($senderId);
            $mailSentList = $senderInfo->messages;

            return view('index')->with(['found_User'=>$found_User,'mailList'=>$mailList,'mailSentList'=>$mailSentList]);
        }
        else return "you are not logged in ";
    }
    public function registration(Request $request){
        $sender = new  Sender();
        $sender->sender_name = $request->userName;
        $sender->sender_email = $request->userEmail;
        $sender->password = $request->userPassword;
        $sender->save();
        $receiver = new Receiver();
        $receiver->receiver_name= $request->userName;
        $receiver->receiver_email = $request->userEmail;
        $receiver->password = $request->userPassword;
        $receiver->save();
        return "Successful Registration !";
    }
}
