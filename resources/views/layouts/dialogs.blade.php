<v-dialog
	v-model="dialogUsers"
	width="400px"
	{{-- persistent --}}
>
	<v-card>
		<v-toolbar
			dense
			flat
			color="lime"
			dark
		>
			{{-- <v-toolbar-title>Usuarios</v-toolbar-title> --}}
			<v-text-field
				placeholder="Buscar usuario..."
				hide-details
				type="text"
			></v-text-field>

			<v-spacer></v-spacer>

			<v-btn
				icon
				small
				@click="dialogUsers = !dialogUsers"
				class="mr-1"
			>
				<v-icon>close</v-icon>
			</v-btn>
		</v-toolbar>

		<v-card-text
			class="content--users"
		>
			<v-list-item
				{{-- :to="{ name: 'chat', params: { id: '{{ $user->id }}'} }" --}}
				dense
				v-for="(user, key) in users"
				:key="`user-${key}`"
				@click="createChat(user.id)"
			>
				<v-list-item-avatar>
					<v-img :src="user.photo"></v-img>
				</v-list-item-avatar>

				<v-list-item-content>
					<v-list-item-title v-text="user.name"></v-list-item-title>
					<v-list-item-subtitle v-text="user.username"></v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
		</v-card-text>

		<v-card-actions>
			<v-spacer></v-spacer>

			<v-btn
				color="green darken-1"
				text
				@click="dialogUsers = !dialogUsers"
			>
				Cerrar
			</v-btn>
		</v-card-actions>
	</v-card>
</v-dialog>