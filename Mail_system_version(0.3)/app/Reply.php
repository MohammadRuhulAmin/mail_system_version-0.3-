<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;
class Reply extends Model
{
    public function message(){
        return $this->belongsTo(Message::class);
    }
}
