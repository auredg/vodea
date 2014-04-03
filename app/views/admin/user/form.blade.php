@if (isset($user))
	{{ Form::model($user, array('route' => array('admin.user.update', $user->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
@else
	{{ Form::open(array('route' => 'admin.user.store', 'class' => 'form-horizontal')) }}
@endif
	<div class="form-group">
		{{ Form::label('login', 'Login', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('login', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('email', 'E-Mail', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('email', null, array('class' => 'form-control', 'autocomplete' => 'off')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password', 'Password', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::password('password', array('class' => 'form-control', 'autocomplete' => 'off')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('password_confirm', 'Password confirmation', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::password('password_confirm', array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('group', 'Group', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('group', array('' => '') + User::getGroups(), null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a href="{{ route('admin.user.index') }}" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-arrow-left"></span> Back
			</a>
			<button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-ok"></span> Save
			</button>
		</div>
	</div>
	{{ Form::token() }}
{{ Form::close() }}