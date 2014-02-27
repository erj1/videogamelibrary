@extends('template.guest.base')

@section('content')

<div class='page-header'>
	<h1>{{{ $game->name }}}</h1>
</div>

<div class='row'>
	<div class="col-md-3">
		<div class="thumbnail">
			{{ HTML::image($game->image_url, $game->name) }}
		</div>
	</div>

	<div class="col-md-9">
		<h2>Details</h2>
		<table class="table">
			<tbody>
				<tr colspan="row">
					<th>Platform</th>
					<td>{{ HTML::linkAction(
						'PlatformController@show',
						$game->platform->name,
						['platformId' => $game->platform->id]
					) }}</td>
				</tr>
				<tr colspan="row">
					<th>Average User Rating</th>
					<td>{{ $game->average_rating }}</td>
				</tr>
				<tr colspan="row">
					<th>Your Rating</th>
					<td>	
						@if(Auth::check())
						    {{ $game->getUserRating(Auth::user()) }}
						@else
						    <a href="{{ url('login') }}">Login</a>
						    or
						    <a href="{{ url('register') }}">Register</a>
						@endif
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@stop