@extends('layouts.admin')

@section('main')

<div class="form-container">

    <h1>Edit User</h1>
    {{ Form::model($user, array('method' => 'PATCH', 'route' => array('users.update', $user->id))) }}
        <div class="form-group">
            {{ Form::label('first_name', 'First Name:') }}
            {{ Form::text('first_name', $user->first_name, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('last_name', 'Last Name:') }}
            {{ Form::text('last_name', $user->last_name, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', $user->email, array('class' => 'form-control')) }}
        </div>
        <div class="form-group">
        {{ Form::submit('Update', array('class' => 'btn btn-info')) }}
        {{ Form::btnLink('Cancel', 'users', array('class'=>'btn btn-default')) }}
        </div>
    {{ Form::close() }}

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissable error-alert ">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <ul>
            {{ implode('', $errors->all('<li class="error">:message</li>')) }}
        </ul>
    </div>
    @endif
</div>
@stop
