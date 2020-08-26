<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Reply;
class Message extends Model
{
    public function replies(){
        return $this->hasMany(Reply::class);
    }
    public function receiver(){
        return $this->belongsTo(Receiver::class);
    }
    public function sender(){
        return $this->belongsTo(Sender::class);
    }
}
