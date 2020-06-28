<template>
	<v-container class="perfil-usuario">
		<v-row>
			<v-col cols="12" sm="8" md="8" lg="8">
				<ProfileForm/>
			</v-col>
			
			<v-col cols="12" sm="4" md="4" lg="4">
				<ProfilePictureForm/>
			</v-col>

			<v-col cols="12" sm="8" md="8" lg="8">
				<PasswordForm/>
			</v-col>
		</v-row>
	</v-container>
</template>

<script>
import ProfileForm from '../components/profile/ProfileForm'
import PasswordForm from '../components/profile/PasswordForm'
import ProfilePictureForm from '../components/profile/ProfilePictureForm'

export default {
	name: 'Profile',
	components: {
		ProfileForm,
		PasswordForm,
		ProfilePictureForm,
	},
}
</script>