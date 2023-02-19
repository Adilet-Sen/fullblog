<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Post extends Model
{
    use Sluggable;
    use HasFactory;

    const PUBLIC = 1;
    const DIS_PUBLIC = 0;

    protected $fillable = ['title','content','date','description'];

    public function getTopPosts()
    {
        return self::OrderBy('views', 'desc')->limit(3)->get();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function tags()
    {
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
        );
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public static function add($fields)
    {
        $post = new static;
        $post->fill($fields);
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }

    public function delete()
    {
        $this->deleteImage();
        $this->delete();
    }

    public function deleteImage()
    {
        if ($this->image != null) {
            Storage::delete('uploads/' . $this->image);
        }
    }

    public function uploadImage($image)
    {
        if ($image == null) {
            return;
        }

        $this->deleteImage();
        $filename = $image->store('uploads');
        $this->image = $filename;
        $this->save();
    }

    public function getImage()
    {
        if ($this->image == null) {
            return '/images/no-image.png';
        }

        return $this->image;
    }

    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->tags()->sync($ids);
    }

    public function setDisPublic()
    {
        $this->status = self::DIS_PUBLIC;
        $this->save();
    }

    public function setPublic()
    {
        $this->status = self::PUBLIC;
        $this->save();
    }

    public function switchStatus($value)
    {
        if ($value == null) {
            return $this->setDisPublic();
        }

        return $this->setPublic();
    }

    public function setFeatured()
    {
        $this->is_featured = self::PUBLIC;
        $this->save();
    }

    public function setStandart()
    {
        $this->is_featured = self::DIS_PUBLIC;
        $this->save();
    }

    public function switchFeatured($value)
    {
        if ($value == null) {
            return $this->setStandart();
        }

        return $this->setFeatured();
    }

    public function setDateAttribute($value)
    {
        $date = Carbon::createFromFormat('d/m/y', $value)->format('Y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');

        return $date;
    }

    public function getCategoryTitle()
    {
        return ($this->category != null)
            ?   $this->category->title
            :   'Нет категории';
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ?   implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function getDate()
    {
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious()
    {
        return self::where('id', '<', $this->id)->max('id');
    }

    public function getPrevious()
    {
        $postID = $this->hasPrevious(); //ID
        return self::find($postID);
    }

    public function hasNext()
    {
        return self::where('id', '>', $this->id)->min('id');
    }

    public function getNext()
    {
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public function related()
    {
        return self::where('category_id', $this->category->id)->limit(3)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status',1)->get();
    }
}
