<template>
    <div class="container">
        <h1>Product List</h1>
        <div class="row">
            <div v-for="product in products" :key="product.id" class="col-md-4 mb-2">
                <div class="card">
                    <img :src="product.image" class="card-img-top" :alt="product.name">
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                        <p class="card-text">{{ product.price }} SAR</p>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                            :data-bs-target="'#modal' + product.id">Add to Cart</button>
                    </div>
                </div>
                <div class="modal fade" :id="'modal' + product.id" tabindex="-1"
                    :aria-labelledby="'modalLabel' + product.id" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title fs-5" :id="'modalLabel' + product.id">Add Product <em>{{
                                    product.name
                                        }}</em> to Cart</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body d-flex flex-column gap-2">
                                <div class="form-group">
                                    <label for="name">Product Name:</label>
                                    <input type="text" id="name" v-model="product.name" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="description">Product Description:</label>
                                    <input type="text" id="description" v-model="product.description"
                                        class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="price">Product Price (SAR):</label>
                                    <input type="number" id="price" v-model="product.price" class="form-control"
                                        readonly>
                                </div>
                                <div class="form-group">
                                    <label for="quantity">Quantity:</label>
                                    <input type="number" id="quantity" v-model="product.quantity" class="form-control">
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button @click="addToCart(product)" type="button" class="btn btn-primary">Save
                                    changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            products: [],
        };
    },
    methods: {
        fetchProducts() {
            axios.get('/products').then(response => {
                this.products = response.data;
            });
        },
        addToCart(product) {
            axios.post('/cart', { product_id: product.id }).then(() => {
                alert('Product added to cart!');
            });
        },
    },
    mounted() {
        this.fetchProducts();
    },
};
</script>
