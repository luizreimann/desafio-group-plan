<template>
<div>
    <h1>Add Training</h1>
    <router-link to="/trainings">Back to Trainings</router-link>
    <form @submit.prevent="addTraining">
    <input v-model="title" type="text" placeholder="Title" required />
    <input v-model="description" type="text" placeholder="Description" required />
    <button type="submit">Add Training</button>
    </form>
</div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import axios from 'axios';
import { useRouter } from 'vue-router'; // Importar useRouter

export default defineComponent({
name: 'AddTraining',
setup() {
    const title = ref('');
    const description = ref('');
    const router = useRouter(); // Usar useRouter

    const addTraining = async () => {
    try {
        await axios.post('/api/trainings', { title: title.value, description: description.value });
        router.push('/trainings'); // Usar router para navegação
    } catch (error) {
        console.error(error);
    }
    };

    return { title, description, addTraining };
}
});
</script>
