<template>
	<div class="container pa-0">
		<v-card>
			<v-card-text>
				<!-- <v-list class="pa-0" dense v-if="chat">
					<v-list-item
						v-for="(message, key) in chat.messages" :key="'message-'+ key"
					>
						<v-list-item-content>
							<v-list-item-title>{{ message }}</v-list-item-title>
						</v-list-item-content>
					</v-list-item>
				</v-list> -->
			</v-card-text>

			<v-form @submit.prevent="sendMessage()" ref="formTest">
				<v-card-actions class="actions--input pa-0">
					<v-text-field
						type="text"
						v-model="message"
						placeholder="Escribe un message"
						required
						outlined
						solo
						dense
						flat
						hide-details
						name="message"
						color="cyan"
					>
						<template v-slot:append>
							<v-icon>send</v-icon>
						</template>
					</v-text-field>
				</v-card-actions>
			</v-form>
		</v-card>

		<v-overlay :value="loadingChat">
			<v-progress-circular indeterminate size="64"></v-progress-circular>
		</v-overlay>
	</div>
</template>

<script>
export default {
	name: 'Chat',
	mounted(){
		this.loadChat()
	},
	data: () => ({
		message: '',
		loadingChat: false,
		// echo: window.Echo,
		// chat: null
	}),
	watch: {
		$route(to, from) {
			this.loadChat()
		}
	},
	computed: {
		chat(){
			return this.$store.state.chat.data.filter((dataChat) => {
				return (dataChat.token === this.$root._route.params.token) ? dataChat : null;
			})
		}
	},
	methods: {
		loadChat(){
			this.$store.dispatch('chat/setCurrentChat', this.chat[0])
			/* this.loadingChat = true
			this.$store.dispatch('chat/getMessage', this.$root._route.params.id).then((chat) => {
				this.loadingChat = false
			}).catch((error) => {
				this.loadingChat = false
			}) */
		},
		sendMessage(){
			// 
		}
	}
}
</script>

<style scoped>
.v-card__text {
	height: calc(100vh - 88px);
	overflow-y: auto;
}
</style>

<style>
.actions--input .v-text-field__details {
	display: none !important;
}
</style>