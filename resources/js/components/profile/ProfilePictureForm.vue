<template>
	<div class="profile-picture-form">
		<v-card>
			<v-toolbar
				color="white"
				dense
				flat
			>
				<v-toolbar-title>Imágen de perfil</v-toolbar-title>
			</v-toolbar>

			<VDivider/>

			<v-card-text class="text-center">
				<span
					id="pick-picture"
				>
					<v-avatar
						size="150"
						
					>
						<img
							v-if="userProfile && userProfile.url_photo"
							:src="userProfile.url_photo"
						>
					</v-avatar>

					<v-btn
						color="lime"
						dense
						class="mt-2"
						dark
						:loading="uploading"
					>Seleccionar imagen</v-btn>
				</span>

				<AvatarCropper
					@uploading="uploadingPicture"
					@uploaded="updatePicture"
					trigger="#pick-picture"
					upload-url="/perfil/imagen"
					:labels="{
						submit: 'Guardar',
						cancel: 'Cancelar'
					}"
					:upload-form-data="{
						_token: token
					}"
				/>
			</v-card-text>
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

			Imagen de perfil actualizada exitósamente

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
import AvatarCropper from 'vue-avatar-cropper'

export default {
	name: 'ProfilePictureForm',
	components: {
		AvatarCropper,
	},
	data: () => {
		return {
			token: document.head.querySelector('meta[name="csrf-token"]').content,
			uploading: false,
			snackbar: false,
		}
	},
	computed: {
		userProfile(){
			return this.$store.state.profile.user
		},
	},
	methods: {
		updatePicture(resp){
			this.snackbar = true
			this.uploading = false
			this.$store.dispatch('profile/setPhoto', resp.url)
		},
		uploadingPicture(){
			this.uploading = true
		},
	},
}
</script>

<style scoped>
#pick-picture {
	cursor: pointer;
}
.avatar-cropper-overlay{
	background-color: #000;
}
</style>

<style>
.avatar-cropper-overlay{
	background-color: #000;
}
</style>