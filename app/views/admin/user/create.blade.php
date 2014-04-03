@extends('layouts.admin')

@section('content')
<h2>
	<span>Users <small>New user</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> User list
		</a>
	</div>
</h2>

{{ $form }}
@stop