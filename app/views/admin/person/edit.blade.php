@extends('layouts.admin')

@section('content')
<h2>
	<span>Persons <small>Edit person {{ $person->login }}</small></span>
</h2>

{{ $form }}
@stop