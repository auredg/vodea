@extends('layouts.admin')

@section('content')
<h2>
	<span>Videos <small>New video</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> All videos
		</a>
	</div>
</h2>

{{ $form }}
@stop