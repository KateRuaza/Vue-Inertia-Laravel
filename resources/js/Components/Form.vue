<script setup>
defineProps({
	buttonLabel: {
		type: String,
		required: true
	},
	submitFunction: {
		type: Function,
		required: true
	},
	showButton: {
		type: Boolean,
		default: true
	}
});
</script>

<template>
	<form @submit.prevent="submitFunction">
		<slot></slot>
		<button v-if="showButton" :disabled="!showButton" type="submit" class="btn btn-primary">
			{{ buttonLabel }}
		</button>
	</form>
</template>
