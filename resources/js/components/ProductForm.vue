<!-- <template>
    <div class="container">
        <h1>Add Product</h1>
        <form @submit.prevent="addProduct">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input v-model="product.name" type="text" id="name" class="form-control">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea v-model="product.description" id="description" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input v-model="product.price" type="number" id="price" class="form-control">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input @change="handleFileUpload" type="file" id="image" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            product: {
                name: '',
                description: '',
                price: '',
            },
            image: null,
        };
    },
    methods: {
        handleFileUpload(event) {
            this.image = event.target.files[0];
        },
        addProduct() {
            const formData = new FormData();
            formData.append('name', this.product.name);
            formData.append('description', this.product.description);
            formData.append('price', this.product.price);
            formData.append('image', this.image);

            axios.post('/products', formData).then(() => {
                alert('Product added!');
                this.$router.push('/');
            });
        },
    },
};
</script> -->
<template>
    <div class="product-form">
        <h2>{{ isEdit ? "Edit Product" : "Add Product" }}</h2>
        <form @submit.prevent="handleSubmit">
            <!-- Product Name -->
            <div class="mb-3">
                <label for="name" class="form-label">Product Name</label>
                <input type="text" id="name" v-model="product.name" class="form-control" required />
            </div>

            <!-- Product Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea id="description" v-model="product.description" class="form-control" required></textarea>
            </div>

            <!-- Product Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" id="price" v-model="product.price" step="0.01" class="form-control" required />
            </div>

            <!-- Category ID Field -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select id="category_id" v-model="product.category_id" class="form-select" required>
                    <option value="" disabled>Select a category</option>
                    <option v-for="category in categories" :key="category.id" :value="category.id">
                        {{ category.name }}
                    </option>
                </select>
            </div>

            <!-- Product Image -->
            <div class="mb-3">
                <label for="image" class="form-label">Product Image</label>
                <input type="file" id="image" @change="handleImageUpload" class="form-control" />
            </div>

            <button type="submit" class="btn btn-primary">
                {{ isEdit ? "Update Product" : "Add Product" }}
            </button>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    props: {
        isEdit: {
            type: Boolean,
            default: false,
        },
        initialProduct: {
            type: Object,
            default: () => ({
                name: "",
                description: "",
                price: 0,
                category_id: null,
                image: null,
            }),
        },
    },
    data() {
        return {
            product: { ...this.initialProduct },
            categories: [], // Holds the list of categories
        };
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
        handleImageUpload(event) {
            const file = event.target.files[0];
            this.product.image = file;
        },
        handleSubmit() {
            const formData = new FormData();
            Object.keys(this.product).forEach((key) => {
                formData.append(key, this.product[key]);
            });

            const url = this.isEdit
                ? `/products/${this.product.id}`
                : "/products";

            const method = this.isEdit ? "put" : "post";

            axios[method](url, formData, {
                headers: { "Content-Type": "multipart/form-data" },
            })
                .then(() => {
                    this.$emit("product-saved");
                    alert("Product saved successfully!");
                    this.$router.push("/");
                })
                .catch((error) => {
                    console.error("Error saving product:", error);
                });
        },
    },
    mounted() {
        this.fetchCategories();
    },
};
</script>

<style scoped>
.product-form {
    max-width: 600px;
    margin: 0 auto;
}
</style>
