@if (isset($price))
	{{ Form::model($price, array('route' => array('admin.video.{video}.price.update', $video->id, $price->id), 'method' => 'put', 'class' => 'form-horizontal')) }}
@else
	{{ Form::open(array('route' => array('admin.video.{video}.price.store', $video->id), 'class' => 'form-horizontal')) }}
@endif
	<div class="form-group">
		<div class="col-sm-2"></div>
		<div class="col-sm-4">
			<label class="checkbox">Is promotion {{ Form::checkbox('is_promotion', 1) }}</label>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('type', 'Type', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::select('type', array('' => '') + Price::getTypes(), null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('price', 'Price', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('price', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('tax', 'Tax', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			{{ Form::text('tax', null, array('class' => 'form-control')) }}
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('start_at', 'Start At', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			<div class="input-group datetimepicker" data-date-format="YYYY-MM-DD hh:mm">
				<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
				{{ Form::text('start_at', null, array('class' => 'form-control')) }}
			</div>
		</div>
	</div>
	<div class="form-group">
		{{ Form::label('end_at', 'End At', array('class' => 'col-sm-2 control-label')) }}
		<div class="col-sm-4">
			<div class="input-group datetimepicker" data-date-format="YYYY-MM-DD hh:mm">
				<div class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></div>
				{{ Form::text('end_at', null, array('class' => 'form-control')) }}
			</div>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<a href="{{ route('admin.video.{video}.price.index', array($video->id)) }}" class="btn btn-sm btn-default">
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
$(function() {
	
	$('.datetimepicker').datetimepicker();
	
});	
</script>