@extends('layouts.auth')

@section('content')
	<v-layout align-center justify-center>
		<v-flex xs12 sm7 md5 lg4>
			{{-- <v-card class="elevation-12" dark> --}}
			<v-card class="elevation-12">
				<v-toolbar dark color="primary" flat>
					<v-toolbar-title>Registro</v-toolbar-title>
					<v-spacer></v-spacer>
					<v-icon>person_add</v-icon>
				</v-toolbar>
				<v-form ref="loginForm" method="POST">
					@csrf
					<v-card-text>
						¿Ya posees una cuenta? <a href="{{ route('login') }}">Inicia sesión</a>
						<v-stepper class="stepper-register" v-model="steps" vertical>
							<v-stepper-step :complete="steps > 1" :editable="steps > 1" step="1">
								Datos personales
								{{-- <small v-if="(mjsError.nombre || mjsError.apellido) && steps != 1">
									<ul>
										<li v-if="mjsError.nombre"><span class="error--text">{{ mjsError.nombre[0] }}</span></li>
										<li v-if="mjsError.apellido"><span class="error--text">{{ mjsError.apellido[0] }}</span></li>
									</ul>
								</small> --}}
							</v-stepper-step>

							<v-stepper-content step="1">
								<v-text-field type="text" @error('first_name') :error-messages="'{{ $message }}'" @enderror name="first_name" label="Nombre" prepend-icon="person"></v-text-field>
								<v-text-field type="text" @error('last_name') :error-messages="'{{ $message }}'" @enderror name="last_name" label="Apellido" prepend-icon="person"></v-text-field>
								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn color="primary" small @click="steps = 2">Siguiente</v-btn>
								</v-card-actions>
								<br>
							</v-stepper-content>

							<v-stepper-step :complete="steps > 2" :editable="steps > 2" step="2">
								Datos de ingreso
								{{-- <small v-if="(mjsError.usuario || mjsError.email) && steps != 2">
									<ul>
										<li v-if="mjsError.usuario"><span class="error--text">{{ mjsError.usuario[0] }}</span></li>
										<li v-if="mjsError.email"><span class="error--text">{{ mjsError.email[0] }}</span></li>
									</ul>
								</small> --}}
							</v-stepper-step>

							<v-stepper-content step="2">
								<v-text-field type="text" color="purple" @error('username') :error-messages="'{{ $message }}'" @enderror name="username" label="Usuario" prepend-icon="contact_mail"></v-text-field>
								<v-text-field type="email" color="purple" @error('email') :error-messages="'{{ $message }}'" @enderror name="email" label="Correo eletrónico" prepend-icon="mail"></v-text-field>
								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn color="primary" small @click="steps = 1">Atrás</v-btn>
									<v-btn color="primary" small @click="steps = 3">Siguiente</v-btn>
								</v-card-actions>
								<br>
							</v-stepper-content>

							<v-stepper-step :complete="steps > 3" step="3">
								Contraseña
								{{-- <small v-if="mjsError.password && steps != 3">
									<ul>
										<li v-if="mjsError.password"><span class="error--text">{{ mjsError.password[0] }}</span></li>
									</ul>
								</small> --}}
							</v-stepper-step>

							
							<v-stepper-content step="3">
								<v-text-field type="password" @error('password') :error-messages="'{{ $message }}'" @enderror name="password" label="Contraseña" prepend-icon="lock"></v-text-field>
								<v-text-field type="password" name="password_confirmation" label="Confirmar contraseña" prepend-icon="security"></v-text-field>
								<v-card-actions>
									<v-spacer></v-spacer>
									<v-btn color="primary" small @click="steps = 2">Atrás</v-btn>
									<v-btn type="submit" color="primary" {{-- :loading="loading" --}} small>Registrar</v-btn>
								</v-card-actions>
								<br>
							</v-stepper-content>
						</v-stepper>
					</v-card-text>
				</v-form>
			</v-card>
		</v-flex>
	</v-layout>
@endsection
