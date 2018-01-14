@extends('layouts.admin')

@section('content')

    <h1>Create Users</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminUsersController@store', 'files' => true]) !!}

    <div class="from-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="from-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::email('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="from-group">
        {!! Form::label('ia_active', 'Status:') !!}
        {!! Form::select('ia_active', array(1 => 'Active', 0 => 'Not Active'), 0, ['class'=>'form-control']) !!}
    </div>

    <div class="from-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="from-group">
        {!! Form::label('role_id', 'Role:') !!}
        {!! Form::select('role_id', $roles, 1, ['class'=>'form-control']) !!}
    </div>

    <div class="from-group">
        {!! Form::label('title', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <br><div class="from-group">
        {{csrf_field()}}
        {!! Form::submit('Create user', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif

@stop