@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div style="float: left; margin-left: 100 px">Latest posts</div>
                    <div style="/*float: right;*/ margin-left: 900 px">
                        <a href="{{ route('sortbytitle') }}">Sort by title</a>
                    </div>
                </div>

                <div class="panel-body">
                    @foreach ($posts as $post)
                        <div style="margin: 5px">
                            <a href="{{ $post->path() }}">{{ $post->title }}</a>
                            <p style="font-size: 10px; text-align: right; float: right">{{ date('F d, Y', strtotime($post->created_at)) }}</p> <br>
                        </div>
                        <hr>
                    @endforeach

                    <!-- <h4>Add new post</h4> -->
                    <form method="POST" action="{{ route('posts.add') }}">
                    {{!! csrf_field() !!}}
                        <div class="form-group">
                            <textarea name="title" placeholder="Enter title.." class="form-control"></textarea> <br>
                            <textarea name="body" placeholder="Enter text.." class="form-control"></textarea> <br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Add post</button>
                        </div>
                    </form>
           
@endsection
