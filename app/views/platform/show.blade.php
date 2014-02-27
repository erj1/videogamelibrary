@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>{{{ $platform->name }}} <small>Video Games</small></h1>
</div>

<div class="row">
@foreach ($platform->games as $game)
	<div class="col-sm-6 col-md-4 col-lg-3">
		<div class="thumbnail">
			<a href="{{ url('games/' . $game->id) }}">
				{{ HTML::image($game->image_url, $game->name) }}
			</a>
		</div>
	</div>
@endforeach
</div>

@stop