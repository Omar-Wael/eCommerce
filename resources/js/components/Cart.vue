<template>
    <div>
        <h3 class="text-center mb-4">سلة المشتريات</h3>
        <div v-if="cartItems.length > 0">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>المنتج</th>
                        <th>الكمية</th>
                        <th>السعر</th>
                        <th>الإجمالي</th>
                        <th>إجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="item in cartItems" :key="item.id">
                        <td>{{ item.name }}</td>
                        <td>{{ item.quantity }}</td>
                        <td>{{ item.price }}</td>
                        <td>{{ item.total }}</td>
                        <td>
                            <button
                                class="btn btn-danger btn-sm"
                                @click="removeFromCart(item.id)"
                            >
                                حذف
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="text-end">
                <strong>الإجمالي: {{ cartTotal }} جنيه</strong>
            </div>
        </div>
        <div v-else>
            <p class="text-center">سلة المشتريات فارغة.</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            cartItems: [], // Initialize as an empty array
            cartTotal: 0, // Initialize as zero
        };
    },
    async created() {
        try {
            await this.fetchCartItems();
        } catch (error) {
            console.error("Error during component creation:", error);
        }
    },
    methods: {
        async fetchCartItems() {
            try {
                const response = await axios.get("/cart");
                this.cartItems = response.data.items || [];
                this.cartTotal = response.data.total || 0;
            } catch (error) {
                console.error("Error fetching cart items:", error);
            }
        },
        async removeFromCart(itemId) {
            try {
                await axios.delete(`/cart/${itemId}`);
                alert("تم الحذف من السلة.");
                await this.fetchCartItems(); // Refresh cart
            } catch (error) {
                console.error("Error removing item from cart:", error);
            }
        },
    },
};
</script>
