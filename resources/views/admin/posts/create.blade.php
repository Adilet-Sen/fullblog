@extends('admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item"><a href="/admin/posts">Posts</a></li>
                <li class="breadcrumb-item active">Create</li>
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
                    <form action="{{route('posts.store')}}" method="post">
                        @csrf
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Title:</label>
                            <div class="col-sm-10">
                                <input name="title" type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Content:</label>
                            <div class="col-sm-10">
                                <textarea name="content" id="default-editor" cols="30" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">File Upload</label>
                            <div class="col-sm-10">
                                <input name="image" class="form-control" type="file" id="formFile">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Featured:</label>
                            <div class="col-sm-10">
                                <select name="featured" class="form-select" aria-label="Default select example">
                                    <option selected value="0">Off</option>
                                    <option value="1">On</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">Category:</label>
                            <div class="col-sm-10">
                                <select name="category" class="form-select" aria-label="Default select example">
                                    <option selected value="">Null</option>
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputDate" class="col-sm-2 col-form-label">Date:</label>
                            <div class="col-sm-10">
                                .<input name="date" type="date" class="form-control">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Description:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" style="height: 100px"></textarea>
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
