<script setup>
import { useForm } from '@inertiajs/vue3';
import Input from '../../Components/Input.vue';

const form = useForm({
	email: null,
	password: null
});

const submitForm = () => {
	form.post('/login-user', {
		onSuccess: () => {
			form.reset();
		}
	});
};
</script>
<template>
	<h1>Login</h1>
	<form @submit.prevent="submitForm">
		<Input v-model="form.email" label="Email" :message="form.errors.email" :autofocus="true"/>
		<Input v-model="form.password" type="password" label="Password" :message="form.errors.password"/>
		<button :disabled="form.processing" type="submit" class="btn btn-primary">
			Login
		</button>
	</form>
</template>