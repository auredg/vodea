@extends('layouts.admin')

@section('content')

@include('admin/video/title', array('current' => 'price'))

<h3>Prices <small>Create new</small></h3>

{{ $form }}
@stop