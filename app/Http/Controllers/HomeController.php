<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
       public function index()
    {
        $posts = Post::active()->paginate(10);
        return view('pages.index', ['posts' => $posts, 'carousel'=>Post::OrderBy('views')->limit(3)->get()]);
    }

    public function showPost($slug)
    {
        $post = Post::active()->where('slug',$slug)->firstOrFail();
        $post->increment('views');
        return view('pages.show', ['post'=>$post,'related'=> $post->relatedPosts()]);
    }

    public function tag($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->active()->paginate(10);
        return view('pages.views',['posts'=>$posts, 'tag' => $tag]);
    }

    public function category($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $posts = $category->posts()->active()->paginate(10);
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

    public function contactStore(ContactStoreHomeRequest $request)
    {
        dd($request->all());
    }

}
