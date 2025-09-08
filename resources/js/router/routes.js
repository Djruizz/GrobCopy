
import {createRouter, createWebHistory} from 'vue-router';

const routes = [
    {
        path: '/',
        component: () => import('../layouts/PublicLayout.vue'),
        children: [
            {
                path: '',
                name: 'home',
                component: () => import('../pages/publicViews/HomeView.vue')
            },
            {
                path: '/services',
                name: 'Services',
                component: () => import('../pages/publicViews/ServicesView.vue'),
            },
            {
                path : '/products',
                name : 'Products',
                component : () => import('../pages/publicViews/ProductsView.vue')
            },
            {
                path: '/about',
                name: 'About',
                component: () => import('../pages/publicViews/AboutView.vue')
            },
            {
                path: '/locations',
                name: 'Locations',
                component: () => import('../pages/publicViews/LocationsView.vue')
            },
            {
                path: '/contact',
                name: 'Contact',
                component: () => import('../pages/publicViews/ContactView.vue')
            }
        ]

    }
]

const router = createRouter({
    history: createWebHistory(),
    routes,
});
export default router;