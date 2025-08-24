
import {createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/',
        component: () => import('../layouts/PublicLayout.vue'),
        children: [
            {
                path: '',
                name: 'home',
                component: () => import('../pages/HomeView.vue')
            },
            {
                path: '/services',
                name: 'Services',
                component: () => import('../pages/HomeView.vue'),
            },
        ]

    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;