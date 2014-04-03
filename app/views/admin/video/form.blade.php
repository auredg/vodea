@if (isset($video))
	{{ Form::model($video, array('route' => array('admin.video.update', $video->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
@else
	{{ Form::open(array('route' => 'admin.video.store', 'class' => 'form-horizontal')) }}
@endif
	<div class="form-group">
		{{ Form::label('active', 'Active', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			 <label class="radio-inline">{{ Form::radio('active', 0) }} No</label>
			 <label class="radio-inline">{{ Form::radio('active', 1) }} Yes</label>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('type', 'Type *', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('type', Video::getTypes(), null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group parent-group">
		{{ Form::label('parent_id', 'Parent ID', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('parent_id', Video::getShows(), null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('name', 'Name *', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('name', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('title', 'Title *', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('title', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('summary', 'Summary', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::textarea('summary', null, array('class' => 'form-control ckeditor')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('description', 'Description', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::textarea('description', null, array('class' => 'form-control ckeditor')) }}
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a href="{{ route('admin.video.index') }}" class="btn btn-sm btn-default">
				<span class="glyphicon glyphicon-arrow-left"></span> Back
			</a>
			<button type="submit" class="btn btn-sm btn-primary">
				<span class="glyphicon glyphicon-ok"></span> Save
			</button>
		</div>
	</div>
	{{ Form::token() }}
{{ Form::close() }}
<script>
$('#type').on('change', function() {
	if ($(this).val() === 'episode') {
		$('.parent-group').show();
	} else {
		$('.parent-group').hide();
	}
}).trigger('change');
</script>