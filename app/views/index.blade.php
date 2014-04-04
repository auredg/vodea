@extends('layouts.front')

@section('content')
<div class="page-header">
	<h1>VODEA CMS <br /><small>Work in progress...</small></h1>
</div>

{{ link_to('admin', 'Admin access') }}

<h3>Latest videos</h3>

@foreach ($latest_videos as $video)
<p><a href="{{ route('video-details', array($video->type, $video->slug)) }}">{{ $video->name }}</a></p>
@endforeach

@stop