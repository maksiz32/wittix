import { createRouter, createWebHistory } from 'vue-router';
import Login from './components/Auth/Login.vue';
import UserList from './components/User/UserList.vue';
import Register from "./components/Auth/Register.vue";

const routes = [
    {
        path: '/',
        name: 'login',
        component: Login
    },
    {
        path: '/users',
        component: UserList,
        meta: { requiresAuth: true }
    },
    {
        path: '/register',
        component: Register
    }
];

const router = createRouter({
    history: createWebHistory(),
    routes
});

router.beforeEach((to, from, next) => {
    if (to.meta.requiresAuth && !localStorage.getItem('token')) {
        next({ name: 'login' });
    } else {
        next();
    }
});

export default router;
