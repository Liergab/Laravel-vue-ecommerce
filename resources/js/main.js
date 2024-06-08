import './bootstrap';
import './assets/base.css'
import './assets/index.css'
import { createApp } from 'vue';
import { createPinia } from 'pinia';
import app from './app.vue';
import router from './router'
import PrimeVue from 'primevue/config';
import ToastService from 'primevue/toastservice';
import Tooltip from 'primevue/tooltip';


import 'primevue/resources/primevue.min.css';              
import 'primevue/resources/themes/aura-light-green/theme.css'; 
import 'primeicons/primeicons.css'; 
const pinia = createPinia();
createApp(app)
.use(router)
.use(pinia)
.use(PrimeVue, { ripple: true })
.directive('tooltip', Tooltip)
.use(ToastService)
.mount('#app');