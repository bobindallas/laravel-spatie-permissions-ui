<div class="form-group">
	<div class="card border">
		<div class="card-title border-bottom" style="padding-left:10px;">
			Permissions
		</div>
		<div class="card-body">
			<div class="row">
				@foreach ($permissions as $permission)
					<div class="col-md-3">
						<?php
							$perm_found = null;
							if( isset($role) ) { 
								$perm_found = $role->hasPermissionTo($permission->name);
							}
							if( isset($user)) {
								$perm_found = $user->hasDirectPermission($permission->name);
							}
						?>
						<input type="checkbox" name="permissions[]" id="{{ $permission->name }}" value="{{ $permission->name }}" @if($perm_found) checked @endif>
						<label for="{{ $permission->name }}">{{ $permission->name }}</label>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
