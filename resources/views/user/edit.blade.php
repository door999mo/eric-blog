@extends('app')

@section('content')
    <h1>Edit {{ $user->role->name }} "{{ $user->name }}"</h1>

    <p>
        <button class="btn btn-primary" onclick="history.go(-1)">
            « Back
        </button>
    </p>

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif

    {!! Form::model($user, array('method' => 'POST', 'route' => array('user.update', $user->id))) !!}
    @include('user.form', array('is_new'=>false) )
    <button type="submit" class="btn btn-default">Save Changes</button>
    <a href="/user/{{ $user->id }}/delete">
        <button type="button" class="btn btn-danger">
            Delete
        </button>
    </a>
    {!! Form::close() !!}
@endsection