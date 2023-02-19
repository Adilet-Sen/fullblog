<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function confirmation()
    {
        $this->status = 1;
        $this->save();
    }

    public function disconfirmation()
    {
        $this->status = 0;
        $this->save();
    }

    public function switchingStatus()
    {
        if ($this->status == 0){
            return $this->confirmation();
        }
        return $this->disconfirmation();
    }

    public function delete()
    {
        $this->delete();
    }
}
