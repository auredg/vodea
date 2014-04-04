<h2>
	<span>Videos <small>Show video {{ $video->login }}</small></span>
	<div class="pull-right">
		<a href="{{ route('admin.video.index') }}" class="btn btn-sm btn-default">
			<span class="glyphicon glyphicon-arrow-left"></span> All videos
		</a>
	</div>
</h2>

<ul class="nav nav-tabs">
	@foreach (array(
		'video' => array('title' => 'Video informations', 'url' => route('admin.video.show', array($video->id))),
		'price' => array('title' => 'Prices', 'url' => route('admin.video.{video}.price.index', array($video->id))),
	) as $key => $value)
		<li{{ $current === $key ? ' class="active"' : '' }}><a href="{{ $value['url'] }}">{{ $value['title'] }}</a></li>
	@endforeach
</ul>