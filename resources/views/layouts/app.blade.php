<!doctype html>
<html lang="en">
  <head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="favicon.ico">
	<title>{{ config('app.name') }}</title>

	<!-- Bootstrap core CSS -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<script src="{{ asset('js/app.js') }}"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
	{{--<script src="https://cdn.jsdelivr.net/npm/vue"></script> --}}
	@stack('css')
	@yield('css')
  </head>

  <body>

	 <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
	   <a class="navbar-brand" href="/">Home</a>
	   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
	     <span class="navbar-toggler-icon"></span>
	   </button>
@auth
	   <div class="collapse navbar-collapse" id="navbarsExampleDefault">
	     <ul class="navbar-nav mr-auto">
	       <li class="nav-item dropdown">
	         <a class="nav-link dropdown-toggle" href="javascript:void(0);" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Options</a>
	         <div class="dropdown-menu" aria-labelledby="dropdown01">
				 @can('view_users')
	           <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
				@endcan
				 @can('view_roles')
	           <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
				@endcan
				 @can('view_permissions')
	           <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
				@endcan
	         </div>
	       </li>
	     </ul>
@endauth

	<!-- Right Side Of Navbar -->
	<ul class="navbar-nav ml-auto">
	    <!-- Authentication Links -->
	    @guest
	        <li class="nav-item">
	            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
	        </li>
	        @if (Route::has('register'))
	            <li class="nav-item">
	                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
	            </li>
	        @endif
	    @else
	        <li class="nav-item dropdown">
	            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	                {{ Auth::user()->name }} <span class="caret"></span>
	            </a>

	            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	                <a class="dropdown-item" href="{{ route('logout') }}"
	                   onclick="event.preventDefault();
	                                 document.getElementById('logout-form').submit();">
	                    {{ __('Logout') }}
	                </a>

	                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	                    @csrf
	                </form>
	            </div>
	        </li>
	    @endguest
	</ul>
{{--    <form class="form-inline my-2 my-lg-0">
	       <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
	       <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
	     </form> --}}
	   </div>
	 </nav>

	 <main role="main" class="">

<br />
<br />
<br />
<br />
	   <div class="container">
		<!-- Content Header (Page header) -->
		<section class="content-header">
			<h5>@yield('content_header')</h5>
		</section>
		@include('inc.messages')
		@yield('content')
{{-- temp to get form buttons off the floor --}}
<br />
<br />
	   </div>

	 </main><!-- /.container -->
@stack('js')
@yield('js')
  </body>
</html>
