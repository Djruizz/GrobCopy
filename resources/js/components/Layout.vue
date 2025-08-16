<template>
    <div>
        <!-- Header fijo -->
        <Header />

        <!-- Contenido dinámico según la ruta -->
        <Header></Header>
        <div :class="{ 'main-content': !homeRoute }">
            <router-view></router-view>
        </div>

    </div>
</template>

<script setup>
import Header from "./Header.vue";
</script>

<style scoped>
.main-content {
    padding-top: 170px;
}
</style>
