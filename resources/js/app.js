import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import Main from './views/Main.vue';
import Info from './views/Info.vue';

const routes = [
  { path: '/', component: Main },
  { path: '/info', component: Info },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp(App);
app.use(router);
app.mount('#app');
