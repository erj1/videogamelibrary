@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>Video Game Platforms</h1>
</div>

<table class="table">
	<thead>
		<tr>
			<th>Platform</th>
			<th>Games</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	@foreach($platforms as $platform)
		<tr>
			<td>{{{ $platform->name }}}</td>
			<td>{{ $platform->games->count() }}</td>
			<td>
				<p class='pull-right'>
					{{ HTML::linkAction(
						'PlatformController@show',
						'View Games',
						['platform' => $platform->id],
						['class' => 'btn btn-info']
					) }}
				</p>
			</td>
		</tr>
	@endforeach
	</tbody>
</table>

@stop