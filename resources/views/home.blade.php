@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

						  You are logged in!<br /><br />
						  Use the Options menu to edit <a href="{{ route('users.index') }}">Users</a> / <a href="{{ route('roles.index') }}">Roles</a> / <a href="{{ route('permissions.index') }}">Permissions</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
