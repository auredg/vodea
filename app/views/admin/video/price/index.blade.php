@extends('layouts.admin')

@section('content')

<h2>
	<span>Prices</span>
	<div class="pull-right">
		<a href="{{ route('admin.video.price.create') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add new price
		</a>
	</div>
</h2>

@if ($prices->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th></th>				
		</tr>
	</thead>
	<tbody>
		@foreach ($prices as $price)
		<tr>
			<td>{{ $price->id }}</span></td>
			<td>{{ $price->name }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.video.price.destroy', $price->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.video.price.show', array($price->id)) }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-info-sign"></span> Show
					</a>
					<a href="{{ route('admin.video.price.edit', array($price->id)) }}" class="btn btn-xs btn-default">
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
	<p>No prices yet.</p>
</div>
@endif

<script>
$('.btn-danger').on('click', function() {
	return confirm('Are you certain to do that ?');
});
</script>

{{ $prices->links() }}
@stop