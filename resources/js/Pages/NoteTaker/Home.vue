<script setup>
import { onMounted, ref } from 'vue';
import { useForm } from '@inertiajs/vue3';
import Input from '../../Components/Input.vue';
import axios from 'axios';

const form = useForm({
	contents: null,
});

const notes = ref([]);

const fetchNotes = () => {
	axios.get('/note-taker/notes')
		.then(response => {
			notes.value = response.data;
		});
};

const submitForm = () => {
	form.post('create-note', {
		onSuccess: () => {
			fetchNotes();
			form.reset();
		}
	});
};

const deleteNote = async (noteId) => {
    form.delete(`/note-taker/delete-note/${noteId}`, {
        onSuccess: () => {
        	fetchNotes();
        },
        onError: (errors) => {
            console.error('Error: ', errors);
        }
    });
};


onMounted(() => {
	fetchNotes();
});
</script>

<template>
	<Head title="Note Taker | Home"/>
	
	<form @submit.prevent="submitForm">
		<Input v-model="form.contents" label="Contents" :message="form.errors.contents"/>
		<button :disabled="form.processing" type="submit" class="btn btn-primary">Create Note</button>
	</form>

	<ul>
		<li v-for="note in notes" :key="note.id" class="mb-2">
			{{ note.contents }} 
			<button @click.prevent="deleteNote(note.id)" class="btn btn-danger">Delete</button>
		</li>
	</ul>
</template>
