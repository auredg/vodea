@extends('layouts.admin')

@section('content')
<h2>
	<span>Studios <small>Edit studio {{ $studio->login }}</small></span>
</h2>

{{ $form }}
@stop