<v-app-bar
	color="primary"
	dense
	dark
	app
	clipped-left
	fixed
	flat
>
	<v-app-bar-nav-icon></v-app-bar-nav-icon>

	<v-toolbar-title>{{ config('app.name', 'Laravel') }}</v-toolbar-title>

	<v-spacer></v-spacer>
	
	@auth
		<v-menu
			bottom
			transition="slide-y-transition"
			offset-y
			:nudge-width="200"
			max-width="350"
			:close-on-content-click="false"
		>
			<template v-slot:activator="{ on }">
				<v-btn v-on="on">
					Perfil
				</v-btn>
			</template>

			<v-card>
				<v-list>
					<v-list-item avatar>
						<v-list-item-avatar>
							<img src="{{ asset('perfil.jpg') }}" alt="{{ auth()->user()->name }}">
						</v-list-item-avatar>

						<v-list-item-content>
							<v-list-item-title>{{ auth()->user()->name }}</v-list-item-title>
							<v-list-item-sub-title>{{  auth()->user()->email }}</v-list-item-sub-title>
						</v-list-item-content>
					</v-list-item>
				</v-list>

				<v-divider></v-divider>

				<v-card-actions>
					<v-spacer></v-spacer>
					<v-btn flat href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</v-btn>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</v-card-actions>
			</v-card>
		@else
		<v-toolbar-items>
			<v-btn
				dense
				text
				href="{{ route('login') }}"
			>
				Login
			</v-btn>

			<v-btn
				dense
				text
				href="{{ route('register') }}"
			>
				Register
			</v-btn>
		</v-toolbar-items>
		@endguest
	</v-menu>
</v-app-bar>