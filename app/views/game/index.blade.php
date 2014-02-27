@extends('template.guest.base')

@section('content')

<div class="page-header clearfix">
	<h1>Video Game Library</h1>
</div>

<div class="row">
@foreach ($games as $game)
	<div class="col-xs-12 col-sm-4 col-md-3">
		<div class="thumbnail">
			<a href="{{ url('games/' . $game->id) }}">
				{{ HTML::image($game->image_url, $game->name) }}
			</a>
		</div>
	</div>
@endforeach
</div>

@stop