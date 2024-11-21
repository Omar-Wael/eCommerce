<template>
    <div class="container">
        <h1>Shopping Cart</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Total</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in cart" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.quantity }}</td>
                    <td>{{ item.price }}</td>
                    <td>{{ item.quantity * item.price }}</td>
                    <td>
                        <button @click="removeFromCart(item.id)" class="btn btn-danger">Remove</button>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>Total: {{ total }}</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            cart: [],
        };
    },
    computed: {
        total() {
            return this.cart.reduce((sum, item) => sum + item.quantity * item.price, 0);
        },
    },
    methods: {
        fetchCart() {
            axios.get('/api/cart').then(response => {
                this.cart = response.data;
            });
        },
        removeFromCart(id) {
            axios.delete(`/api/cart/${id}`).then(() => {
                this.fetchCart();
            });
        },
    },
    mounted() {
        this.fetchCart();
    },
};
</script>
