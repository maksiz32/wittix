import './bootstrap';

import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import axios from './bootstrap';

const app = createApp(App);

app.config.globalProperties.$axios = axios;
app.use(router);
app.mount('#app');
