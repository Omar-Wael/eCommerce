import { createRouter, createWebHistory } from "vue-router";
import HomePage from "./components/HomePage.vue";
import ProductList from "./components/ProductList.vue";
import Cart from "./components/Cart.vue";
import Orders from "./components/Orders.vue";
import AddProduct from "./components/ProductForm.vue";

const routes = [
    {
        path: "/",
        name: "Home",
        component: HomePage,
    },
    {
        path: "/category/:id",
        name: "CategoryProducts",
        component: ProductList,
        props: true, // Pass route params as props to the component
    },
    {
        path: "/cart",
        name: "Cart",
        component: Cart,
    },
    {
        path: "/orders",
        name: "Orders",
        component: Orders,
    },
    {
        path: "/add-product",
        name: "AddProduct",
        component: AddProduct,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

export default router;
