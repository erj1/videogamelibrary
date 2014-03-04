@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>Account</h1>
</div>

{{ Form::open([
	'action' => 'UserController@update',
	'method' => 'put',
	'class'  => 'form-horizontal'
]) }}

	@if ($errors->count())
		<div class="alert alert-danger">
			<strong>Error</strong>
			@foreach ($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	@if (Session::has('success'))
		<div class="alert alert-success">
			{{ Session::get('success') }}
		</div>
	@endif
	
	{{-- Email --}}
	<div class="form-group">
		{{ Form::label('email', 'Email', [
			'class' => 'col-md-2 control-label'
		]) }}
		<div class="col-md-10">
			{{ Form::email('email', $user->email, [
				'id' => 'email',
				'class' => 'form-control',
				'placeholder' => 'Your Contact Email',
				'required'
			]) }}
		</div>
	</div>

	{{-- Password --}}
	<div class="form-group">
		{{ Form::label('password', 'Password', [
			'class' => 'col-md-2 control-label'
		]) }}
		<div class='col-md-10'>
			{{ Form::password('password', [
				'id' => 'password',
				'class' => 'form-control',
				'placeholder' => 'Password',
				'required'
			]) }}
		</div>
	</div>

	{{-- Password Confirmation --}}
	<div class="form-group">
		{{ Form::label('password_confirm', 'Confirm Password', [
			'class' => 'col-md-2 control-label'
		]) }}
		<div class='col-md-10'>
			{{ Form::password('password_confirmation', [
				'id' => 'password_confirm',
				'class' => 'form-control',
				'placeholder' => 'Confirm Password',
				'required'
			]) }}
		</div>
	</div>

	{{-- Form Actions --}}
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			{{ Form::submit('Save Updates', ['class' => 'btn btn-lg btn-inverse']) }}
		</div>
	</div>

{{ Form::close() }}

@stop