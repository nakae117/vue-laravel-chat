<template>
	<div class="password-form">
		<v-card>
			<v-toolbar
				color="white"
				dense
				flat
			>
				<v-toolbar-title>Cambiar contraseña</v-toolbar-title>
			</v-toolbar>
			
			<VDivider/>

			<v-form @submit.prevent="updatePassword">
				<v-card-text>
					<v-text-field
						v-model="pass.current_password"
						prepend-inner-icon="security"
						:type="type.current_password ? 'text' : 'password'"
						color="lime"
						solo
						label="Contraseña Actual"
						dense
						:hide-details="!passErrors.current_password"
						class="mb-5"
						:error-messages="passErrors.current_password"
					>
						<template v-slot:append>
							<v-tooltip
								bottom
							>
								<template v-slot:activator="{ on }">
									<v-icon @click="type.current_password = !type.current_password" v-on="on">{{ !type.current_password ? 'visibility' : 'visibility_off' }}</v-icon>
								</template>
								Ver contraseña
							</v-tooltip>
						</template>
					</v-text-field>
					
					<v-text-field
						v-model="pass.password"
						prepend-inner-icon="lock"
						:type="type.password ? 'text' : 'password'"
						color="lime"
						solo
						label="Nueva Contraseña"
						dense
						:hide-details="!passErrors.password"
						class="mb-5"
						:error-messages="passErrors.password"
					>
						<template v-slot:append>
							<v-tooltip
								bottom
							>
								<template v-slot:activator="{ on }">
									<v-icon @click="type.password = !type.password" v-on="on">{{ !type.password ? 'visibility' : 'visibility_off' }}</v-icon>
								</template>
								Ver contraseña
							</v-tooltip>
						</template>
					</v-text-field>
					
					<v-text-field
						v-model="pass.password_confirmation"
						prepend-inner-icon="done_all"
						:type="type.password_confirmation ? 'text' : 'password'"
						color="lime"
						solo
						label="Confirmar contraseña"
						dense
						hide-details
						class="mb-5"
					>
						<template v-slot:append>
							<v-tooltip
								bottom
							>
								<template v-slot:activator="{ on }">
									<v-icon @click="type.password_confirmation = !type.password_confirmation" v-on="on">{{ !type.password_confirmation ? 'visibility' : 'visibility_off' }}</v-icon>
								</template>
								Ver contraseña
							</v-tooltip>
						</template>
					</v-text-field>
				</v-card-text>

				<VDivider/>

				<v-card-actions>
					<VSpacer/>

					<v-btn
						text
						color="green darken-1"
						type="submit"
						:loading="updating"
					>
						<v-icon>
							done
						</v-icon>

						Guardar
					</v-btn>
				</v-card-actions>
			</v-form>
		</v-card>

		<v-snackbar
			v-model="snackbar"
			color="lime"
			:timeout="12000"
			bottom
			right
		>
			<v-icon>
				done
			</v-icon>

			Contraseña actualizada exitósamente

			<v-btn
				text
				@click="snackbar = !snackbar"
				fab
			>
				<v-icon>close</v-icon>
			</v-btn>
		</v-snackbar>
	</div>
</template>

<script>
export default {
	name: 'PasswordForm',
	data: () => ({
		updating: false,
		snackbar: false,
		pass: {
			current_password: '',
			password: '',
			password_confirmation: '',
		},
		type: {
			current_password: false,
			password: false,
			password_confirmation: false,
		},
		passErrors: {
			current_password: '',
			password: '',
		}
	}),
	methods: {
		updatePassword(){
			this.passErrors = { current_password: '', password: '' }
			let passwordData = this.pass
			this.updating = true

			this.$store.dispatch('profile/updatePassword', passwordData)
				.then((pass) => {
					this.pass.current_password = ''
					this.pass.password = ''
					this.pass.password_confirmation = ''
					
					this.updating = false
					this.snackbar = true
				})
				.catch((res) => {
					this.updating = false
					this.passErrors = res.response.data.errors
				})
		},
	}
}
</script>