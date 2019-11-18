@extends('layouts.app')

@section('content_header')
	{{ Breadcrumbs::render('roles.edit', $role) }}
@stop

@section('content')
	<div class="container">
		<form method='POST' action="{{route('roles.update', $role->id)}}">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="code">Role Name</label>
				<input type="text" name="name" value="{{$role->name}}" class='form-control' placeholder='Role Name'>
			</div>
			<div class="form-group">
				<label for="name">Guard Name</label>
				<input type="text" name="guard_name" value="{{$role->guard_name}}" class='form-control' placeholder='Guard Name'>
			</div>
			@include('inc.role_perms_form')
				<input type="submit" value="Submit" class="btn btn-primary">
			</form>
	</div>
@stop

@section('js')
<script>
$('#permissions').DataTable({
  "pageLength": 25,
  "paging": true,
  "lengthChange": true,
  "searching": true,
  "ordering": true,
  "info": true,
  "autoWidth": false,
  'columnDefs' : [{
    'targets' : [-1],
    'orderable' : false
   }]
});
</script>
@stop

@push('js')

