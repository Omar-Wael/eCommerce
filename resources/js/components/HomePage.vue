<template>
    <div>
        <h1 class="text-center mt-5">مرحبًا بك في المتجر</h1>
        <p class="text-center text-muted">
            تصفح الفئات المختلفة واستمتع بالتسوق!
        </p>

        <div class="d-flex gap-3">
            <div v-if="selectedCategory" class="products-list">
                <h3 class="text-center mb-3">
                    المنتجات في فئة: {{ selectedCategory.name }}
                </h3>
                <div class="row">
                    <div
                        class="col-md-4 text-end"
                        v-for="product in products"
                        :key="product.id"
                    >
                        <div class="card mb-3">
                            <!-- <img
                                v-if="product.pic"
                                :src="product.pic"
                                class="card-img-top"
                                :alt="product.name"
                            /> -->
                            <img
                                :src="product.pic"
                                class="card-img-top"
                                :alt="product.name"
                            />
                            <div class="card-body">
                                <h5 class="card-title">{{ product.name }}</h5>
                                <p class="card-text">
                                    {{ product.description }}
                                </p>
                                <p class="card-text">
                                    <strong>{{ product.price }} ر.س</strong>
                                </p>
                                <!-- Quantity Input -->
                                <div class="quantity text-end mb-2">
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
                                    @click="
                                        addToCart(product.id, product.quantity)
                                    "
                                >
                                    أضف إلى السلة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="categories-list col-md-3">
                <h3 class="text-center">الفئات</h3>
                <ul class="list-group mt-3 w-100">
                    <!-- <li
                    class="list-group-item"
                    v-for="category in categories"
                    :key="category.id"
                    :class="{ active: selectedCategoryId === category.id }"
                    @click="selectCategory(category)"
                >
                    {{ category.name }}
                </li> -->
                    <li
                        v-for="category in categories"
                        :key="category.id"
                        class="list-group-item"
                        :class="{ active: category === this.selectedCategory }"
                    >
                        <button
                            @click="selectCategory(category)"
                            class="btn btn-link text-decoration-none w-100 text-end"
                            :class="{
                                'text-white text-center':
                                    category === selectedCategory,
                            }"
                        >
                            {{ category.name }}
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            categories: [],
            selectedCategory: null,
            products: [],
        };
    },
    async created() {
        await this.fetchCategories();
        await this.selectCategoryById(1); // Default category ID 1
    },
    methods: {
        async fetchCategories() {
            try {
                const response = await axios.get("/categories");
                this.categories = response.data;
            } catch (error) {
                console.error("Error fetching categories:", error);
            }
        },
        async selectCategoryById(categoryId) {
            const category = this.categories.find((c) => c.id === categoryId);
            if (category) {
                this.selectedCategoryId = category.id;
                this.selectedCategory = category;
                await this.fetchProducts(category.id);
            }
        },
        async selectCategory(category) {
            this.selectedCategoryId = category.id;
            this.selectedCategory = category;
            await this.fetchProducts(category.id);
        },
        async fetchProducts(categoryId) {
            try {
                const response = await axios.get(
                    `/categories/${categoryId}/products`
                );
                this.products = response.data;
            } catch (error) {
                console.error("Error fetching products:", error);
            }
        },
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

<style scoped>
.categories-list {
    /* width: 50%; */
    margin: 0 auto;
}

.categories-list .active {
    background-color: #007bff;
    color: white;
}

.products-list {
    width: 80%;
    margin: 0 auto;
}
</style>
