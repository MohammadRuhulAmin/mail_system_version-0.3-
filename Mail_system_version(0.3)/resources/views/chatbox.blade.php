<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .jumbotron{
            border-width: 5px;
            border-color: black;
            border-style: solid;
        }
        .title{
            font-size: 20px;
            font-family: "Times New Roman";
            color: blue;
            text-decoration: underline;
        }
        .subject{
            font-size: 25px;
            font-family: "Times New Roman";
            color: green;
            text-decoration: underline;
        }
        .description{
            font-size: 35px;
            color: black;
            font-family: "Times New Roman";
        }
        .sender{
            font-size: 15px;
            font-family: "Times New Roman";
        }
        .reply{
            border-style: solid;
            font-family: "Times New Roman";
            font-size: 30px;
            border-color: black;
            border-width: 5px;
        }
    </style>
</head>
<body>
    <div class="jumbotron">
        <p class="title">Title: {{$messageDetails->message_title}}</p>
        <p class="subject">Subject: {{$messageDetails->message_subject}}</p>
        <p class="description"><u>Description</u><br>{{$messageDetails->message_description}}</p>
        <p class="sender">Sender:: {{$messageDetails->sender_email}}</p>
        <p>Created  at : {{$messageDetails->created_at}}</p>
        <p>Updated at: {{$messageDetails->updated_at}}</p>
    </div>
    <br>
    @foreach($messageReply as $reply)
        <div class="jumbotron" align="right">
            <p class="description">{{$reply->replies}}</p>
            <p>Sender :: {{$reply->sender_email}}</p>
            <p>Created {{$reply->created_at}}</p>
        </div>
    @endforeach
<div align="right">
    <p>Reply</p>
   <form action="{{url('/messageId/'.$messageDetails->id.'/senderEmail/'.$messageDetails->sender_email.'/receiverEmail/'.$messageDetails->receiver_email )}}" method="post">
       @csrf
        <textarea  class="reply"  name="reply_description" rows="7" cols="70">
    </textarea> <br>
       <input  type="submit" value="Reply">
   </form>
</div>
</body>
</html>
