<template>
	<div class="container">
		<v-card>
			<v-app-bar
				dense
				flat
				color="lime lighten-2"
				dark
			>
				<v-toolbar-title>{{ chat[0] ? chat[0].user.name : '' }}</v-toolbar-title>
			</v-app-bar>

			<v-form @submit.prevent="sendMessage()" ref="formTest">
				<v-card-text>
					<v-list class="pa-0" dense v-if="chat[0]">
						<v-list-item
							v-for="(message, key) in chat[0].messages" :key="'message-'+ key"
						>
							<v-list-item-content>
								<v-list-item-title>{{ message }}</v-list-item-title>
							</v-list-item-content>
						</v-list-item>
					</v-list>
				</v-card-text>

				<v-card-actions class="actions--input">
					<v-text-field
						type="text"
						v-model="message"
						placeholder="Send message test"
						required
						outlined
						solo
						dense
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
		echo: window.Echo,
	}),
	watch: {
		$route(to, from) {
			this.loadChat()
		}
	},
	computed: {
		chat(){
			return this.$store.state.chat.data.filter((dataChat) => {
				return (parseInt(dataChat.user.id) === parseInt(this.$root._route.params.id)) ? dataChat : null;
			})
		}
	},
	methods: {
		loadChat(){
			this.loadingChat = true
			this.$store.dispatch('chat/getChat', this.$root._route.params.id).then((chat) => {
				this.loadingChat = false
			}).catch((error) => {
				this.loadingChat = false
			})
		},
		sendMessage(){
			// 
		}
	}
}
</script>

<style scoped>
.v-card__text {
	height: calc(100vh - 180px);
	overflow-y: auto;
}
</style>

<style>
.actions--input .v-text-field__details {
	display: none !important;
}
</style>