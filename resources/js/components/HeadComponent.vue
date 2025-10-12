<template>
    <div class="text-center head-section mb-5 mt-3">
        <h1 class="text-uppercase" :class="{ 'text-white': isContactRoute }">
            {{ currentTitle }}
        </h1>
        <h3 class="text-primary">{{ currentSubtitle }}</h3>
    </div>
</template>

<script setup>
import { useRoute } from "vue-router";
import {headData} from "../data/headComponentData"

const router = useRoute()
const isContactRoute = router.path === "/contact"

const currentTitle = headData[router.name]?.title || "Sin título"
const currentSubtitle = headData[router.name]?.subtitle || "Sin subtitulo"



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
