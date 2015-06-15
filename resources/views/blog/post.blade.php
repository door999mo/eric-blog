@extends('app')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info" role="alert"><p>{{ Session::get('message') }}</p></div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            @foreach($errors->all() as $error)
                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                <span class="sr-only">Error:</span>
                {{ $error }}<br/>
            @endforeach
        </div>
    @endif

    <h1>{{ $post->title }}</h1>
    <h5>{{ $post->created_at->format('M jS Y g:ia') }}</h5>
    <hr>
    {!! $post->content !!}
    <hr>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Comment</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($post->comments as $comment)
            <tr>
                <td>{{ $comment->user->name }}</td>
                <td>{!! $comment->comment !!}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! Form::open(array('route' => ['comment.create', $post->id], 'autocomplete'=>'off')) !!}
    @include('comment.form', array('is_new'=>true) )
    <button type="submit" class="btn btn-success">Comment</button>
    {!! Form::close() !!}
    <hr>

    <button class="btn btn-primary" onclick="history.go(-1)">
        « Back
    </button>
    @if(Auth::check())
        @if(Auth::user()->role_id==\App\Role::ADMIN)
            <a href="/blog/{{ $post->id }}/edit">
                <button class="btn btn-info">
                    Edit
                </button>
            </a>
            <a href="/blog/{{ $post->id }}/delete">
                <button class="btn btn-danger">
                    Delete
                </button>
            </a>
        @endif
    @endif
@endsection