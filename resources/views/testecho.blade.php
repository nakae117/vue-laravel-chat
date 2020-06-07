@extends('layouts.test')

@section('content')
<div class="container">
	<v-row>
		<v-col>
			<echo-component
				url="{{ route('send.echo') }}"
			/>
		</v-col>
	</v-row>
</div>
@endsection