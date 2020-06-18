<v-app-bar
	color="lime text--darken-1"
	dense
	dark
	app
	clipped-left
	fixed
	flat
>
	<v-app-bar-nav-icon @click="dialogUsers = !dialogUsers">
		<v-icon>add</v-icon>
	</v-app-bar-nav-icon>

	<v-toolbar-items>
		<v-btn width="208px" text :to="{ name: 'home' }">
			{{ config('app.name', 'Laravel') }}
		</v-btn>
	</v-toolbar-items>

	<v-btn text v-if="currentChat">
		<v-avatar height="35px" width="35px">
			<img :src="currentChat.receiver.photo" :alt="currentChat.receiver.name">
		</v-avatar>
		<span v-text="currentChat.receiver.name"></span>
	</v-btn>

	<v-spacer></v-spacer>
	@auth
		<v-toolbar-items>
			<v-menu
				bottom
				transition="slide-y-transition"
				offset-y
				:nudge-width="200"
				max-width="350"
				:close-on-content-click="false"
			>
				<template v-slot:activator="{ on }">
					<v-btn
						text
						v-on="on"
					>
						Perfil
					</v-btn>
				</template>

				<v-card>
					<v-list>
						<v-list-item avatar>
							<v-list-item-avatar>
								<img src="{{ asset(auth()->user()->photo) }}" alt="{{ auth()->user()->name }}">
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
						<v-btn
							flat
							dark
							color="lime text--darken-1"
							:to="{ name: 'home' }"
							class="px-4"
							height="30px"
						>
							<v-icon small>email</v-icon>
							Chat
						</v-btn>

						<v-btn
							flat
							dark
							href="{{ route('logout') }}"
							color="lime text--darken-1"
							height="30px"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
						>
							<v-icon small>lock</v-icon>
							{{ __('Logout') }}
						</v-btn>

						<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
							@csrf
						</form>
					</v-card-actions>
				</v-card>
			</v-menu>
		</v-toolbar-items>
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
		@endauth
</v-app-bar>