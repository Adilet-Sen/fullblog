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
                                <th scope="col">Status</th>
                                <th scope="col">Views count</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td scope="row">{{$post->id}}</td>
                                    <td>2023-3-18</td>
                                    <td><img src="/{{$post->getImage()}}" alt="" width="50"></td>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->description}}</td>
                                    <td>@if($post->hasCategory())  {{$post->category->name}} @else Category
                                        disable!@endif</td>
                                    <td>{{$post->getAuthorName()}}</td>
                                    <td>
                                        @if($post->featured)
                                            <button class="btn btn-success">
                                                <i class="bi bi-check-circle-fill"></i>
                                            </button>
                                        @else
                                            <button class="btn btn-danger">
                                                <i class="bi bi-x-circle-fill"></i>
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($post->status)
                                            <a href="/admin/posts/switch/{{$post->id}}" class="btn btn-success"><i
                                                    class="bi bi-check-circle-fill"></i></a>
                                        @else
                                            <a href="/admin/posts/switch/{{$post->id}}/true" class="btn btn-danger"><i
                                                    class="bi bi-x-circle-fill"></i></a>
                                        @endif
                                    </td>
                                    <td>
                                        {{$post->views}}
                                    </td>
                                    <td>
                                        <form class="d-flex align-items-center"
                                              action="{{route('posts.destroy', [$post->id])}}" method="POST">
                                            <a href="/admin/posts/{{$post->id}}/edit" class="btn btn-warning"><i
                                                    class="bi bi-pencil-fill"></i></a>
                                            @method('delete')
                                            @csrf

                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                    class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                        </form>
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
