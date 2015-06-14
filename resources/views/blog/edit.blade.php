@extends('app')

@section('content')
    <h1>Edit Post</h1>

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
    {!! Form::model($post, array('method' => 'POST', 'route' => array('post.update', $post->id))) !!}
    @include('post.form', array('is_new'=>false) )
    <button type="submit" class="btn btn-default">Save Changes</button>
    {!! Form::close() !!}
@endsection