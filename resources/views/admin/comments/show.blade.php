@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>

    <table class="table">
        <tr>
            <td>Id</td>
            <td>Author</td>
            <td>Email</td>
            <td>Body</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}}</td>
                    <td>{{$comment->body}}</td>
                    <td><a href="{{route('home.post', $comment->post->id)}}">View post</a></td>
                    <td><a href="{{route('admin.comment.replies.show', $comment->id)}}">View replies</a></td>

                    <td>

                        @if($comment->is_active)

                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostsCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <br><div class="from-group">
                                {{csrf_field()}}
                                {!! Form::submit('Block', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['PostsCommentsController@update', $comment->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <br><div class="from-group">
                                {{csrf_field()}}
                                {!! Form::submit('Allow', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method' => 'DELETE', 'action' => ['PostsCommentsController@destroy', $comment->id]]) !!}

                        <br><div class="from-group">
                            {{csrf_field()}}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        </div>

                        {!! Form::close() !!}

                    </td>

                </tr>
            @endforeach
        @endif
    </table>

@stop