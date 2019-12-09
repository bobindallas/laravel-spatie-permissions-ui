<div class="form-group">
	<div class="card border">
		<div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
			User Roles
		</div>
		<div class="card-body">
			<table id="roles" class="table table-hover table-responsive-sm table-sm compact">
				<thead>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Guard Name</th>
						<th>Created</th>
						<th>Active</th>
					</tr>
				</thead>
				<tbody>

				@foreach ($roles as $role)
					<tr>
						<td>{{ $role->id }}</td>
						<td>{{ $role->name }}</td>
						<td>{{ $role->guard_name }}</td>
						<td>{{ $role->created_at->toFormattedDateString() }}</td>
						<td><input type="checkbox" name="roles[]" id="{{ $role->id }}" value="{{ $role->id }}" @if(isset($user) && $user->hasRole($role->name)) checked @endif></td>
					</tr>
				@endforeach
				</tbody>
				<tfoot>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Guard Name</th>
						<th>Created</th>
						<th>Active</th>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
</div>
