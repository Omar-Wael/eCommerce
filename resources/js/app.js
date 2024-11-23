import { createApp } from "vue";
import App from "./components/App.vue"; // Main Vue component
import router from "./router"; // Import router

const app = createApp(App);
app.use(router);
app.mount("#app");
