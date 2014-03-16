@extends('template.guest.base')

@section('content')

<div class='page-header'>
	<h1>
		{{{ $game->name }}}

		@if (Auth::check())
		<small>
			<a href="{{ action(
				'AdminGameController@edit',
				['game' => $game->id]
			) }}" title="Edit Game">
				<span class="fui-new"></span>
			</a>
		</small>
		@endif
	</h1>
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
					<th>Rating</th>
					<td>{{ $game->rating }}</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

@stop