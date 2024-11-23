<template>
    <div>
        <Navbar />
        <div class="container mt-4">
            <router-view />
            <!-- Dynamic content displayed here -->
        </div>
    </div>
</template>

<script>
import Navbar from "./Navbar.vue";

export default {
    components: {
        Navbar,
    },
};
</script>
