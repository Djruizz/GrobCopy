<template>
    <div class="text-center head-section mb-5 mt-3">
        <h1 class="text-uppercase" :class="{ 'text-white': whiteTitle }">
            {{ headInfo.title }}
        </h1>
        <h3 class="text-primary">{{ headInfo.subtitle }}</h3>
    </div>
</template>

<script setup>
defineProps({
    headInfo: {
        type: Object,
        required: true,
    },
    whiteTitle: {
        type: Boolean,
        default: false,
    },
});
</script>

<style scoped>
.head-section h1 {
    font-size: 2.5rem;
    font-weight: 700;
}
.head-section h3 {
    font-size: 1rem;
    font-weight: 500;
    font-family: "Playfair Display", serif;
    font-style: italic;
}
</style>
