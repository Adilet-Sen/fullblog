@extends('admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/posts">Posts</a></li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add Posts</h5>

                        <!-- General Form Elements -->
                        <form action="{{route('posts.update', [$post->id])}}" method="post"
                              enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Title:</label>
                                <div class="col-sm-10">
                                    <input name="title" value="{{$post->title}}" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
                                <div class="col-sm-10">
                                    <textarea name="description" class="form-control"
                                              style="height: 100px">{{$post->description}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputText" class="col-sm-2 col-form-label">Content:</label>
                                <div class="col-sm-10">
                                    <textarea name="content" id="default-editor" cols="30" class="form-control"
                                              rows="10">{{$post->content}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                                <div class="col-sm-10">
                                    <img src="{{$post->getImage()}}" alt="" width="150">
                                    <input name="image" class="form-control" type="file" id="formFile">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Featured:</label>
                                <div class="col-sm-10">
                                    <select name="featured" class="form-select" aria-label="Default select example">
                                        <option value="0">Off</option>
                                        <option value="1">On</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Status:</label>
                                <div class="col-sm-10">
                                    <select name="status" class="form-select" aria-label="Default select example">
                                        <option value="0">Off</option>
                                        <option value="1">On</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Tags:</label>
                                <div class="col-sm-10">
                                    <select class="selectpicker" name="tags[]" multiple data-live-search="true"
                                            data-live-search-placeholder="Search" data-actions-box="true">
                                        <optgroup label="Selects tags:">
                                            @foreach($tags as $tag)
                                                <option value="{{$tag->id}}">{{$tag->title}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">Category:</label>
                                <div class="col-sm-10">
                                    <select name="category_id" class="form-select" aria-label="Default select example">
                                        @if($post->hasCategory())
                                            <option selected
                                                    value="{{$post->category->id}}">{{$post->category->name}}</option>
                                        @else
                                            <option selected value="">Null</option>
                                        @endif
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="inputDate" class="col-sm-2 col-form-label">Date:</label>
                                <div class="col-sm-10">
                                    <input name="date" value="{{$post->date}}" type="date" class="form-control">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label"></label>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Submit Form</button>
                                </div>
                            </div>

                        </form><!-- End General Form Elements -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
