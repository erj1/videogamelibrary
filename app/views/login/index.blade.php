@extends('template.guest.full')

@section('content')

<div id="login" class="center-block">

	<div class="login-screen">

		<div class="login-icon">
			<img src="/images/logo-mask.png">
			<h4>Welcome To <small>Video Game Library</small></h4>
		</div>

		<div class="login-form">
			{{ Form::open([
				'url'    => 'login',
				'method' => 'post',
				'class'  => 'form'
			]) }}

				@if (Session::has('error'))
					<div class="alert alert-danger">
						<strong>Error</strong>
						<p>{{{ Session::get('error') }}}</p>
					</div>
				@endif

				{{-- Email ---------------------------------------------------}}
				<div class='form-group'>
					{{ Form::email('email', null, [
						'id'          => 'login-email',
						'class'       => 'form-control',
						'placeholder' => 'Email',
						'required'
					]) }}
					<label class="login-field-icon fui-mail" for="login-email"></label>
				</div>


				{{-- Password ------------------------------------------------}}
				<div class="form-group">
					{{ Form::password('password', [
						'id'          => 'login-password',
						'class'       => 'form-control',
						'placeholder' => 'Password',
						'required'
					]) }}
					<label class="login-field-icon fui-lock" for="login-password"></label>
				</div>

				{{-- Form Actions --------------------------------------------}}

				{{ Form::submit("Login", ['class' => 'btn btn-inverse btn-lg btn-block']) }}

				
				<a href="#" class="login-link">Forgot Your Password?</a>

			{{ Form::close() }}
		</div>
	</div>
</div>

@stop