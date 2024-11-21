<template>
    <div>
        <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">eCommerce</a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/cart">Cart</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/add-product">Add Product</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <router-link class="navbar-brand" to="/">My eCommerce</router-link>
                <!-- <a class="navbar-brand" href="#">My eCommerce</a> -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <router-link class="nav-link" to="/">Home</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/orders">Orders</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/cart">Cart</router-link>
                        </li>
                        <li class="nav-item">
                            <router-link class="nav-link" to="/add-product">Add Product</router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <div>
                <!-- <button @click="changeLocale('en')">English</button>
                <button @click="changeLocale('ar')">العربية</button> -->
                <a href="?lang=ar">{{ __('messages.arabic') }}</a>
                <a href="?lang=en">{{ __('messages.english') }}</a>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
export default {
    name: 'App',
    methods: {
        changeLocale(locale) {
            this.$i18n.locale = locale; // Change the current locale
        },
    },
};
</script>

<style>
/* Add your global styles here */
.navbar {
    position: sticky;
    top: -1px;
    width: 100%;
    padding: 1rem;
    z-index: 100;
}
</style>
