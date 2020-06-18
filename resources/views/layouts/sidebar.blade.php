<v-navigation-drawer
	drawer
	{{-- v-model="drawer" --}}
	{{-- :mini-variant="true" --}}
	app
	dark
	clipped
	fixed
	:width="260"
	:mobile-break-point="767"
>
	<v-list
		class="pa-0"
		dense
		two-line
	>
		<v-divider></v-divider>
			
		<v-list-item
			dense
			v-for="(chat, key) in chats"
			:key="`chat-${key}`"
			:to="{ name: 'chat', params: { token: chat.token } }"
		>
			<v-list-item-avatar>
				<v-img :src="chat.receiver.photo"></v-img>
			</v-list-item-avatar>

			<v-list-item-content>
				<v-list-item-title v-html="chat.receiver.name"></v-list-item-title>
				<v-list-item-subtitle v-html="chat.receiver.username"></v-list-item-subtitle>
			</v-list-item-content>
		</v-list-item>
	</v-list>
</v-navigation-drawer>