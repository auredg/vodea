@extends('layouts.admin')

@section('content')

<div class="pull-right">
	
</div>

<h2>
	<span>Users <small>Show user {{ $user->login }}</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> User list
		</a>
		<a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-edit"></span> Edit
		</a>
	</div>
</h2>

<table class="table table-condensed table-striped">
	<thead>
		<tr>
			<th class="text-right" width="20%">Login</th>
			<th>{{ $user->login }}</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<th class="text-right">ID</th>
			<td><span class="badge">{{ $user->id }}</span></td>
		</tr>
		<tr>
			<th class="text-right">Email</th>
			<td>{{ $user->email }}</td>
		</tr>
		<tr>
			<th class="text-right">Group</th>
			<td>{{ $user->group() }}</td>
		</tr>
		<tr>
			<th class="text-right">Last connection</th>
			<td>{{ $user->last }}</td>
		</tr>
	</tbody>
</table>

@stop