@extends('app')

@section('content')
    <h1>New Comment for "{{ $post->title }}"</h1>

    <p>
        <button class="btn btn-primary" onclick="history.go(-1)">
            « Back
        </button>
    </p>


@endsection