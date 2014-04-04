@extends('layouts.admin')

@section('content')

@include('admin/video/title', array('current' => 'price'))

<h3>
	<span>Prices</span>
	<div class="pull-right">
		<a href="{{ route('admin.video.{video}.price.create', array($video->id)) }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add new price
		</a>
	</div>
</h3>

@if ($prices->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>ID</th>
			<th>Type</th>
			<th>Price</th>
			<th>Tax</th>
			<th>Promotion</th>
			<th>Start At</th>
			<th>End At</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		@foreach ($prices as $price)
		<tr>
			<td>{{ $price->id }}</span></td>
			<td>{{ $price->type() }}</td>
			<td>{{ $price->price }}</td>
			<td>{{ $price->tax }}</td>
			<td>{{ $price->is_promotion ? '<span class="label label-success">PROMO</span>' : '' }}</td>
			<td>{{ $price->start_at }}</td>
			<td>{{ $price->end_at }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.video.{video}.price.destroy', $video->id, $price->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.video.{video}.price.edit', array($video->id, $price->id)) }}" class="btn btn-xs btn-default">
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