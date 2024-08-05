import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import Trainings from '../views/Trainings.vue';
import UserTraining from '../views/UserTraining.vue';
import AddTraining from '../views/AddTraining.vue';
import EditTraining from '../views/EditTraining.vue';
import UpdateUserTraining from '../views/UpdateUserTraining.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/login', name: 'Login', component: Login },
  { path: '/register', name: 'Register', component: Register },
  { path: '/trainings', name: 'Trainings', component: Trainings },
  { path: '/user-training', name: 'UserTraining', component: UserTraining },
  { path: '/add-training', name: 'AddTraining', component: AddTraining },
  { path: '/edit-training/:id', name: 'EditTraining', component: EditTraining },
  { path: '/update-user-training/:id', name: 'UpdateUserTraining', component: UpdateUserTraining },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
