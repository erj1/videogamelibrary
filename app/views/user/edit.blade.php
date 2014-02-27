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

	{{-- User Details -------------------------------------------------------}}
	<fieldset>
		<legend>Details</legend>

		{{-- Username --}}
		<div class="form-group">
			{{ Form::label('username', 'Username', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class="col-md-10">
				{{ Form::text('username', $user->username, [
					'id' => 'username',
					'class' => 'form-control',
					'placeholder' => 'Select A Username',
				]) }}
			</div>
		</div>

		{{-- Email --}}
		<div class="form-group">
			{{ Form::label('email', 'Email', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class="col-md-10">
				{{ Form::text('email', $user->email, [
					'id' => 'email',
					'class' => 'form-control',
					'placeholder' => 'Your Contact Email',
				]) }}
			</div>
		</div>

		{{-- First Name --}}
		<div class="form-group">
			{{ Form::label('first_name', 'First Name', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class="col-md-10">
				{{ Form::text('first_name', $user->first_name, [
					'id' => 'first_name',
					'class' => 'form-control',
					'placeholder' => 'Your First Name',
				]) }}
			</div>
		</div>

		{{-- Last Name --}}
		<div class="form-group">
			{{ Form::label('last_name', 'Last Name', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class="col-md-10">
				{{ Form::text('last_name', $user->last_name, [
					'id' => 'last_name',
					'class' => 'form-control',
					'placeholder' => 'Your Last Name',
				]) }}
			</div>
		</div>

		{{-- Birthday --}}
		<div class="form-group">
			{{ Form::label('birthday', 'Birthday', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class="col-md-10">
				<div class="row">
				
					{{-- Month --}}
					<div class="col-xs-5 col-md-6">
						{{ Form::selectMonth(
							'month',
							$user->birthday->format('n'),
							['class' => 'form-control']
						) }}
					</div>

					{{-- Day --}}
					<div class="col-xs-3 col-md-2">
						{{ Form::selectRange(
							'day',
							1, 31, // max number of days
							$user->birthday->format('j'),
							['class' => 'form-control']
						) }}
					</div>

					{{-- Year --}}
					<div class="col-xs-4">
						{{ Form::selectRange(
							'year',
							date('Y') - 70, date('Y'), // 70 years ago to today
							$user->birthday->format('Y'),
							['class' => 'form-control']
						) }}

					</div>

				</div>
			</div>
		</div>

	</fieldset>

	{{-- Form Actions --}}
	<div class="form-group">
		<div class="col-md-offset-2 col-md-10">
			{{ Form::submit('Save Updates', ['class' => 'btn btn-lg btn-inverse']) }}
		</div>
	</div>

{{ Form::close() }}

	<fieldset>
		<legend>Passwords</legend>

		<hr>

		{{-- Password --}}
		<div class="form-group">
			{{ Form::label('password', 'Password', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class='col-md-10'>
				{{ Form::password('password', [
					'id' => 'password',
					'class' => 'form-control',
					'placeholder' => 'Password'
				]) }}
			</div>
		</div>

		{{-- Password Confirmation --}}
		<div class="form-group">
			{{ Form::label('password_confirm', 'Confirm Password', [
				'class' => 'col-md-2 control-label'
			]) }}
			<div class='col-md-10'>
				{{ Form::password('password_cofirm', [
					'id' => 'password_confirm',
					'class' => 'form-control',
					'placeholder' => 'Confirm Password'
				]) }}
			</div>
		</div>

	</fieldset>

	



@stop