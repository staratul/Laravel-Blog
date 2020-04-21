
@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end mb-2">
	<a href="{{ route('posts.create') }}" class="btn btn-info">Add Posts</a>
</div>
<div class="card card-default">
<div class="card-header">Posts</div>
<div class="card-body">
	@if ($posts->count() > 0)
		<table class="table">
		<thead>
			<tr>
				<th>Images</th>
				<th>Title</th>
				<th>Category</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach ($posts as $post)
	<tr>
		<td>
			<img src="storage/{{ $post->image }}" width="100" height="100">
		</td>
		<td>
			{{ $post->title }}
		</td>
		<td>
			<a href="{{ route('categories.edit', $post->category->id) }}">
				{{ $post->category->name }}
			</a>
		</td>
		@if ($post->trashed())
			<td>
				<form action="{{ route('restore-posts', $post->id) }}" method="POST">
					@csrf
					@method('PUT')
					<button type="submit" class="btn btn-info">Restore</button>
				</form>
			</td>
		@else
			<td>
				<a href="{{ route('posts.edit', $post->id) }}" class="btn btn-info">Edit</a>
			</td>
		@endif
		<td>
			<form action="{{ route('posts.destroy', $post->id) }}" method="POST")>
				@csrf
				@method('DELETE')
				<button type="submit" class="btn btn-danger">
					{{ $post->trashed() ? 'Delete' : 'Trash' }}
				</button>
			</form>
		</td>
	</tr>
@endforeach
		</tbody>
	</table>
	@else
		<h3 class="text-center">No Post Yet</h3>
	@endif
</div>
</div>
@endsection
