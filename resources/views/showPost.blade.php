@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <!-- Adding link to edit post page -->
        <div style="margin-top: 10px; margin-left: 130 px">
            <a href="{{ route('posts.post.edit', [$post->id]) }}">Edit post</a>
        </div>
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $post->title }}</div>

                <div class="panel-body">
                    {{ $post->body }} <hr>
                    
                    <!-- List of comments -->
                    @foreach ($post->comments as $comment)
                        {{ $comment->body }} <br>
                    @endforeach

                    <!-- Add new comment -->
                    <form method="POST" action="{{ route('posts.add.comment', [$post->getKey()]) }}">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <textarea name="body" placeholder="New comment.." class="form-control"></textarea> <br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add comment</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
                
                

                
           
@endsection