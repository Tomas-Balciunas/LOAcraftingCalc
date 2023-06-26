import { createRouter, createWebHistory } from 'vue-router';

import App from "../layouts/App.vue";

const routes = [
    {
        name: 'crafting',
        path: '/crafting',
        component: ()=>import('../pages/Crafting.vue')
    },
    {
        name: 'default',
        path: '/',
        component: App
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router


