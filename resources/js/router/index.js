import { createRouter, createWebHistory } from 'vue-router';

import Home from '../pages/PublicPage/Homepage.vue';
import About from '../pages/PublicPage/AboutPage.vue';
import NotFound from '../components/NotFoundPage.vue';
import LoginPage from '../pages/PublicPage/LoginPage.vue'
import RegisterPage from '../pages/PublicPage/Register.vue'
import VerificationPage from '../pages/PublicPage/VerificationPage.vue'

// Mock functions to simulate authentication and role retrieval
const isAuthenticated = () => !!localStorage.getItem('user');
const getUserRole = () => localStorage.getItem('userRole');

const routes = [
    {
        path: '/',
        component: Home,
        name:'home'
    },
    {
        path: '/about',
        component: About,
        name : 'about'
    },
    {
        path: '/login',
        component: LoginPage,
        name : 'login'
    },
    {
        path: '/register',
        component: RegisterPage,
        name : 'register'
    },
    {
        path: '/verification',
        component: VerificationPage,
        name : 'verification'
    },
    // Uncomment these routes and import the components when they're available
    // {
    //     path: '/user/dashboard',
    //     component: UserDashboard,
    //     meta: { requiresAuth: true, role: 'USER' }
    // },
    // {
    //     path: '/admin/dashboard',
    //     component: AdminDashboard,
    //     meta: { requiresAuth: true, role: 'ADMIN' }
    // },
    {
        path: '/:path(.*)*',
        component: NotFound
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    const requiresAuth = to.matched.some(record => record.meta.requiresAuth);
    const userRole = getUserRole();

    if (requiresAuth && !isAuthenticated()) {
        next('/');
    } else if (requiresAuth && userRole !== to.meta.role) {
        next('/'); // Redirect to home if the role does not match
    } else {
        next(); // Proceed to the route
    }
});

export default router;
