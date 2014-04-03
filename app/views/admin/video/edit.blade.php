@extends('layouts.admin')

@section('content')
<h2>
	<span>Videos <small>Edit video {{ $video->name }}</small></span>
</h2>

{{ $form }}
@stop