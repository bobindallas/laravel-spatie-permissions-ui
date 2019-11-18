@extends('layouts.app')
@section('title', 'roles')

@section('content_header')
   {{ Breadcrumbs::render('roles.index') }}
@stop

		@section('content')
	<div class="container">
	@can('create_roles')
		<div style="float:right;padding-right:20px;"><a href="{{ route('roles.create') }}" title="Add New Role"><i class="fa fa-plus-circle fa-2x"></i></a><br /><br /></div>
	@endcan
		<div class="card-body">
			@if (count($roles))
		<table id="roles" class="table table-bordered table-hover compact">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
				<tr>
					<td>{{ $role->id }}</td>
					<td>{{ $role->name }}</td>
					<td>{{ $role->guard_name }}</td>
					<td>{{ $role->created_at->toFormattedDateString() }}</td>
					<td>{{ $role->updated_at->toFormattedDateString() }}</td>
					<td>
					{{-- <a href="{{ route('roles.show', ['role' => $role->id]) }}" title="View Role Details"><i class="fa fa-info-circle fa-2x"></i></a>&nbsp;&nbsp; --}}
					@can('edit_roles')
					<a href="{{ route('roles.edit', ['role' => $role->id]) }}" title="Edit Role Details"><i class="fa fa-pencil-square fa-2x"></i></a>&nbsp;&nbsp;
					@endcan
				{{-- <a href="{{ route('roles.destroy', ['role' => $role->id]) }}" title="Remove Role"><i class="fa fa-trash fa-2x"></i></a> --}}
				</td>
				</tr>
				@endforeach
			</tbody>
			<tfoot>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Created</th>
					<th>Updated</th>
					<th>Actions</th>
				</tr>
			</tfoot>
		</table>
		@else
			<center>No Records Found...</center>
		@endif
		</div>
	</div>
		@stop

		@section('css')
		@stop

		@section('js')
		<script>
		$('#roles').DataTable({
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

@push('css')
@push('js')
