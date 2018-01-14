@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_user'))
        <p>{{session('deleted_user')}}</p>
    @endif

    <h1>Users</h1>

    <table class="table">
        <tr>
            <td>Id</td>
            <td>Photo</td>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Status</td>
            <td>Created</td>
            <td>Updated</td>
        </tr>
        @if($users)
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><img height="50" src="{{$user->photo->file}}"></td>
                    <td><a href="{{route('admin.users.edit', $user->id)}}">{{$user->name}}</a></td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role ? $user->role->name : 'User has no role'}}</td>
                    <td>{{$user->ia_active}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                </tr>
            @endforeach
        @endif
    </table>

@stop