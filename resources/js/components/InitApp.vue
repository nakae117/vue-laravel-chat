<template>
	<span></span>
</template>

<script>
export default {
	name: 'InitApp',
	props: ['users', 'chats'],
	mounted(){
		this.$store.dispatch('users/setUsers', this.users)
		this.$store.dispatch('chat/setChats', this.chats)
	}
}
</script>