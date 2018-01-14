@extends('layouts.admin')

@section('content')

    <h1>Posts</h1>

    <table class="table">
        <tr>
            <td>Id</td>
            <td>User</td>
            <td>Category</td>
            <td>Photo</td>
            <td>Title</td>
            <td>Body</td>
            <td></td>
            <td></td>
        </tr>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category ? $post->category->name : 'No category'}}</td>
                <td><img height="30" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}"></td>
                <td><a href="{{route('admin.posts.edit', $post->id)}}">{{$post->title}}</a></td>
                <td>{{str_limit($post->body, 7)}}</td>
                <td><a href="{{route('home.post', $post->id)}}">View post</a></td>
                <td><a href="{{route('admin.comments.show', $post->id)}}">View comments</a></td>
            </tr>
        @endforeach
    </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->render()}}
        </div>
    </div>

@stop