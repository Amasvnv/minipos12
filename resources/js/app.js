import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import SideMenu from './components/SideMenu.vue';

import { createPinia } from 'pinia';
const pinia = createPinia();

const app = createApp(App)
app.use(pinia)
app.use(router)
app.component('SideMenu',SideMenu)
app.mount('#app-vue');