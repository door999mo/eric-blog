@extends('app')

@section('content')
    <h1>{{ $post->title }}</h1>
    <h5>{{ $post->created_at->format('M jS Y g:ia') }}</h5>
    <hr>
    {!! nl2br(e($post->content)) !!}
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