<template>
  <div>
    <h1>User Training</h1>
    <router-link to="/">Home</router-link>
    <div v-for="userTraining in userTrainings" :key="userTraining.id">
      <h2>{{ userTraining.title }}</h2>
      <p>{{ userTraining.description }}</p>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue';
import axios from 'axios';
import { UserTraining } from '../types'; // Importar o tipo

export default defineComponent({
  name: 'UserTraining',
  setup() {
    const userTrainings = ref<UserTraining[]>([]); // Usar o tipo UserTraining[]

    const fetchUserTrainings = async () => {
      try {
        const response = await axios.get('/api/user-trainings');
        userTrainings.value = response.data;
      } catch (error) {
        console.error(error);
      }
    };

    onMounted(fetchUserTrainings);

    return { userTrainings };
  }
});
</script>
