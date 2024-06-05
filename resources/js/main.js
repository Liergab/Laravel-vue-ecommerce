import './bootstrap';
import './assets/base.css'
import './assets/index.css'
import { createApp } from 'vue';
import app from './app.vue';
import router from './router'
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';

import 'primevue/resources/primevue.min.css';              
import 'primevue/resources/themes/aura-light-green/theme.css'; 
import 'primeicons/primeicons.css'; 
createApp(app)
.use(router)
.use(PrimeVue, { ripple: true })
.use(ToastService)
.mount('#app');