@extends('layouts.admin')

@section('content')
<h2>
	<span>Studios <small>New studio</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.studio.index') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> Studio list
		</a>
	</div>
</h2>

{{ $form }}
@stop