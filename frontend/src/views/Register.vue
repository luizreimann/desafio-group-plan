<template>
  <div>
    <h1>Register</h1>
    <router-link to="/">Home</router-link>
    <form @submit.prevent="register">
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Password" required />
      <button type="submit">Register</button>
    </form>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { useRouter } from 'vue-router';  // Import the useRouter hook
import axios from 'axios';

export default defineComponent({
  name: 'Register',
  setup() {
    const email = ref('');
    const password = ref('');
    const router = useRouter();  // Use the useRouter hook

    const register = async () => {
      try {
        await axios.post('/api/register', { email: email.value, password: password.value });
        router.push('/login');  // Use router to navigate
      } catch (error) {
        console.error(error);
      }
    };

    return { email, password, register };
  }
});
</script>
