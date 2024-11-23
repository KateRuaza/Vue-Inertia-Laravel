<script setup>

</script>
<template>
	<h1>Default</h1>
	<Link :href="route('login')">Login</Link>
	<Link :href="route('registration')">Registration</Link>
	<slot></slot>
</template>