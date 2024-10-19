<script setup>
import { useForm } from '@inertiajs/vue3';
import Input from '../../Components/Input.vue';

const form = useForm({
	contents: null,
});

const submitForm = () => {
	form.post('create-note', {
		onSuccess: () => {
			form.reset();
		}
	});
};
</script>

<template>
	<Head title="Note Taker | Home"/>
	
	<form @submit.prevent="submitForm">
		<Input v-model="form.contents" label="Contents" :message="form.errors.contents"/>
		<button :disabled="form.processing" type="submit" class="btn btn-primary">Create Note</button>
	</form>
</template>
