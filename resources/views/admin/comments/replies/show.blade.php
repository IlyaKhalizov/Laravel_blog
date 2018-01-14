@extends('layouts.admin')

@section('content')

    <h1>Comment replies</h1>

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
        @if($replies)
            @foreach($replies as $reply)
                <tr>
                    <td>{{$reply->id}}</td>
                    <td>{{$reply->author}}</td>
                    <td>{{$reply->email}}</td>
                    <td>{{$reply->body}}</td>
                    <td><a href="{{route('home.post', $reply->comment->post->id)}}">View post</a></td>

                    <td>

                        @if($reply->is_active)

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="0">

                            <br><div class="from-group">
                                {{csrf_field()}}
                                {!! Form::submit('Block', ['class'=>'btn btn-success']) !!}
                            </div>

                            {!! Form::close() !!}

                        @else

                            {!! Form::open(['method' => 'PATCH', 'action' => ['CommentRepliesController@update', $reply->id]]) !!}

                            <input type="hidden" name="is_active" value="1">

                            <br><div class="from-group">
                                {{csrf_field()}}
                                {!! Form::submit('Allow', ['class'=>'btn btn-info']) !!}
                            </div>

                            {!! Form::close() !!}

                        @endif

                    </td>

                    <td>

                        {!! Form::open(['method' => 'DELETE', 'action' => ['CommentRepliesController@destroy', $reply->id]]) !!}

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