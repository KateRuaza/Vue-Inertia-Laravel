<script setup>
import { useForm } from '@inertiajs/vue3';
import Input from '../../Components/Input.vue';
import Form from '../../Components/Form.vue';

const form = useForm({
	name: null,
	email: null,
	password: null,
	password_confirmation: null
});

const submitForm = () => {
	form.post('/register-user', {
		onSuccess: () => {
            form.reset();
        }
	});
};
</script>

<template>
	<h1>Registration</h1>
	<Form :submitFunction="submitForm" buttonLabel="Register">
		<Input v-model="form.name" label="Name" :message="form.errors.name" :autofocus="true" />
		<Input v-model="form.email" type="email" label="Email" :message="form.errors.email"/>
		<Input v-model="form.password" label="Password" type="password" :message="form.errors.password"/>
		<Input v-model="form.password_confirmation" label="Confirm Password" type="password" :message="form.errors.password_confirmation"/>
	</Form>
</template>
