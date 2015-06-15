<div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('email', 'Email:') !!}
    {!! Form::text('email', null, array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('password', 'New Password:') !!}
    {!! Form::password('password', array('class' => 'form-control')) !!}
</div>
<div class="form-group">
    {!! Form::label('password_confirmation', 'Confirm Password:') !!}
    {!! Form::password('password_confirmation', array('class' => 'form-control')) !!}
</div>