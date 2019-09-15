<div class="form-group">
	<div class="card border">
		<div class="card-title border-bottom" style="padding-left:10px;">
			Permissions
		</div>
		<div class="card-body">
			<div class="row">
				@foreach ($permissions as $permission)
					<div class="col-md-3">
						<input type="checkbox" name="permissions[]" id="{{ $permission }}" value="{{ $permission }}" @if(isset($user) && $user->hasDirectPermission($permission)) checked @endif>
						<label for="{{ $permission }}">{{ $permission }}</label>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
