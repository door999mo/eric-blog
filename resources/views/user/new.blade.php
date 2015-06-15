@extends('app')

@section('content')
    <h1>New User</h1>

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

    {!! Form::open(array('route' => 'user.create', 'autocomplete'=>'off')) !!}
    @include('user.form', array('is_new'=>true) )
    <button type="submit" class="btn btn-default">Create</button>
    {!! Form::close() !!}
@endsection