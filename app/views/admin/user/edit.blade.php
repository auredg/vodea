@extends('layouts.admin')

@section('content')
<h2>
	<span>Users <small>Edit user {{ $user->login }}</small></span>
</h2>

{{ $form }}
@stop