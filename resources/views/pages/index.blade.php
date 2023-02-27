@extends('layouts.layout')

@section('content')

    <section class="site-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">

                    <div class="owl-carousel owl-theme home-slider">
                        @foreach($carousel as $post)
                        <div>
                            <a href="/articles/{{$post->slug}}" class="a-block d-flex align-items-center height-lg" style="background-image: url('{{$post->image}}'); ">
                                <div class="text half-to-full">
                                    <span class="category mb-5">@if($post->hasCategory()) {{$post->category->name}} @else Нет категории. @endif</span>
                                    <div class="post-meta">

                                        <span class="author mr-2"><img src="/{{$post->author->getImage()}}" alt="Colorlib"></span>&bullet;
                                        <span class="mr-2">Date:{{$post->getDate()}}</span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span>-{{$post->comments()->count()}}</span>
                                        <p>Author:{{$post->getAuthorName()}}</p>
                                    </div>
                                    <h3>Title:{{$post->title}}</h3>
                                    <p>{{$post->description}}</p>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>

        </div>


    </section>

    <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                  @foreach($posts as $post)

                <div class="col-md-6">
                  <a href="/articles/{{$post->slug}}" class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="/{{$post->getImage()}}" alt="Image placeholder">
                    <div class="blog-content-body">
                      <div class="post-meta">
                        <span class="author "><img src="{{$post->author->getImage()}}" alt="Colorlib"></span>
                        <span class="ml-2">Date:{{$post->getDate()}}</span>
                        <span class="ml-2">Category:{{$post->category->name}}</span>
                        <span class="ml-2"><span class="fa fa-comments"></span>-{{$post->comments()->count()}}</span>
                      </div>
                        <p>
                            Auther:{{$post->author->name}}
                        </p>
                      <h2>Title:{{$post->title}}</h2>
                    </div>
                  </a>
                </div>
                  @endforeach
              </div>

              <div class="row mt-5">
                <div class="col-md-12 text-center">
                    {{$posts->links('paginate')}}
                </div>
              </div>
            </div>
            @include('pages.sidebar')

          </div>
        </div>
      </section>
@endsection
