@extends('layouts.admin')

@section('content')

    <hi>Media</hi>

    <table class="table">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td></td>
        </tr>
        @foreach($photos as $photo)
            <tr>
                <td>{{$photo->id}}</td>
                <td><img height="30" src="{{$photo->file}}"></td>
                <td>

                    {!! Form::open(['method' => 'DELETE', 'action' => ['AdminMediasController@destroy', $photo->id]]) !!}
                    {!! Form::submit('Delete photo', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}

                </td>
            </tr>
        @endforeach
    </table>

@stop