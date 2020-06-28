<template>
	<span class="current-chat">
		<v-btn text v-if="currentChat && currentRoute === 'chat'">
			<v-avatar height="35px" width="35px">
				<img :src="currentChat.receiver.url_photo" :alt="currentChat.receiver.name">
			</v-avatar>

			<span class="text--set" v-text="currentChat.receiver.name"></span>
		</v-btn>
	</span>
</template>

<script>
export default {
	name: 'CurrentChat',
	data: () => ({
		currentRoute: ''
	}),
	mounted(){
		this.laodCurrentRoute()
	},
	computed: {
		currentChat(){
			return this.$store.state.chat.currentChat
		},
	},
	watch: {
		$route(to, from) {
			this.laodCurrentRoute()
		}
	},
	methods: {
		laodCurrentRoute(){
			this.currentRoute = this.$router.history.current.name
		}
	},
}
</script>

<style scoped>
.text--set::first-letter {
	font-size: 1.3em;
}

.text--set {
	font-size: 0.9em;
}
</style>