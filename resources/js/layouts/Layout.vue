<template>
    <div>
        <!-- Header fijo -->
        <Header/>

        <!-- Contenido dinámico según la ruta -->
        <div :class="{ 'main-content': !homeRoute }">
            <router-view></router-view>
        </div>
        
        <!-- Footer fijo -->
        <Footer/>

    </div>
</template>

<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
</script>

<style scoped>
.main-content {
    padding-top: 170px;
}
</style>
