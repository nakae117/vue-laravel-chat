<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ config('app.name', 'Laravel') }}</title>
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
	<div id="app">
		<v-app id="inspire" class="app-wrap">
			<init-app
				:profile='@json(auth()->user())'
				:users='@json($users)'
				:chats='@json($chats)'
			></init-app>

			@include('layouts.sidebar')
			@include('layouts.navbar')

			<v-content class="app-content">
				{{-- @{{dialogUsers}} --}}
				@yield('content')
			</v-content>
			
			@include('layouts.dialogs')
		</v-app>
	</div>
</body>
</html>
