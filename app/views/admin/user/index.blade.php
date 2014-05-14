@extends('layouts.admin')

@section('content')

<h2>
	<span>Users</span>
	<div class="pull-right">
		<a href="{{ route('admin.user.create') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-plus"></span> Add new user
		</a>
	</div>
</h2>

@if ($users->count() > 0)
<table class="table table-striped">
	<thead>
		<tr>
			<th>{{ sortLink($users, 'id', 'ID') }}</th>
			<th>{{ sortLink($users, 'login', 'Login') }}</th>
			<th>{{ sortLink($users, 'email', 'Email') }}</th>
			<th>{{ sortLink($users, 'last', 'Last connection') }}</th>
			<th></th>				
		</tr>
	</thead>
	<tbody>
		@foreach ($users as $user)
		<tr>
			<td>{{ $user->id }}</span></td>
			<td>{{ $user->login }}</td>
			<td>{{ $user->email }}</td>
			<td class="text-muted">{{ $user->last }}</td>
			<td class="text-right">
				{{ Form::open(array('route' => array('admin.user.destroy', $user->id), 'method' => 'delete')) }}
					<button type="submit" class="btn btn-xs btn-danger">
						<span class="glyphicon glyphicon-remove"></span> Delete
					</button>
					<a href="{{ route('admin.user.show', array($user->id)) }}" class="btn btn-xs btn-info">
						<span class="glyphicon glyphicon-info-sign"></span> Show
					</a>
					<a href="{{ route('admin.user.edit', array($user->id)) }}" class="btn btn-xs btn-default">
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
	<p>No users yet.</p>
</div>
@endif

<script>
$('.btn-danger').on('click', function() {
	return confirm('Are you certain to do that ?');
});
</script>

{{ $users->links() }}
@stop