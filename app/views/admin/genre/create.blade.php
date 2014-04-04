@extends('layouts.admin')

@section('content')
<h2>
	<span>Genres <small>New genre</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.genre.index') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> Genre list
		</a>
	</div>
</h2>

{{ $form }}
@stop