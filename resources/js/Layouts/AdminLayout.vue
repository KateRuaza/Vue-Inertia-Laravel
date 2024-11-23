<script setup>

</script>
<template>
	<h1 v-if="$page.props.auth.user" href="#">Hi, {{ $page.props.auth.user.name }}</h1>
	<Link :href="route('/')">View Default</Link>
	<a href="/logout">Logout</a>
	<slot></slot>
</template>