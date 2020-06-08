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
		@foreach($users as $user)
			<v-divider></v-divider>
			
			<v-list-item
				:to="{ name: 'chat', params: { id: '{{ $user->id }}'} }"
				dense
			>
				<v-list-item-avatar>
					<v-img src="{{ $user->photo }}"></v-img>
				</v-list-item-avatar>

				<v-list-item-content>
					<v-list-item-title v-html="'{{ $user->name }}'"></v-list-item-title>
					<v-list-item-subtitle v-html="'{{ $user->username }}'"></v-list-item-subtitle>
				</v-list-item-content>
			</v-list-item>
		@endforeach
	</v-list>
</v-navigation-drawer>