@extends('layouts.admin')

@section('content')

<h2>
	<span>Videos</span>
	<div class="pull-right">
		<a href="{{ route('admin.video.create') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add new video
		</a>
	</div>
</h2>

@if ($videos->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>{{ sortLink($videos, 'id', 'ID') }}</th>
			<th>{{ sortLink($videos, 'active', 'Active') }}</th>
			<th>{{ sortLink($videos, 'type', 'Type') }}</th>
			<th>{{ sortLink($videos, 'name', 'Name') }}</th>
			<th>{{ sortLink($videos, 'title', 'Title') }}</th>
			<th>{{ sortLink($videos, 'created_at', 'Created') }}</th>
			<th>{{ sortLink($videos, 'updated_at', 'Updated') }}</th>
			<th></th>				
		</tr>
	</thead>
	<tbody>
		@foreach ($videos as $video)
		<tr>
			<td>{{ $video->id }}</td>
			<td>{{ activeLabel($video->active) }}</td>
			<td>{{ $video->type() }}</td>
			<td>{{ $video->name }}</td>
			<td>{{ $video->title }}</td>
			<td class="text-muted">{{ $video->created_at }}</td>
			<td class="text-muted">{{ $video->updated_at }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.video.destroy', $video->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.video.show', array($video->id)) }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-info-sign"></span> Show
					</a>
					<a href="{{ route('admin.video.edit', array($video->id)) }}" class="btn btn-xs btn-default">
						<span class="glyphicon glyphicon-edit"></span> Edit
					</a>
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@else
<div class="alert alert-warning">
	<p>No videos yet.</p>
</div>
@endif

<script>
$('.btn-danger').on('click', function() {
	return confirm('Are you certain to do that ?');
});
</script>

{{ $videos->links() }}
@stop