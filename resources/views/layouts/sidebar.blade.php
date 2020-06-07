<v-navigation-drawer
	drawer
	{{-- v-model="drawer" --}}
	{{-- :mini-variant="true" --}}
	app
	dark
	clipped
	fixed
	:width="230"
	:mobile-break-point="767"
>
	<v-list class="pa-0" dense>
		{{-- <v-list-item to="/"> --}}
		<v-list-item>
			<v-tooltip right>
				<template v-slot:activator="{ on }">
					<v-list-item-icon v-on="on">
						<v-icon>dashboard</v-icon>
					</v-list-item-icon>
				</template>
				<span>Dashboard</span>
			</v-tooltip>

			<v-list-item-content>
				<v-list-item-title>Dashboard</v-list-item-title>
			</v-list-item-content>
		</v-list-item>
		
		<v-list-item href="{{ route('test.echo') }}">
			<v-tooltip right>
				<template v-slot:activator="{ on }">
					<v-list-item-icon v-on="on">
						<v-icon>dashboard</v-icon>
					</v-list-item-icon>
				</template>
				<span>Laravel Echo test</span>
			</v-tooltip>

			<v-list-item-content>
				<v-list-item-title>Laravel Echo test</v-list-item-title>
			</v-list-item-content>
		</v-list-item>
	</v-list>
</v-navigation-drawer>