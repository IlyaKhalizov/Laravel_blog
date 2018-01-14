@extends('layouts.admin')

@section('content')

    <h1>Create category</h1>

    {!! Form::model($category, ['method' => 'PATCH', 'action' => ['AdminCategoriesController@update', $category->id]]) !!}

    <div class="from-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <br><div class="from-group">
        {{csrf_field()}}
        {!! Form::submit('Update category', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminCategoriesController@destroy', $category->id]]) !!}
    {!! Form::submit('Delete category', ['class'=>'btn btn-danger']) !!}
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