<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    public static function add($mail)
    {
        $sub = new static;
        $sub->email = $mail;
        $sub->save();

        return $sub;
    }

    public function generateToken()
    {
        $this->token = str_random(64);
        $this->save();
    }

    public function remove()
    {
        $this->delete();
    }
}
