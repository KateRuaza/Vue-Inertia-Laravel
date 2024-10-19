<script setup>
const model = defineModel({
	type: null,
	required: true
});

defineProps({
	label: {
		type: String,
		required: true,
	},
	type: {
		type: String,
		default: 'text'
	},
	message: String,
	min: {
		type: [Number, String],
		default: null
	},
	max: {
		type: [Number, String],
		default: null
	},
	autofocus: {
		type: Boolean,
		default: false
	}
});
</script>

<template>
	<div class="mb-4">
		<label class="form-label">{{ label }}:</label>
		<input 
			v-model="model" 
			:type="type" 
			:class="{'is-invalid': message}" 
			:min="type === 'number' ? min : null" 
			:max="type === 'number' ? max : null"
			:autofocus="autofocus"
			class="form-control mb-2"
		/>
		<div v-if="message" class="invalid-feedback">{{ message }}</div>
	</div>
</template>
