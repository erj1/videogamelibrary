@extends('template.guest.base')

@section('content')

<div class="page-header">
	<h1>Platform Management</h1>
</div>

@include('template.partials._flashMessages')

<section>
	<p>
		{{-- Create A New Platform Button --}}
		{{ HTML::linkAction(
			'AdminPlatformController@create',
			'New Platform',
			null,
			['class' => 'btn btn-success']
		) }}
	</p>
</section>

<table class="table">
	<thead>
		<tr>
			<th>Platform</th>
			<th>Games</th>
			<th>Average Rating</th>
			<th>&nbsp;</th>
		</tr>
	</thead>
	<tbody>
	@foreach($platforms as $platform)
		<tr>
			<td>{{{ $platform->name }}}</td>
			<td>{{ $platform->games->count() }}</td>
			<td>{{ $platform->games()->avg('rating') }}</td>
			<td>
				{{-- Edit --}}
					{{ HTML::linkAction(
						'AdminPlatformController@edit',
						'Edit',
						['platform' => $platform->id],
						['class' => 'btn btn-info']
					) }}

				{{-- Destroy --}}
				{{ Form::open([
					'action' => ['AdminPlatformController@destroy', $platform->id],
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