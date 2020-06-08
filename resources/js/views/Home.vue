<template>
	<v-row class="mr-0 ml-0 pr-0 pl-0 justify-center">
		<v-col
			cols="12"
			sm="12"
			md="12"
			lg="12"
			class="section-skills section--blue"
		>
			<v-layout
				justify-center
				align-center
				class="text-center"
				style="height: calc(100vh - 72px);"
			>
				<v-row class="mr-0 ml-0 pr-0 pl-0 justify-center lime--text text--darken-5">
					<v-col
						cols="12"
						sm="12"
						md="10"
						lg="8"
					>
						<v-row>
							<v-col cols="12" sm="12" md="12" lg="12">
								<div class="display-1 pb-6">
									<v-icon
										style="font-size: 120px;"
										class="lime--text text--darken-5"
									>person</v-icon><br>
									<strong>Selecciona a un @usuario</strong>
								</div>
							</v-col>
						</v-row>
					</v-col>
				</v-row>
			</v-layout>
		</v-col>
	</v-row>
</template>

<script>
export default {
	name: 'Index'
}
</script>