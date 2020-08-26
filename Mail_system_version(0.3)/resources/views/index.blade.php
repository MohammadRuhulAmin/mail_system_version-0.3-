<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .navStyle{
            border-style: solid;
            border-color:black;
            border-width: 5px;
            font-size: 20px;
            font-family: "Times New Roman";
        }
        .message-body{
            border-style: solid;
            border-color:black;
            border-width: 5px;
            font-size: 20px;
            font-family: "Times New Roman";
            width:60%;
            float: left;
        }
        .right-bar{
            border-style: solid;
            border-color:black;
            border-width: 5px;
            font-size: 20px;
            font-family: "Times New Roman";
            width:30%;
            float: right;
        }
    </style>
</head>
<body>
    <div class="navStyle">
        <p align="right" >{{$found_User->sender_name}} ::  {{$found_User->sender_email}}</p>
    </div>
    <br>
    <div class="message-body">
       <form action="{{url('/sent-message/senderEmail/'.$found_User->sender_email)}}" method="post">
           @csrf
           <div><p>Email To </p>
               <input type="text" name="receiver_email" size="50">
           </div>
           <div><p>Message Title </p>
               <input type="text" name="message_title" size="50">
           </div>
           <div>
               <p>Message Subject</p>
               <input type="text" name="message_subject" size="50">
           </div>
           <div>
               <p>Message Description</p>
               <textarea placeholder="Search by Mail" name="message_description" rows="7" cols="70">
            </textarea> <br> <input  type="submit">
           </div>
       </form>
    </div>
<div class="right-bar">
     <b>Mails List</b>
    <u><p>Recent Notifications !</p></u>

    @foreach($mailList as $email)
        <a href="{{url('/view-messageDetails/senderEmail/'.$email->sender_email.'/receiverEmail/'.$email->receiver_email.'/messageId/'.$email->id)}}">
            <p>{{$email->sender_email}}</p>
        </a>
        <u><p align="right">Sent Date::  {{$email->created_at}}</p></u>

    @endforeach
    <u><p>Old Notifications !</p></u>
</div>
    <br>
    <div class="right-bar">
       <p>Sent List </p>
        @foreach($mailSentList as $email)
            <a href="{{url('/view-messageDetails/senderEmail/'.$email->sender_email.'/receiverEmail/'.$email->receiver_email.'/messageId/'.$email->id)}}">
                <p>{{$email->receiver_email}}</p>
            </a>
            <u><p align="right">Sent Date::  {{$email->created_at}}</p></u>

        @endforeach

    </div>
</body>
</html>
