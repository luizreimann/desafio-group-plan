<template>
<div>
    <h1>Update User Training</h1>
    <router-link to="/user-training">Back to User Trainings</router-link>
    <form @submit.prevent="updateUserTraining">
    <input v-model="progress" type="number" placeholder="Progress" required />
    <button type="submit">Update Progress</button>
    </form>
</div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue';
import axios from 'axios';
import { useRoute, useRouter } from 'vue-router';

export default defineComponent({
name: 'UpdateUserTraining',
setup() {
    const route = useRoute();
    const router = useRouter();
    const progress = ref(0);
    const id = route.params.id;

    const fetchUserTraining = async () => {
    try {
        const response = await axios.get(`/api/user-trainings/${id}`);
        progress.value = response.data.progress;
    } catch (error) {
        console.error(error);
    }
    };

    const updateUserTraining = async () => {
    try {
        await axios.put(`/api/user-trainings/${id}`, { progress: progress.value });
        router.push('/user-training');
    } catch (error) {
        console.error(error);
    }
    };

    onMounted(fetchUserTraining);

    return { progress, updateUserTraining };
}
});
</script>