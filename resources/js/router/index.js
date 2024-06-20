import { createRouter, createWebHistory } from 'vue-router';

import Home from '../pages/PublicPage/Homepage.vue'
import About from '../pages/PublicPage/AboutPage.vue'
import NotFound from '../components/NotFoundPage.vue'
import LoginPage from '../pages/PublicPage/LoginPage.vue'
import RegisterPage from '../pages/PublicPage/Register.vue'
import VerificationPage from '../pages/PublicPage/VerificationPage.vue'
import AdminDashboard from '../pages/AdminPage/AdminDashboard.vue'
import UserDashboard from '../pages/UserPage/UserDashboard.vue'
import { useUserStore } from '../store/userStore'
import Sample from '../pages/AdminPage/Sample.vue'
import Contact from '../pages/PublicPage/Contact.vue'
import ServicesPage from '../pages/PublicPage/ServicesPage.vue'
import AddProduct from '../pages/AdminPage/AddProduct.vue'
import OrderProductList from '../pages/AdminPage/OrderProductList.vue'
import OrderDetails from '../pages/AdminPage/OrderDetails.vue'

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
        path: '/services',
        component: ServicesPage,
        name : 'Services'
    },
    {
        path: '/contact',
        component: Contact,
        name : 'contact'
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
    {
        path: '/user/dashboard',
        component: UserDashboard,
        name:'userDashboard',
        meta: { requiresAuth: true, role: 'USER' }
    },
    {
        path: '/admin/dashboard',
        component: AdminDashboard,
        name:'adminDashboard',
        meta: { requiresAuth: true, role: 'ADMIN' },
        children: [
            {
                path: "sample",
                component: Sample,
                name: "sample",
            },
            {
                path:'add-product',
                component:AddProduct,
                name:'add-product'
            },
            {
                path:'order-details',
                component:OrderDetails,
                name:'order-details'
            },
            {
                path:'order-product',
                component:OrderProductList,
                name:'order-product'
            }
        ]
    },
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
    const userStore = useUserStore();
    const isLoggedIn = userStore.isLoggedIn;
    const userRole = userStore.user?.data?.role;

    if (isLoggedIn) {
        if (to.name === 'login' || to.name === 'home') {
            if (userRole === 'USER') {
                next({ name: 'userDashboard' }); 
            } else if (userRole === 'ADMIN') {
                next({ name: 'adminDashboard' }); 
            } else {
                next('/not-found');
            }
        } else {
            if (to.meta.requiresAuth && userRole !== to.meta.role) {
                next('/not-found'); 
            } else {
                next();
            }
        }
    } else {
        if (to.meta.requiresAuth) {
            next('/login'); 
        } else {
            next();
        }
    }
});
export default router;



