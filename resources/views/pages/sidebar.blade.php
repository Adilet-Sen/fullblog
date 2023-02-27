
<div class="col-md-12 col-lg-4 sidebar">
    <div class="sidebar-box search-form-wrap">
        <form action="#" class="search-form">
            <div class="form-group">
                <span class="icon fa fa-search"></span>
                <input type="text" class="form-control" id="s" placeholder="Type a keyword and hit enter ">
            </div>
        </form>
    </div>
    <div class="sidebar-box">
        <div class="bio text-center">
            <img src="/{{$admin->author->avatar}}" alt="Image Placeholder" class="img-fluid">
            <div class="bio-body">
                <h2>{{$admin->author->name}}</h2>
                <p>{{$admin->content}}</p>
                <p><a href="/articles/first-post" class="btn btn-primary btn-sm rounded">Read my bio</a></p>
                <p class="social">
                    <a href="#" class="p-2"><span class="fa fa-facebook"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-twitter"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-instagram"></span></a>
                    <a href="#" class="p-2"><span class="fa fa-youtube-play"></span></a>
                </p>
            </div>
        </div>
    </div>
    <div class="sidebar-box">
        <h3 class="heading">Popular Posts</h3>
        <div class="post-entry-sidebar">
            <ul>
                @foreach($topPosts as $post)
                    <li>
                        <a href="{{url('articles')}}/{{$post->slug}}">
                            <img src="/{{$post->image}}" alt="Image placeholder" class="mr-4">
                            <div class="text">
                                <h4>{{$post->title}}</h4>
                                <div class="post-meta">
                                    <span class="mr-2">{{$post->getDate()}}</span>
                                </div>
                            </div>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="sidebar-box">
        <h3 class="heading">Categories</h3>
        <ul class="categories">
            @foreach($categories as $cat)
            <li><a href="/category/{{$cat->slug}}">{{$cat->name}} <span>({{$cat->posts()->active()->count()}})</span></a></li>
            @endforeach
        </ul>
    </div>
    <div class="sidebar-box">
        <h3 class="heading">Tags</h3>
        <ul class="tags">
            @foreach($tags as $tag)
            <li><a href="/tag/{{$tag->slug}}">{{$tag->title}}</a></li>
            @endforeach
        </ul>
    </div>
</div>
