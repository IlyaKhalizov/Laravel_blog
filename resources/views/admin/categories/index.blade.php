@extends('layouts.admin')

@section('content')
    <h1>Categories</h1>

    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('admin.categories.edit', $category->id)}}">{{$category->name}}</a></td>
            </tr>
        @endforeach
    </table>

    <h1>Create category</h1>

    {!! Form::open(['method' => 'POST', 'action' => 'AdminCategoriesController@store', 'files' => true]) !!}

    <div class="from-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
    </div>

    <br><div class="from-group">
        {{csrf_field()}}
        {!! Form::submit('Create category', ['class'=>'btn btn-primary']) !!}
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