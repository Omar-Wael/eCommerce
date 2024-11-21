<template>
    <div class="container">
        <h1>{{ $t('orders') }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>{{ $t('order_id') }}</th>
                    <th>{{ $t('customer_name') }}</th>
                    <th>{{ $t('order_status') }}</th>
                    <th>{{ $t('order_total') }}</th>
                    <th>{{ $t('actions') }}</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="order in orders" :key="order.id">
                    <td>{{ order.id }}</td>
                    <td>{{ order.user.name }}</td>
                    <td>{{ order.status }}</td>
                    <td>{{ order.total }}</td>
                    <td>
                        <button @click="generateInvoice(order.id)" class="btn btn-primary">
                            {{ $t('generate_invoice') }}
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            orders: [],
        };
    },
    mounted() {
        this.fetchOrders();
    },
    methods: {
        fetchOrders() {
            axios.get('/orders')
                .then(response => {
                    console.log('Orders:', response.data);
                    this.orders = response.data;
                })
                .catch(error => {
                    console.error(error);
                });
        },
        generateInvoice(orderId) {
            // Use the browser's `window.open` method to download the PDF
            const lang = this.$i18n.locale; // Pass current locale as query parameter
            const downloadUrl = `/invoice/${orderId}?lang=${lang}`;
            window.open(downloadUrl, '_blank'); // Open the URL in a new tab for file download
        }
    }
}
</script>
