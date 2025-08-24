<template>
    <nav
        class="navbar navbar-expand-lg fixed-top px-4 py-3"
        :class="{ 'bg-dark': !isHome }"
        v-if="!isAdmin"
    >
        <div class="container">
            <router-link class="navbar-brand m-0" to="/"
                ><img :src="logoImg" alt="Logo"
            /></router-link>
            <span class="navbar-toggler">
                <button
                    class="btn btn-primary text-white"
                    type="button"
                    data-bs-toggle="collapse"
                    data-bs-target="#navbarNav"
                    aria-controls="navbarNav"
                    aria-expanded="false"
                    aria-label="Toggle navigation"
                >
                    Menú
                    <Icon name="menu" :custom-parameters="iconParameters" />
                </button>
            </span>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav text-uppercase ms-auto custom-link">
                    <li
                        v-for="(link, index) in navLinks"
                        :key="index"
                        class="nav-item"
                    >
                        <router-link
                            class="nav-link"
                            to="{{ link.url }}"
                            exact-active-class="text-primary"
                        >
                            {{ link.label }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script setup>
import { useRoute } from "vue-router";
import { computed } from "vue";

//components
import Icon from "../components/Icon.vue";
const iconParameters = {
    width: "16",
    height: "16",
};

import logoImg from "../../../public/images/GROB-v2.png";

//get current route
const route = useRoute();
const isHome = computed(() => route.path === "/");
const isAdmin = computed(() => route.path === "/admin");

//navigation links
const navLinks = [
    { label: "Servicios", url: "/services" },
    { label: "Productos", url: "/products" },
    { label: "Catálogo", url: "/catalogue" },
    { label: "Nosotros", url: "/about" },
    { label: "Ubicaciones", url: "/locations" },
    { label: "Contacto", url: "/contact" },
];
</script>

<style scoped>
.custom-link li a {
    color: white;
    margin: 0 10px;
}
.custom-link li a:hover {
    color: var(--bs-primary);
}
@media (max-width: 992px) {
    .navbar {
        background-color: var(--bs-dark); /* color para móvil */
    }
    @media (max-width: 338px) {
        .navbar .container {
            justify-content: center !important;
        }
    }
}
</style>
