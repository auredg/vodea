@if (isset($studio))
	{{ Form::model($studio, array('route' => array('admin.studio.update', $studio->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
@else
	{{ Form::open(array('route' => 'admin.studio.store', 'class' => 'form-horizontal')) }}
@endif
	<div class="form-group">
		{{ Form::label('name', 'Name', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a href="{{ route('admin.studio.index') }}" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-arrow-left"></span> Back
			</a>
			<button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-ok"></span> Save
			</button>
		</div>
	</div>
	{{ Form::token() }}
{{ Form::close() }}