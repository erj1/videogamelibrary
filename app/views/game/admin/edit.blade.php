@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>Create A New Game</h1>
</div>

{{ Form::open([
	'action' => ['AdminGameController@update', $game->id],
	'method' => 'put',
	'class'  => 'form-horizontal',
	'files'  => true
]) }}

	@if ($errors->count())
		<div class="alert alert-danger">
			<strong>Error</strong>
			@foreach($errors->all() as $error)
				<p>{{ $error }}</p>
			@endforeach
		</div>
	@endif

	{{-- Platform --}}
	<div class="form-group">
		{{ Form::label('platform', 'Platform', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			{{ Form::select(
				'platform',
				$platforms,
				$game->platform->id,
				['id' => 'platform', 'class' => 'form-control']
			) }}
		</div>
	</div>

	{{-- ESRB --}}
	<div class="form-group">
		{{ Form::label('esrb', 'ESRB', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			{{ Form::select(
				'esrb',
				$esrbs,
				$game->esrb->id,
				['id' => 'esrb', 'class' => 'form-control']
			) }}
		</div>
	</div>

	{{-- Name --}}
	<div class="form-group">
		{{ Form::label('name', 'Name', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			{{ Form::text('name', $game->name, [
				'id'    => 'name',
				'class' => 'form-control'
			]) }}
		</div>
	</div>

	{{-- Rating --}}
	<div class="form-group">
		{{ Form::label('rating', 'Stars', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			<div class="row">
				@foreach ($rateRange as $rate)
				<div class="col-md-2">
					<label class="radio">
						{{ Form::radio('rating', $rate, ($rate == $game->rating), [
							'class' => 'form-control',
							'data-toggle' => 'radio'
						]) }} {{ $rate }} Stars
					</label>
				</div>	
				@endforeach
			</div>
		</div>
	</div>

	{{-- File Upload --}}
	<div class="form-group">
		{{ Form::label('image', 'Image', [
			'class' => 'control-label col-sm-2'
		]) }}
		<div class="col-sm-10">
			{{ Form::file('image') }}
			{{ HTML::image($game->image_url) }}
		</div>
	</div>

	<hr>

	{{-- Form Actions --}}
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			{{ Form::submit('Create Game', ['class' => 'btn btn-inverse']) }}
		</div>
	</div>

{{ Form::close() }}

@stop