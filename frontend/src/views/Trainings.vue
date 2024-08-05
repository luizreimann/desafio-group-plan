<template>
  <div>
    <h1>Trainings</h1>
    <router-link to="/">Home</router-link>
    <div v-for="training in trainings" :key="training.id">
      <h2>{{ training.title }}</h2>
      <p>{{ training.description }}</p>
    </div>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref, onMounted } from 'vue';
import axios from 'axios';
import { Training } from '../types'; // Importar o tipo

export default defineComponent({
  name: 'Trainings',
  setup() {
    const trainings = ref<Training[]>([]); // Usar o tipo Training[]

    const fetchTrainings = async () => {
      try {
        const response = await axios.get('/api/trainings');
        trainings.value = response.data;
      } catch (error) {
        console.error(error);
      }
    };

    onMounted(fetchTrainings);

    return { trainings };
  }
});
</script>
