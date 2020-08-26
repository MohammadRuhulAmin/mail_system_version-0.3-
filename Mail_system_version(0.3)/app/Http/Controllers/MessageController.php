<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Sender;
use App\Reply;
use App\Receiver;
use DB;
class MessageController extends Controller
{
    public function sendMessageProcess(Request $request,$email){
        $senderInfo = DB::table('senders')->where('sender_email',$email)->first();
        $receiverInfo = DB::table('senders')->where('sender_email',$request->receiver_email)->first();
        $message = new Message();
        $message->sender_email = $email;
        $message->receiver_email = $request->receiver_email;
        $message->message_title = $request->message_title;
        $message->message_subject = $request->message_subject;
        $message->message_description = $request->message_description;
        $message->sender_id = $senderInfo->id;
        $message->receiver_id =$receiverInfo->id;
        $message->save();
        return "Message Sent Successfully! ";
    }
    public function messageAndReplyList($semail,$remail,$mid){

       // echo "sender Email ".' '.$semail."<br>";
       // echo "Receiver Email".' '.$remail."<br>";
       // echo "Message Id".' '.$mid;
        $message = Message::find($mid);
        $messageDetails = Message::find($mid);
        $messageReply = $messageDetails->replies;
        return view('chatbox')->with(['messageDetails'=>$messageDetails,'messageReply' =>$messageReply]);
    }
    public function replyPassing(Request $request,$messageId,$senderEmail,$receiverEmail){
        //return $messageId.' '.$senderEmail;
        $senderInfo = DB::table('senders')->where('sender_email',$senderEmail)->first();
        $receiverInfo = DB::table('senders')->where('sender_email',$receiverEmail)->first();
        $senderId = $senderInfo->id;
        $receiverId = $receiverInfo->id;
        $replyInfo = new Reply();
        $replyInfo->replies = $request->reply_description;
        $replyInfo->sender_email = $senderEmail;// here is a twest haha!!
        $replyInfo->receiver_email = "";
        $replyInfo->message_id = $messageId;
        $replyInfo->sender_id = $senderId;
        $replyInfo->receiver_id = $receiverId;
        $replyInfo->save();
        return "Reply is sent Successfully! ";
    }
}
