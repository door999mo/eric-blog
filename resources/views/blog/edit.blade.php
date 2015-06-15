@extends('app')

@section('content')
    <h1>Edit Post</h1>

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

    {!! Form::model($post, array('method' => 'POST', 'route' => array('post.update', $post->id))) !!}
    @include('post.form', array('is_new'=>false) )
    <button type="submit" class="btn btn-default">Save Changes</button>
    {!! Form::close() !!}
@endsection