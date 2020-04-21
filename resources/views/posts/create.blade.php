@extends('layouts.app')

@section('content')
	<div class="card card-default">
		<div class="card-header">
			{{ isset($post) ? 'Edit Post' : 'Create Posts' }}
		</div>
		<div class="card-body">
			@include('partials.errors')
			<form action="{{ isset($post) ? route('posts.update', $post->id) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
				@csrf
				@if (isset($post))
					@method('PUT')
				@endif
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" id="title" value="{{ isset($post) ? $post->title : '' }}">
				</div>
				<div class="form-group">
					<label for="description">Description</label>
					<textarea name="description" class="form-control" id="description">{{ isset($post) ? $post->description : '' }}</textarea>
				</div>
				<div class="form-group">
					<label for="content">Content</label>
					<input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : '' }}">
  					<trix-editor input="content"></trix-editor>
				</div>
				<div class="form-group">
					<label for="published_at">Published At</label>
					<input type="text" name="published_at" class="form-control" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}">
				</div>
				@if (isset($post))
					<div class="form-group">
						<img src="/storage/{{ $post->image }}" width="100" height="100">
					</div>
				@endif
				<div class="form-group">
					<label for="image">Image</label><br>
					<input type="file" name="image" id="image">
				</div>
				<div class="form-group">
					<label for="category">Category</label>
					<select name="category" id="category" class="form-control">
						@foreach ($categories as $category)
							<option value="{{ $category->id }}"
								@if (isset($post))
									@if ($category->id == $post->category_id)
										selected
									@endif
								@endif
								>
								{{ $category->name }}
							</option>
						@endforeach
					</select>
				</div>
			@if ($tags->count() > 0)
				<div class="form-group">
					<label for="tags">Tag</label>
					<select class="form-control tags-selector" name="tags[]" id="tags" multiple="multiple">
						@foreach ($tags as $tag)
							<option value="{{ $tag->id }}"
								@if (isset($post))
									@if ($post->hasTag($tag->id))
									selected="selected" 
									@endif
								@endif
								>
								{{ $tag->name }}
							</option>
						@endforeach
					</select>
				</div>
			@endif
				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary rounded-0" value="{{isset($post) ? 'Update Post' : 'Create Post'}}">
				</div>
			</form>
		</div>
	</div>
@endsection

@section('scripts')
	<script src="{{ asset('js/trix.js') }}"></script>
	<script src="{{ asset('js/flatpickr.js') }}"></script>
	<script src="{{ asset('js/select2.min.js') }}"></script>

	<script>
		flatpickr('#published_at', {
			enableTime: true,
			enableSeconds: true
		});

		$(document).ready(function() {
		    $('.tags-selector').select2();
		});
	</script>
@endsection

@section('css')
	<link href="{{ asset('css/trix.css') }}" rel="stylesheet">
	<link href="{{ asset('css/flatpickr.min.css') }}" rel="stylesheet">
	<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection