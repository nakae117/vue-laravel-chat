@extends('layouts.app')

@section('content')
	{{-- <v-text-field
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
	</v-text-field> --}}
	<router-view />
@endsection