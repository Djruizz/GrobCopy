<template>
    <div>
        <!-- Header fijo -->
        <Header/>

        <!-- Contenido dinámico según la ruta -->
        <div :class="{ 'main-content': !isHome }">
            <div :class="{ container: !isAdminRoute && !isHome}">
                <router-view></router-view>
            </div>
        </div>
        
        <!-- Footer fijo -->
        <Footer/>
    </div>
</template>

<script setup>
import Header from "./Header.vue";
import Footer from "./Footer.vue";
import { computed } from "vue";
import { useRoute } from "vue-router";

const route = useRoute();
const isHome = computed(() => route.path === "/");
const isAdminRoute = computed(() => route.path.startsWith("/admin"));
</script>

<style scoped>
.main-content {
    padding-top: 170px;
}
</style>