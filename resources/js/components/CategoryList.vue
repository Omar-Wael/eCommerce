<template>
    <div>
        <h4 class="text-center mb-3">الفئات</h4>
        <ul class="list-group">
            <li
                v-for="category in categories"
                :key="category.id"
                class="list-group-item"
                :class="{ active: category.id === activeCategoryId }"
            >
                <button
                    @click="selectCategory(category.id)"
                    class="btn btn-link text-decoration-none w-100 text-start"
                    :class="{ 'text-white': category.id === activeCategoryId }"
                >
                    {{ category.name }}
                </button>
            </li>
        </ul>
    </div>
</template>

<script>
export default {
    props: {
        categories: {
            type: Array,
            required: true,
        },
        activeCategoryId: {
            type: Number,
            default: null,
        },
    },
    methods: {
        selectCategory(categoryId) {
            this.$emit("category-selected", categoryId);
        },
    },
};
</script>

<style scoped>
.active {
    background-color: #0d6efd;
    color: white;
}
</style>
