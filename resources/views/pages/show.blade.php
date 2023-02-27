@extends('layouts.layout')

@section('content')
    <section class="site-section py-lg">
      <div class="container">

        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            <img src="/{{$post->getImage()}}" alt="Image" class="img-fluid mb-5">
             <div class="post-meta">
                        <span class="author mr-2"><img src="/{{$post->author->avatar}}" alt="Colorlib" class="mr-2"> Colorlib</span>&bullet;
                        <span class="mr-2">{{$post->getDate()}}</span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span> 3</span>
                      </div>
            <h1 class="mb-4">{{$post->title}}</h1>
            <a class="category mb-5" href="#">@if($post->hasCategory()) {{$post->category->name}} @else Not Category! @endif</a>

            <div class="post-content-body">
               <?= $post->content?>
            </div>

            <div class="pt-5">
              <p>Categories: @if($post->hasCategory()) <a href="/{{$post->category->slug}}">{{$post->category->name}}</a> @else Not Category! @endif Tags: @foreach($post->tags as $tag) <a href="/{{$tag->slug}}">{{$tag->title}}</a> @endforeach </p>
            </div>
            @if($post->comments->count())
            <div class="pt-5">
              <h3 class="mb-5">Comments: {{$post->comments->count()}}</h3>
              <ul class="comment-list">
                @foreach($post->comments as $comment)
                    @if($comment->status == 1)
                  <li class="comment">
                  <div class="vcard">
                    <img src="/{{$comment->author->getImage()}}" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3>{{$comment->author->name}}</h3>
                    <div class="meta">{{$comment->getDate()}}</div>
                    <p>{{$comment->message}}</p>
                      <p><a href="#sms" class="reply rounded list-group-item-action">Reply</a></p>
                  </div>
                </li>
                      @endif
                  @endforeach

              </ul>
              <!-- END comment-list -->
            </div>
              @else
              <div class="pt-5">
                  <h3 class="mb-5">No Comments</h3>
              </div>
              @endif
              @if(Auth::check())
                  <div class="comment-form-wrap pt-5" id="sms">
                      <h3 class="mb-5">Leave a comment</h3>
                      <form action="{{url('/comments')}}/{{$post->id}}" method="post" class="p-5 bg-light">
                          @csrf
                          <input name="user_id" value="{{Auth::user()->id}}" type="hidden" class="form-control" id="email">
                          <div class="form-group">
                              <label for="message">Message</label>
                              <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                              <input type="submit" value="Post Comment" class="btn btn-primary">
                          </div>

                      </form>
                  </div>
              @else
                  <div class="comment-form-wrap pt-5">
                      <p class="mb-5">
                          You must be <a href="/login">logged in</a> to leave a comment!</p>
                  </div>
              @endif
          </div>

          <!-- END main-content -->

            <!-- Sidebar section -->
          @include('pages.sidebar')
          <!-- END sidebar -->

        </div>
      </div>
    </section>

    <!-- Related section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mb-3 ">Related Post</h2>
                </div>
            </div>
            <div class="row">
                @if($related)
                @foreach($related as $post)
                <div class="col-md-6 col-lg-4">
                    <a href="#" class="a-block sm d-flex align-items-center height-md" style="background-image: url('/{{$post->getImage()}}'); ">
                        <div class="text">
                            <div class="post-meta">
                                <span class="category">{{$post->category->name}}</span>
                                <span class="mr-2">{{$post->getDate()}} </span> &bullet;
                                <span class="ml-2"><span class="fa fa-comments"></span> {{$post->comments->count()}}</span>
                            </div>
                            <h3>{{$post->title}}</h3>
                        </div>
                    </a>
                </div>
                @endforeach
                @endif

            </div>
        </div>


    </section>

    <!-- END section -->
@endsection
