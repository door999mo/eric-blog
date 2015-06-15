@extends('app')

@section('content')
    <h1>User Management</h1>
    @if (Session::has('message'))
        <div class="alert alert-info" role="alert"><p>{{ Session::get('message') }}</p></div>
    @endif
    <h5>Page {{ $users->currentPage() }} of {{ $users->lastPage() }}</h5>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><a href="/user/{{ $user->id }}">{{ $user->name }}</a></td>
                <td>{{ $user->role->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('M jS Y g:ia') }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {!! $users->render() !!}
    @if(Auth::check())
        @if(Auth::user()->role_id==\App\Role::ADMIN)
            <div>
                <a href="/user/new"><button class="btn btn-success">Create a user</button></a>
            </div>
        @endif
    @endif
@endsection