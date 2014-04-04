@extends('layouts.admin')

@section('content')

<h2>
	<span>Persons</span>
	<div class="pull-right">
		<a href="{{ route('admin.person.{role}.create', array($role)) }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add new person
		</a>
	</div>
</h2>

@if ($persons->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th></th>				
		</tr>
	</thead>
	<tbody>
		@foreach ($persons as $person)
		<tr>
			<td>{{ $person->id }}</span></td>
			<td>{{ $person->name }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.person.destroy', $person->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.person.{role}.show', array($role, $person->id)) }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-info-sign"></span> Show
					</a>
					<a href="{{ route('admin.person.{role}.edit', array($role, $person->id)) }}" class="btn btn-xs btn-default">
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
	<p>No persons yet.</p>
</div>
@endif

<script>
$('.btn-danger').on('click', function() {
	return confirm('Are you certain to do that ?');
});
</script>

{{ $persons->links() }}
@stop