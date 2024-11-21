import { createI18n } from 'vue-i18n';

// Translation messages
const messages = {
    en: {
        orders: 'Orders',
        order_id: 'Order ID',
        customer_name: 'Customer Name',
        order_status: 'Order Status',
        order_total: 'Order Total',
        actions: 'Actions',
        generate_invoice: 'Generate Invoice',
    },
    ar: {
        orders: 'الطلبات',
        order_id: 'رقم الطلب',
        customer_name: 'اسم العميل',
        order_status: 'حالة الطلب',
        order_total: 'إجمالي الطلب',
        actions: 'الإجراءات',
        generate_invoice: 'توليد الفاتورة',
    },
};

// Create the i18n instance
export default createI18n({
    locale: 'en', // Default locale
    fallbackLocale: 'en', // Fallback locale
    messages,
});
