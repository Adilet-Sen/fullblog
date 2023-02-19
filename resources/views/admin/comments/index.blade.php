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
                                <th scope="col">Massage</th>
                                <th scope="col">User</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($comments as $comment)
                            <tr>
                                <th scope="row">{{$comment->id}}</th>
                                <td>{{$comment->message}}</td>
                                <td>{{$comment->author->name}}</td>
                                <td>
                                    @if($comment->status)
                                        <a href="/admin/posts/edit/" class="btn btn-success"><i class="bi bi-check-circle-fill"></i></a>
                                    @else
                                        <a href="/admin/posts/edit/" class="btn btn-warning"><i class="bi bi-x-circle-fill"></i></a>
                                    @endif
                                    <a href="/admin/posts/edit/" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
