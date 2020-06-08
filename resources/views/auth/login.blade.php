@extends('layouts.auth')

@section('content')
<v-layout align-center justify-center>
		<v-flex xs12 sm7 md5 lg4>
			{{-- <v-card class="elevation-12" dark> --}}
			<v-card class="elevation-12">
				<v-toolbar
					dark
					color="lime darken-1"
					flat
					height="55px"
				>
					<v-toolbar-title>Login</v-toolbar-title>
					<v-spacer></v-spacer>
					<v-icon>security</v-icon>
				</v-toolbar>
				<v-form
					action="{{ route('login') }}"
					ref="loginForm"
					method="POST"
				>
					@csrf

					<v-card-text>
						<v-text-field
							@error('username_or_email')
								:error-messages="'{{ $message }}'"
							@enderror
							type="text"
							name="username_or_email"
							label="Usuario o correo"
							prepend-icon="person"
							autofocus
							value="{{ old('username_or_email') }}"
							autocomplete="off"
							color="lime darken-1"
						></v-text-field>

						<v-text-field
							@error('password')
							:error-messages="'{{ $message }}'"
							@enderror
							id="password"
							prepend-icon="lock"
							name="password"
							label="Contraseña"
							type="password"
							color="lime darken-1"
						></v-text-field>
						
						<v-checkbox
							name="remember"
							v-model="rememberMe"
							label="¿Mantener sesión?"
							value="1"
							color="lime darken-1"
							{{ old('remember') ? 'checked' : '' }}
						></v-checkbox>
						{{-- <v-checkbox name="remember" value="1"></v-checkbox> --}}
						
						<br>
						<a
							href="{{ route('register') }}"
							class="text--color-lime"
						>Crear una cuenta</a>
					</v-card-text>
					<v-card-actions>
						<v-spacer></v-spacer>
						
						<v-btn
							type="submit"
							{{-- :loading="loading" --}}
							color="lime darken-1"
							dark
							class="px-4"
							height="30px"
						>
							<v-icon small>lock</v-icon>
							Login
						</v-btn>
					</v-card-actions>
				</v-form>
			</v-card>
		</v-flex>
	</v-layout>
@endsection
