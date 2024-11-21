import { createRouter, createWebHistory } from 'vue-router';

// Import your components
import ProductList from './components/ProductList.vue';
import Cart from './components/Cart.vue';
import ProductForm from './components/ProductForm.vue';
import Orders from './components/Orders.vue';

const routes = [
    { path: '/', component: ProductList, name: 'home' },
    { path: '/cart', component: Cart, name: 'cart' },
    { path: '/add-product', component: ProductForm, name: 'add-product' },
    { path: '/orders', component: Orders, name: 'orders' },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
