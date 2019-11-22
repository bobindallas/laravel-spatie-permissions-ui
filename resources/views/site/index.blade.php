@extends('layouts.app')

@section('content_header')
   {{ Breadcrumbs::render('home') }}
@stop

@section('content')
	<h1>Roles &amp; Permissions UI...</h1>
	<p class="lead">Login above:</p>
	<p class="lead">Superuser: super@email.com (has all privileges)</p>
	<p class="lead">Admin: admin@email.com</p>
	<p class="lead">User: user@email.com</p>
@stop
