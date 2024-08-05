<template>
  <div>
    <h1>Login</h1>
    <router-link to="/">Home</router-link>
    <form @submit.prevent="login">
      <input v-model="email" type="email" placeholder="Email" required />
      <input v-model="password" type="password" placeholder="Password" required />
      <button type="submit">Login</button>
    </form>
  </div>
</template>

<script lang="ts">
import { defineComponent, ref } from 'vue';
import { useRouter } from 'vue-router';  // Import the useRouter hook
import { useStore } from 'vuex';
import axios from 'axios';

export default defineComponent({
  name: 'Login',
  setup() {
    const email = ref('');
    const password = ref('');
    const store = useStore();
    const router = useRouter();  // Use the useRouter hook

    const login = async () => {
      try {
        const response = await axios.post('/api/login', { email: email.value, password: password.value });
        store.dispatch('login', response.data.user);
        router.push('/');  // Use router to navigate
      } catch (error) {
        console.error(error);
      }
    };

    return { email, password, login };
  }
});
</script>
