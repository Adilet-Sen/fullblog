@extends('layouts.layout')

@section('content')
    <section class="site-section pt-5">
      <div class="container">
          @if(!empty($category))
        <div class="row mb-4">
          <div class="col-md-6">
            <h2 class="mb-4">Category: {{strtoupper($category->slug)}}</h2>
          </div>
        </div>
          @endif
              @if(!empty($tag))
                  <div class="row mb-4">
                      <div class="col-md-6">
                          <h2 class="mb-4">Tag: {{strtoupper($tag->slug)}}</h2>
                      </div>
                  </div>
              @endif
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            <div class="row mb-5 mt-5">

              <div class="col-md-12">
                @foreach($posts as $post)

                <div class="post-entry-horzontal">
                  <a href="/articles/{{$post->slug}}">
                    <div class="image element-animate" data-animate-effect="fadeIn" style="background-image: url(/{{$post->getImage()}});"></div>
                    <span class="text">
                      <div class="post-meta">
                        <span class="author mr-2"><img src="/{{$post->author->getImage()}}" alt="Colorlib"></span>
                        <span class="mr-2">Date:{{$post->getDate()}}</span>
                        <span class="mr-2">Category:{{$post->category->name}}</span>
                        <span class="ml-2"><span class="fa fa-comments"></span>-{{$post->comments()->count()}}</span>
                      </div>
                        <p>Author:{{$post->author->name}}</p>
                      <h2>Title:{{$post->title}}</h2>
                    </span>
                  </a>
                </div>
                <!-- END post -->
                  @endforeach
              </div>
            </div>
              {{$posts->links('paginate')}}
          </div>

          <!-- END main-content -->

          @include('pages.sidebar')
          <!-- END sidebar -->

        </div>
      </div>
    </section>
@endsection
