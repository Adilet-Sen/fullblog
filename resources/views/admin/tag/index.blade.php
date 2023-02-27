@extends('admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item">Tags</li>
            </ol>
        </nav>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Tags</h5>

                        <table class="table datatable">
                            <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Title</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tags as $tag)
                            <tr>
                                <th scope="row">{{$tag->id}}</th>
                                <td>{{$tag->title}}</td>
                                <td>
                                    <form class="d-flex align-items-center" method="POST" action="{{route('tags.destroy', [$tag->id])}}">
                                        <a href="{{route('tags.edit',[$tag->id])}}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
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
