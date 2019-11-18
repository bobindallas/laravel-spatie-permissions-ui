@extends('layouts.app')
@section('title', 'permissions')

@section('content_header')
   {{ Breadcrumbs::render('permissions.index') }}
@stop

@section('content')
	<div class="container">
	@can('create_permissions')
		<div style="float:right;padding-right:20px;"><a href="{{ route('permissions.create') }}" title="Add New Permission"><i class="fa fa-plus-circle fa-2x"></i></a><br /><br /></div>
	@endcan
		<div class="card-body">
			@if (count($permissions))
		<table id="permissions" class="table table-bordered table-hover compact">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Guard Name</th>
					<th>Created</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach($permissions as $permission)
				<tr>
					<td>{{ $permission->id }}</td>
					<td>{{ $permission->name }}</td>
					<td>{{ $permission->guard_name }}</td>
					<td>{{ $permission->created_at->toFormattedDateString() }}</td>
					<td>
					{{-- <a href="{{ route('permissions.show', ['permission' => $permission->id]) }}" title="View Permission Details"><i class="fa fa-info-circle fa-2x"></i></a>&nbsp;&nbsp; --}}
					@can('edit_permissions')
					<a href="{{ route('permissions.edit', ['permission' => $permission->id]) }}" title="Edit Permission Details"><i class="fa fa-pencil-square fa-2x"></i></a>&nbsp;&nbsp;
					@endcan
				{{-- <a href="{{ route('permissions.destroy', ['permission' => $permission->id]) }}" title="Remove Permission"><i class="fa fa-trash fa-2x"></i></a> --}}
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
		$('#permissions').DataTable({
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
