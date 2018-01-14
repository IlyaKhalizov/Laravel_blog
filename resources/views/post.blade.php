@extends('layouts.blog-post')

@section('content')

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>

    <hr>

    @if(Session::has('comment_message'))
        {{session('comment_message')}}
    @endif
    <!-- Blog Comments -->
    @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            <h4>Leave a Comment:</h4>

            {!! Form::open(['method' => 'POST', 'action' => 'PostsCommentsController@store']) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="from-group">
                {!! Form::label('body', 'Body:') !!}
                {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 3]) !!}
            </div>

            <br><div class="from-group">
                {{csrf_field()}}
                {!! Form::submit('Submit comment', ['class'=>'btn btn-primary']) !!}
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
        </div>
    @endif
    <hr>

    <!-- Posted Comments -->

    @if(count($comments))
        <!-- Comment -->
        @foreach($comments as $comment)
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object" height="64" src="{{$comment->photo}}" alt="">
            </a>
            <div class="media-body">
                <h4 class="media-heading">{{$comment->author}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                    {{$comment->body}}
            </div>
        </div>
        <!-- Comment -->
        <div id="nested-comment" class="media">
            <div class="media-body">
                <!-- Nested Comment -->
                @if (count($comment->replies) > 0)
                    @foreach($comment->replies as $reply)
                        @if($reply->is_active)
                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="64" src="{{$reply->photo}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$reply->author}}
                                        <small>{{$reply->created_at->diffForHumans()}}</small>
                                    </h4>
                                    {{$reply->body}}
                                </div>
                            </div>
                            <!-- End Nested Comment -->
                        @endif
                    @endforeach
                @endif
            </div>
        </div>

        {!! Form::open(['method' => 'POST', 'action' => 'CommentRepliesController@createReply']) !!}

        <input type="hidden" name="comment_id" value="{{$comment->id}}">

        <div class="from-group">
            {!! Form::label('body', 'Reply:') !!}
            {!! Form::textarea('body', null, ['class'=>'form-control', 'rows' => 1]) !!}
        </div>

        <br><div class="from-group">
            {{csrf_field()}}
            {!! Form::submit('Submit reply', ['class'=>'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}
        @endforeach
    @endif



@stop