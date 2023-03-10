@extends('admin.layout')

@section('content')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/admin/">Home</a></li>
                <li class="breadcrumb-item">Users</li>
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
                                <th scope="col">Avatar</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Admin</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td><img src="{{$user->avatar}}" alt="" width="50"></td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    @if($user->is_admin)
                                        <i class="bi bi-check-circle-fill"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill"></i>
                                    @endif
                                </td>
                                <td>
                                    @if($user->status)
                                        <i class="bi bi-check-circle-fill"></i>
                                    @else
                                        <i class="bi bi-x-circle-fill"></i>
                                    @endif
                                </td>
                                <td>
                                    <form class="d-flex align-items-center" method="POST" action="{{route('users.destroy', [$user->id])}}">
                                        <a href="{{route('users.edit',[$user->id])}}" class="btn btn-warning"><i class="bi bi-pencil-fill"></i></a>
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$users->links('paginate')}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
