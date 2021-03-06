@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>Edit A Platform</h1>
</div>

{{ Form::open([
	'action' => ['AdminPlatformController@update', $platform->id],
	'method' => 'put',
	'class'  => 'form-horizontal'
]) }}

	@if ($errors->count())
		<div class="alert alert-danger">
			<strong>Error</strong>
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	{{-- Platform Name --}}
	<div class="form-group">
		{{ Form::label('name', 'Name', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			{{ Form::text('name', $platform->name, [
				'id'    => 'name',
				'class' => 'form-control',
				'required'
			]) }}
		</div>
	</div>

	{{-- Platform alias --}}
	<div class="form-group">
		{{ Form::label('alias', 'Alias', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			{{ Form::text('alias', $platform->alias, [
				'id'    => 'alias',
				'class' => 'form-control',
				'required'
			]) }}
		</div>
	</div>

	{{-- Form Actions --}}
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Update Platform', ['class' => 'btn btn-inverse']) }}
		</div>
	</div>

{{ Form::close() }}

@stop