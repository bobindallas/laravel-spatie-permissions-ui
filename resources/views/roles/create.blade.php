@extends('layouts.app')

@section('content_header')
   {{ Breadcrumbs::render('roles.create') }}
@stop

@section('content')
	<div class="container">
		<form method='POST' action="{{ route('roles.store') }}">
			@csrf
			<div class="form-group">
				<label for="code">Role Name</label>
				<input type="text" name="name" value="" class='form-control' placeholder='Role Name'>
			</div>
			<div class="form-group">
				<label for="name">Guard Name</label>
				<input type="text" name="guard_name" value="web" class='form-control' placeholder='Guard Name'>
			</div>
			@include('inc.role_perms_form')
			<input type="submit" value="Submit" class="btn btn-primary">
		</form>
   </div>
@endsection
