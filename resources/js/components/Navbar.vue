<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <router-link to="/" class="navbar-brand">المتجر</router-link>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav"
                aria-controls="navbarNav"
                aria-expanded="false"
                aria-label="Toggle navigation"
            >
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link
                            to="/"
                            class="nav-link"
                            active-class="active"
                            exact
                            >الرئيسية</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            to="/cart"
                            class="nav-link"
                            active-class="active"
                            >سلة المشتريات</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            to="/orders"
                            class="nav-link"
                            active-class="active"
                            >الطلبات</router-link
                        >
                    </li>
                    <li class="nav-item">
                        <router-link
                            to="/add-product"
                            class="nav-link"
                            active-class="active"
                            >إضافة منتج</router-link
                        >
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
export default {};
</script>

<style scoped>
.nav-link.active {
    font-weight: bold;
}
</style>
