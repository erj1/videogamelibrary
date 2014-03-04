@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>Game Management</h1>
</div>

<section>
	<p>
		{{-- Create A New Game Button --}}
		{{ HTML::linkAction(
			'AdminGameController@create',
			'New Game',
			null,
			['class' => 'btn btn-success']
		) }}
	</p>
</section>

<table class="table table-striped">
	<thead>
		<tr>
			<th>Name</th>
			<th>Platform</th>
			<th>Rating</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
		@foreach($games as $game)
			<tr>
				<td>{{{ $game->name }}}</td>
				<td>{{{ $game->platform->name }}}</td>
				<td>{{ $game->rating }}</td>
				<td>
					{{ HTML::linkAction(
						'AdminGameController@edit',
						'Edit',
						['game' => $game->id],
						['class' => 'btn btn-info']
					) }}

					{{-- Destroy --}}
					{{ Form::open([
						'action' => ['AdminGameController@destroy', $game->id],
						'method' => 'delete',
						'class'  => 'form-inline form-delete'
					]) }}

						{{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}

					{{ Form::close() }}
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@stop