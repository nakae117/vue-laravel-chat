@extends('layouts.app')

@section('content')
	{{-- <v-text-field
		type="text"
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
		<template v-slot:prepend-inner>
			<v-icon>looks_two</v-icon>
		</template>
	</v-text-field> --}}
	<router-view/>
@endsection