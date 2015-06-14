@extends('app')

@section('content')
    <h1>{{ config('blog.title') }}</h1>
    @if (Session::has('message'))
        <div class="alert alert-info" role="alert"><p>{{ Session::get('message') }}</p></div>
    @endif
    <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
    <hr>
    <ul>
        @foreach ($posts as $post)
            <li>
                <a href="/blog/{{ $post->id }}">{{ $post->title }}</a>
                <em>({{ $post->created_at->format('M jS Y g:ia') }})</em>
                <p>
                    {{ str_limit($post->content) }}
                </p>
            </li>
        @endforeach
    </ul>
    <hr>
    {!! $posts->render() !!}
    <div>
        <a href="/blog/new"><button class="btn btn-success">Create a Post</button></a>
    </div>
@endsection