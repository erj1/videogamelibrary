
@if (Session::has('success'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Success!</strong>
	{{ Session::get('success') }}
</div>
@endif

@if (Session::has('error'))
<div class="alert alert-success">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>Error!</strong>
	{{ Session::get('error') }}
</div>
@endif