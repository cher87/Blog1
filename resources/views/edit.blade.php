@extends('layouts.app')

@section('content')
	
	<a href="{{ route('posts.show', [$post->getKey()]) }}">Back</a>

	<form method="post" action="{{ route('posts.update', [$post->getKey()]) }}">
		{!! csrf_field() !!}
		{{ method_field('PATCH') }}
		<textarea name="title" class="form-control">{{ $post->title }}</textarea>
		<textarea name="body" class="form-control">{{ $post->body }}</textarea>

		<button type="submit" class="btn btn-primary">Update post</button>
					
	</form>

	
@stop
