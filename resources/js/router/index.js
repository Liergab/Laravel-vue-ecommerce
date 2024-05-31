import { createRouter, createWebHistory } from 'vue-router'

import Home from '../components/Homepage.vue'
import About from '../components/AboutPage.vue'
import NotFound from '../components/NotFoundPage.vue'

const routes = [
    {
        path: '/',
        component: Home
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/:pathMatch(.*)*',
        component: NotFound
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router