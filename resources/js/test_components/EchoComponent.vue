<template>
	<div class="test-echo">
		<v-card>
			<v-app-bar
				dense
				flat
				color="green"
				dark
			>
				<v-toolbar-title>Test echo</v-toolbar-title>
			</v-app-bar>

			<v-form @submit.prevent="sendTest()" ref="formTest">
				<v-card-text>
					<v-list class="pa-0" dense>
						<v-list-item
							v-for="(item, key) in  data" :key="'list-'+ key"
						>
							<v-list-item-content>
								<v-list-item-title>{{ item }}</v-list-item-title>
							</v-list-item-content>
						</v-list-item>
					</v-list>
				</v-card-text>

				<v-card-actions>
					<v-text-field
						type="text"
						v-model="message"
						placeholder="Send message test"
						required
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
	</div>
</template>

<script>
	export default {
		name: 'EchoComponent',
		props: ['url'],
		mounted() {
			this.echo
				// .private('testecho')
				.channel('testecho')
				.listen('.message', (e) => {
					this.data.push(e.message)
				})
		},
		data: () => ({
			data: [],
			message: '',
			echo: window.Echo
		}),
		methods: {
			sendTest(){
				let data = new FormData(this.$refs.formTest.$el)
				window.axios.post(this.url, data).then((a) => {
					this.message = ''
				})
			}
		}
	}
</script>

<style scoped>
.v-card__text {
	height: calc(100vh - 202px);
	overflow-y: auto;
}
</style>

<style>
.v-text-field__details {
	display: none !important;
}
</style>
