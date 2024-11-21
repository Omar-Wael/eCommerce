import { createApp } from 'vue';
import i18n from './i18n'; // Import i18n configuration
import App from './components/App.vue'; // Main Vue component
import router from './router'; // Import router
import messages from './lang/messages'; // Import translations

// Create Vue I18n instance
const i18n = createI18n({
    locale: 'ar', // Default language
    fallbackLocale: 'en',
    messages,
});

const app = createApp(App);
app.use(router);
app.use(i18n);
app.mount('#app');
