<template>
	<span></span>
</template>

<script>
export default {
	name: 'InitApp',
	props: ['profile', 'users', 'chats'],
	mounted(){
		this.$store.dispatch('users/setUsers', this.users)
		this.$store.dispatch('chat/setChats', this.chats)
		this.$store.dispatch('profile/setProfile', this.profile)
	}
}
</script>