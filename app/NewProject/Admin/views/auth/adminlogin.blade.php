@extends('layouts.adminauth')

@section('main')

<div class="form-container">

    <div class="panel panel-primary login-panel">
        <div class="panel-heading"><h1>CarePilot Admin Login</h1></div>
        <div class="panel-body">
            {{ Form::open(array('route' => 'adminlogin')); }}
                <div class="form-group">
                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', Input::get('email'), array('class' => 'form-control', 'placeholder="Enter Email"')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder="Password"')) }}
                </div>
                {{ Form::submit('Submit', array('class' => 'btn btn-default')) }}
            {{ Form::close() }}
        </div>
    </div>

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