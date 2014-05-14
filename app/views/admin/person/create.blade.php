@extends('layouts.admin')

@section('content')
<h2>
	<span>Persons <small>New person</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.person.' . $role . '.index' }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> Person list
		</a>
	</div>
</h2>

{{ $form }}
@stop