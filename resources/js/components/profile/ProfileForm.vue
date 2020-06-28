<template>
	<div class="profile-form">
		<v-card>
			<v-toolbar
				color="white"
				dense
				flat
			>
				<v-toolbar-title>{{ userProfile ? userProfile.name : '' }}</v-toolbar-title>
			</v-toolbar>
			
			<VDivider/>

			<v-form @submit.prevent="updateProfile">
				<v-card-text>
					<v-text-field
						v-model="user.first_name"
						prepend-inner-icon="looks_one"
						type="text"
						color="lime"
						solo
						label="Nombre"
						dense
						:hide-details="!errors.first_name"
						class="mb-5"
						:error-messages="errors.first_name"
					></v-text-field>
					
					<v-text-field
						v-model="user.last_name"
						prepend-inner-icon="looks_two"
						type="text"
						color="lime"
						solo
						label="Apellido"
						dense
						:hide-details="!errors.last_name"
						class="mb-5"
						:error-messages="errors.last_name"
					></v-text-field>
					
					<v-text-field
						v-model="user.username"
						prepend-inner-icon="person"
						type="text"
						color="lime"
						solo
						label="Usuario"
						dense
						:hide-details="!errors.username"
						class="mb-5"
						:error-messages="errors.username"
					></v-text-field>

					<v-text-field
						v-model="user.email"
						prepend-inner-icon="email"
						type="emal"
						color="lime"
						solo
						label="E-mail"
						dense
						:hide-details="!errors.email"
						class="mb-5"
						:error-messages="errors.email"
					></v-text-field>
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
							beenhere
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

			Usuario actualizado exitósamente

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
	name: 'ProfileForm',
	mounted(){
		this.setUser()
	},
	data: () => ({
		updating: false,
		snackbar: false,
		user: {
			first_name: '',
			last_name: '',
			username: '',
			email: '',
		},
		errors: {
			first_name: '',
			last_name: '',
			username: '',
			email: '',
		},
	}),
	computed: {
		userProfile(){
			return this.$store.state.profile.user
		},
	},
	methods: {
		setUser(){
			this.user = {
				first_name: this.userProfile.first_name,
				last_name: this.userProfile.last_name,
				username: this.userProfile.username,
				email: this.userProfile.email,
			}
		},
		updateProfile(){
			this.errors = { first_name: '', last_name: '', username: '', email: '', }
			let profileData = this.user
			this.updating = true

			this.$store.dispatch('profile/updateProfile', profileData)
				.then((profile) => {
					this.updating = false
					this.snackbar = true
				})
				.catch((res) => {
					this.updating = false
					this.errors = res.response.data.errors
				})
		},
	}
}
</script>