<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::view('/front-index','registerlogin');
Route::post('/login','AccessController@verifyUser');
Route::post('/register-insertion','AccessController@registration');
Route::post('/sent-message/senderEmail/{email}','MessageController@sendMessageProcess');
Route::get('/view-messageDetails/senderEmail/{semail}/receiverEmail/{remail}/messageId/{mid}','MessageController@messageAndReplyList');
Route::post('/messageId/{messageId}/senderEmail/{senderEmail}/receiverEmail/{receiverEmail}','MessageController@replyPassing');
