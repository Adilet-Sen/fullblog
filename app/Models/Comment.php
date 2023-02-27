<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Comment extends Model
{
    use HasFactory;

    protected $guarded =[];

    public function add($value){
        $post = new static;
        $post->fill($value);
        $post->user_id = 1; //Auth::user()->id;
        $post->save();
    }

    public function commentable(): MorphTo
    {
        return $this->morphTo();
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function getDate(){
        return Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at)->format('F d, Y, H:i');
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

    public function delete_com()
    {
        $this->delete();
    }
}
