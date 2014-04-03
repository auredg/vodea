@extends('layouts.admin')

@section('content')

@include('admin/video/title', array('current' => 'video'))

<div class="pull-right">
	<a href="{{ route('admin.video.edit', $video->id) }}" class="btn btn-sm btn-default">
		<span class="glyphicon glyphicon-edit"></span> Edit
	</a>
</div>

<table class="table table-condensed table-striped">
	<thead>
		<tr>
			<th class="text-right" width="20%">Name</th>
			<th>{{ $video->name }}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th class="text-right">ID</th>
			<td><span class="badge">{{ $video->id }}</span></td>
		</tr>
		<tr>
			<th class="text-right">Active</th>
			<td>{{ activeLabel($video->active) }}</span></td>
		</tr>
		<tr>
			<th class="text-right">Type</th>
			<td>{{ $video->type() }}</td>
		</tr>
		<tr>
			<th class="text-right">Title</th>
			<td>{{ $video->title }}</td>
		</tr>
		<tr>
			<th class="text-right">Summary</th>
			<td>{{ $video->summary }}</td>
		</tr>
		<tr>
			<th class="text-right">Description</th>
			<td>{{ $video->description }}</td>
		</tr>
	</tbody>
</table>

@stop