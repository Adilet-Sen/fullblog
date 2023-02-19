@extends('admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item">Posts</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Datatables</h5>

                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Date</th>
                                <th scope="col">Image</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Category</th>
                                <th scope="col">User</th>
                                <th scope="col">Featured</th>
                                <th scope="col">Views count</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td scope="row">{{$post->id}}</td>
                                <td>2023-3-18</td>
                                <td><img src="{{$post->image}}" alt="" width="50"></td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->description}}</td>
                                <td>{{$post->category->name}}</td>
                                <td>{{$post->author->name}}</td>
                                <td>
                                    @if($post->featured)
                                        <i class="bi bi-bookmark-star-fill"></i>
                                    @else
                                        <i class="bi bi-bookmark-x-fill"></i>
                                    @endif
                                </td>
                                <td>
                                    {{$post->views}}
                                </td>
                                <td>
                                    <a href="/admin/posts/{{$post->id}}/edit/" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                    <a href="/admin/posts/{{$post->id}}/delete" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$posts->links('paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
