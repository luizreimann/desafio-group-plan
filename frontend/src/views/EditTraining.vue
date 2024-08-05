<template>
<div>
    <h1>Edit Training</h1>
    <router-link to="/trainings">Back to Trainings</router-link>
    <form @submit.prevent="editTraining">
    <input v-model="title" type="text" placeholder="Title" required />
    <input v-model="description" type="text" placeholder="Description" required />
    <button type="submit">Update Training</button>
    </form>
</div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';

export default defineComponent({
name: 'EditTraining',
setup() {
    const route = useRoute();
    const router = useRouter();
    const title = ref('');
    const description = ref('');
    const id = route.params.id;

    const fetchTraining = async () => {
    try {
        const response = await axios.get(`/api/trainings/${id}`);
        title.value = response.data.title;
        description.value = response.data.description;
    } catch (error) {
        console.error(error);
    }
    };

    const editTraining = async () => {
    try {
        await axios.put(`/api/trainings/${id}`, { title: title.value, description: description.value });
        router.push('/trainings');
    } catch (error) {
        console.error(error);
    }
    };

    onMounted(fetchTraining);

    return { title, description, editTraining };
}
});
</script>