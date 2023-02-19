<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function prof()
    {
        return view('pages.prof');
    }

    public function index()
    {
        $posts = Post::paginate(10);
        return view('pages.index', ['posts' => $posts, 'carousel'=>Post::OrderBy('views')->limit(3)->get()]);
    }

    public function showPost($slug)
    {
        $post = Post::where('slug',$slug)->firstOrFail();
        $related = Post::where('category_id', $post->category->id)->limit(3)->get();
        return view('pages.show', ['post'=>$post,'related'=>$related ]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->paginate(10);
        return view('pages.views',['posts'=>$posts, 'tag' => $tag]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->paginate(10);
        return view('pages.views', ['posts'  =>  $posts, 'category' => $category]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

}
