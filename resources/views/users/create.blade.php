@extends('layouts.app')

@section('content_header')
   {{ Breadcrumbs::render('users.create') }}
@stop

@section('content')
   <div class="container">
            <form method='POST' action="{{ route('users.store') }}">
            @csrf
            <div class="form-group">
               <label for="code">User Name</label>
               <input type="text" name="name" value="" class='form-control' placeholder='User Name'>
            </div>
            <div class="form-group">
               <label for="name">Email</label>
               <input type="text" name="email" value="" class='form-control' placeholder='Email'>
            </div>
            <div class="form-group">
               <label for="name">Password</label>
               <input type="text" name="password" value="" class='form-control' placeholder='Password'>
            </div>
            <div class="form-group">
               <label for="name">Re-Enter Pasword</label>
               <input type="text" name="password1" value="" class='form-control' placeholder='Password'>
            </div>
				@include('inc.user_roles_form')
				@include('inc.user_perms_form')
            <input type="submit" value="Submit" class="btn btn-primary">
         </form>
   </div>
@endsection
