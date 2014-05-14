<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">

		<title>Administration</title>

		<!-- Bootstrap core CSS -->
		<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('css/selectize.bootstrap3.css') }}" rel="stylesheet">
		<link href="{{ asset('css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ asset('css/admin.styles.css') }}" rel="stylesheet">

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</head>

	<body class="admin">

		<div class="navbar navbar-default navbar-fixed-top" role="navigation">
			<div class="container-fluid">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="#">VODEA - Administration</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav navbar-right">
						<li><a href="{{ url('admin') }}">Dashboard</a></li>
						<li><a href="{{ route('admin.user.index') }}">Users</a></li>
						<li><a href="{{ route('admin.video.index') }}">Videos</a></li>
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Related content <b class="caret"></b></a>
							<ul class="dropdown-menu">
								<li><a href="{{ route('admin.person.actor.index') }}">Actors</a></li>
								<li><a href="{{ route('admin.person.director.index') }}">Directors</a></li>
								<li><a href="{{ route('admin.studio.index') }}">Studios</a></li>
								<li><a href="{{ route('admin.genre.index') }}">Genres</a></li>
							</ul>
						</li>
						<li><a href="#">Profile</a></li>
						<li><a href="{{ url('logout') }}"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			@if ($errors->has())
				<div class="alert alert-danger alert-dismissable">
					@foreach ($errors->all('<div>:message</div>') as $error)
						{{ $error }}
					@endforeach
				</div>
			@endif
			
			@yield('content')
		</div>

		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
		<script src="{{ asset('js/selectize.min.js') }}"></script>
		<script src="{{ asset('js/moment.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-datetimepicker.min.js') }}"></script>
	</body>
</html>
