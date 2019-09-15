<div class="form-group">
	<div class="card border">
		<div class="card-title border-bottom" style="padding-left:10px;">
			Roles
		</div>
		<div class="card-body">
			<div class="row">
				@foreach ($roles as $id => $name)
					<div class="col-md-3">
						<input type="checkbox" name="roles[]" id="{{ $id }}" value="{{ $id }}" @if(isset($user) && $user->hasRole($name)) checked @endif>
						<label for="{{ $id }}">{{ $name }}</label>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
