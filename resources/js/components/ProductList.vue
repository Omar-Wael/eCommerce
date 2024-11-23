<template>
    <div>
        <h3 class="text-center mb-4">المنتجات للفئة: {{ categoryName }}</h3>
        <div class="row">
            <div class="col-md-4" v-for="product in products" :key="product.id">
                <div class="card mb-3">
                    <img
                        v-if="product.image"
                        :src="product.image"
                        class="card-img-top"
                        :alt="product.name"
                    />
                    <div class="card-body">
                        <h5 class="card-title">{{ product.name }}</h5>
                        <p class="card-text">{{ product.description }}</p>
                        <p class="card-text">
                            <strong>{{ product.price }} ر.س</strong>
                        </p>
                        <!-- Quantity Input -->
                        <div class="quantity">
                            <label for="quantity">الكمية:</label>
                            <input
                                type="number"
                                v-model="product.quantity"
                                min="1"
                                class="form-control"
                                id="quantity"
                            />
                        </div>
                        <button
                            class="btn btn-primary"
                            @click="addToCart(product.id, product.quantity)"
                        >
                            أضف إلى السلة
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: ["id"],
    data() {
        return {
            categoryName: "",
            products: [],
        };
    },
    async created() {
        try {
            // Fetch category name
            const categoryResponse = await axios.get(`/categories/${this.id}`);
            this.categoryName = categoryResponse.data.name;

            // Fetch products in category
            const productsResponse = await axios.get(
                `/categories/${this.id}/products`
            );
            this.products = productsResponse.data;
        } catch (error) {
            console.error("Error fetching category or products:", error);
        }
    },
    methods: {
        async addToCart(productId, quantity) {
            if (quantity < 1 || isNaN(quantity)) {
                alert("الكمية يجب أن تكون أكبر من 0");
                return;
            }

            try {
                const response = await axios.post("/cart", {
                    product_id: productId,
                    quantity: quantity,
                });

                alert(response.data.message);
            } catch (error) {
                console.error("Error adding product to cart:", error);
            }
        },
    },
};
</script>
