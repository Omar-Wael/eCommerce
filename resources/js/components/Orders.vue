<template>
    <div>
        <h3 class="text-center mb-4">الطلبات</h3>
        <div v-if="orders.length > 0">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>رقم الطلب</th>
                        <th>التاريخ</th>
                        <th>الإجمالي</th>
                        <th>الحالة</th>
                        <th>الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="order in orders" :key="order.id">
                        <td>{{ order.id }}</td>
                        <td>{{ formatDate(order.created_at) }}</td>
                        <td>{{ order.total }} ر.س</td>
                        <td>{{ order.status }}</td>
                        <td>
                            <button
                                @click="generateInvoice(order.id)"
                                class="btn btn-primary"
                            >
                                تحميل الفاتورة
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div v-else>
            <p class="text-center">لم تقم بأي طلبات حتى الآن.</p>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            orders: [],
        };
    },
    async created() {
        await this.fetchOrders();
    },
    methods: {
        async fetchOrders() {
            try {
                const response = await axios.get("/orders");
                this.orders = response.data;
            } catch (error) {
                console.error("Error fetching orders:", error);
            }
        },
        generateInvoice(orderId) {
            // Use the browser's `window.open` method to download the PDF
            const downloadUrl = `/invoice/${orderId}`;
            window.open(downloadUrl, "_blank"); // Open the URL in a new tab for file download
        },
        formatDate(dateString) {
            const date = new Date(dateString);
            const options = {
                weekday: "long",
                year: "numeric",
                month: "short",
                day: "numeric",
            };
            return new Intl.DateTimeFormat("en-GB", options).format(date);
        },
    },
};
</script>
