@extends('app')

@section('content')
    <h1>New Post</h1>

    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
    <p>
        <button class="btn btn-primary" onclick="history.go(-1)">
            « Back
        </button>
    </p>
    {!! Form::open(array('route' => 'post.create', 'autocomplete'=>'off')) !!}
    @include('post.form', array('is_new'=>true) )
    <button type="submit" class="btn btn-default">Create</button>
    {!! Form::close() !!}
@endsection