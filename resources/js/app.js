import { createApp } from 'vue';
import { createRouter, createWebHistory } from 'vue-router';
import App from './App.vue';
import Main from './views/Main.vue';
import Info from './views/Info.vue';
import MainWorker from './views/MainWorker.vue';
import Gespraech from './views/Gespraech.vue';
import Ergebnissen from './views/Ergebnissen.vue';
import ErgebnissenWorker from './views/ErgebnissenWorker.vue';
import Admin from './views/Admin.vue';

const routes = [
  { path: '/', component: Main },
  { path: '/info', component: Info },
  { path: '/mainWorker', component: MainWorker },
  { path: '/gespraech', component: Gespraech },
  { path: '/ergebnisse', component: Ergebnissen },
  { path: '/ergebnisse_mitarbeiter', component: ErgebnissenWorker },
  { path: '/admin', component: Admin },
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

const app = createApp(App);
app.use(router);
app.mount('#app');
