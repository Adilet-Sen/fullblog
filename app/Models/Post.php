<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Post extends Model
{
    use Sluggable;
    use HasFactory;

    const PUBLIC = 1;
    const DIS_PUBLIC = 0;

    protected $fillable = ['title', 'content', 'date', 'description'];

   public function scopeActive($query)
   {
       return $query->where('status', '=', 1);
   }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
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

    public function viewsCount()
    {
        $this->views = (int)++$this->views;
        $this->save();
    }

    //Standard functions
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

    public function delete_post()
    {
        $this->deleteImage();
        $this->delete();
    }

    public function getAuthorName()
    {
        if ($this->author == null) {
            return 'Author disable!';
        }
        return $this->author->name;
    }

    //Image
    public function deleteImage()
    {
        if ($this->image != null) {
            Storage::delete($this->image);
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

    //Category
    public function setCategory($id)
    {
        if ($id == null) {
            return;
        }
        $this->category_id = (int)$id;
        $this->save();
    }

    public function getCategoryTitle()
    {
        return ($this->category != null)
            ? $this->category->title
            : 'Нет категории';
    }

    public function getCategoryID()
    {
        return $this->category != null ? $this->category->id : null;
    }

    public function hasCategory()
    {
        return $this->category != null ? true : false;
    }

    public function relatedPosts()
    {
        if ($this->hasCategory()) {
            return self::where('category_id', $this->category->id)->limit(3)->get();
        }
        return false;
    }

    //Tags
    public function setTags($ids)
    {
        if ($ids == null) {
            return;
        }

        $this->tags()->sync($ids);
    }

    public function getTagsTitles()
    {
        return (!$this->tags->isEmpty())
            ? implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    //Status
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

    public function switchStatus()
    {
        if ($this->status == 0) {
            return $this->setPublic();
        }

        return $this->setDisPublic();
    }

    public function setStatus($value)
    {
        $this->status = (int)$value;
        $this->save();
    }

    //Featured
    public function setFeatured()
    {
        $this->featured = self::PUBLIC;
        $this->save();
    }

    public function setStandart()
    {
        $this->featured = self::DIS_PUBLIC;
        $this->save();
    }

    public function switchFeatured($value)
    {
        if ($value == null) {
            return $this->setStandart();
        }

        return $this->setFeatured();
    }

    public function setFeature($value)
    {
        $this->featured = (int)$value;
        $this->save();
    }

    //Date

    public function getDate()
    {
        return Carbon::createFromFormat('Y-m-d', $this->date)->format('F d, Y');
    }

    //Other functions
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

    public function related()
    {
        return self::where('category_id', $this->category->id)->limit(3)->get();
    }

    public static function getTopPosts()
    {
        return self::active()->OrderBy('views', 'desc')->limit(3)->get();
    }

    //Comments
    public function getComments()
    {
        return $this->comments()->where('status', 1)->get();
    }
}
