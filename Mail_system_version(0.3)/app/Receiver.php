<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;
class Receiver extends Model
{
    public function messages(){
        return $this->hasMany(Message::class);
    }
}
