<div class="form-group">
	<div class="card border">
		<div class="card-title border-bottom" style="padding-left:10px; font-size:1.3em; background-color:#e9ecef;">
			Permissions
		</div>
		<div class="card-body">
			<table id="permissions" class="table table-bordered table-hover compact">
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

				@foreach ($permissions as $permission)
					<tr>
						<?php
							$perm_found = null;
							if( isset($role) ) { 
								$perm_found = $role->hasPermissionTo($permission->name);
							}
							if( isset($user)) {
								$perm_found = $user->hasDirectPermission($permission->name);
							}
						?>
						<td>{{ $permission->id }}</td>
						<td>{{ $permission->name }}</td>
						<td>{{ $permission->guard_name }}</td>
						<td>{{ $permission->created_at->toFormattedDateString() }}</td>
						<td><input type="checkbox" name="permissions[]" value="{{ $permission->name }}" @if($perm_found) checked @endif></td>
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
