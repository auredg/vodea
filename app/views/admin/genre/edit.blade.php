@extends('layouts.admin')

@section('content')
<h2>
	<span>Genres <small>Edit genre {{ $genre->login }}</small></span>
</h2>

{{ $form }}
@stop