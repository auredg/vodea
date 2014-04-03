@extends('layouts.admin')

@section('content')

<h2>
	<span>Studios</span>
	<div class="pull-right">
		<a href="{{ route('admin.studio.create') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add new studio
		</a>
	</div>
</h2>

@if ($studios->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th></th>				
		</tr>
	</thead>
	<tbody>
		@foreach ($studios as $studio)
		<tr>
			<td>{{ $studio->id }}</span></td>
			<td>{{ $studio->name }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.studio.destroy', $studio->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.studio.show', array($studio->id)) }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-info-sign"></span> Show
					</a>
					<a href="{{ route('admin.studio.edit', array($studio->id)) }}" class="btn btn-xs btn-default">
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
	<p>No studios yet.</p>
</div>
@endif

<script>
$('.btn-danger').on('click', function() {
	return confirm('Are you certain to do that ?');
});
</script>

{{ $studios->links() }}
@stop