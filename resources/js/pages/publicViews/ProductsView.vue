<template>
    <div class="container">
        <HeadComponent :headInfo="headInfo" />
        <div class="row">
            <div class="col">
                <!-- Tabs -->
                <ul class="nav nav-tabs" id="productsTab" role="tablist">
                    <li
                        class="nav-item"
                        role="presentation"
                        v-for="family in orderedFamilies"
                        :key="family.id"
                    >
                        <button
                            class="nav-link"
                            :class="{ active: activeTab === family.id }"
                            :id="`${family.name}-tab`"
                            data-bs-toggle="tab"
                            :data-bs-target="`#tab-${family.id}`"
                            type="button"
                            role="tab"
                            :aria-controls="`tab-${family.id}`"
                            :aria-selected="activeTab === family.id"
                            @click="activeTab = family.id"
                        >
                            {{ family.name }}
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-3" id="productsTabContent">
                    <div
                        class="tab-pane fade"
                        v-for="family in orderedFamilies"
                        :key="family.id"
                        :id="`tab-${family.id}`"
                        role="tabpanel"
                        :aria-labelledby="`${family.name}-tab`"
                        :class="{ 'show active': activeTab === family.id }"
                    >
                        <div class="row">
                            <div
                                class="col-md-4"
                                v-for="item in getProductsByFamily(family.id)"
                                :key="item.id"
                            >
                                <div class="card mb-4">
                                    <img
                                        class="card-img-top"
                                        :src="!item.image_url ? item.image_url : '/images/DefaultImg.webp'"
                                        :alt="item.familia"
                                    />
                                    <div class="card-body text-center p-2 border bg-light">
                                        <p class="card-title text-uppercase">
                                            {{ item.familia }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div v-if="getProductsByFamily(family.id).length === 0" class="col-12 text-center">
                                <p>No hay productos en esta categoría.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from "vue";
import HeadComponent from "../../components/HeadComponent.vue";

const headInfo = {
    title: "Productos",
    subtitle: "Nuestra Calidad es desarrollada en Equipo Original.",
};

const families = [
    { id: 1, name: "Suspensión", order: 1 },
    { id: 2, name: "Tracción Delantera", order: 2 },
    { id: 3, name: "Dirección", order: 3 },
    { id: 4, name: "Soportes", order: 4 },
];

const products = [
    { id: 1, familia: "Abrasadera", category_id: 1, image_url: "/images/products/1.jpg" },
    { id: 2, familia: "Amortiguadores", category_id: 1, image_url: "/images/products/2.jpg" },
    { id: 3, familia: "Barras Estabilizadoras", category_id: 1, image_url: "/images/products/3.jpg" },
    { id: 4, familia: "Bujes de Suspensión", category_id: 1, image_url: "/images/products/4.jpg" },
    { id: 5, familia: "Bujes de Suspensión", category_id: 1, image_url: "/images/products/5.jpg" },
    { id: 6, familia: "Bujes de Suspensión", category_id: 1, image_url: "/images/products/6.jpg" },
    { id: 7, familia: "Abrasadera", category_id: 2, image_url: "/images/products/1.jpg" },
    { id: 8, familia: "Amortiguadores", category_id: 2, image_url: "/images/products/2.jpg" },
    { id: 9, familia: "Barras Estabilizadoras", category_id: 2, image_url: "/images/products/3.jpg" },
    { id: 10, familia: "Bujes de Suspensión", category_id: 2, image_url: "/images/products/4.jpg" },
    { id: 11, familia: "Bujes de Suspensión", category_id: 2, image_url: "/images/products/5.jpg" },
    { id: 12, familia: "Bujes de Suspensión", category_id: 2, image_url: "/images/products/6.jpg" },
    { id: 13, familia: "Abrasadera", category_id: 3, image_url: "/images/products/1.jpg" },
    { id: 14, familia: "Amortiguadores", category_id: 3, image_url: "/images/products/2.jpg" },
    { id: 15, familia: "Barras Estabilizadoras", category_id: 3, image_url: "/images/products/3.jpg" },
    { id: 16, familia: "Bujes de Suspensión", category_id: 3, image_url: "/images/products/4.jpg" },
    { id: 17, familia: "Bujes de Suspensión", category_id: 3, image_url: "/images/products/5.jpg" },
    { id: 18, familia: "Bujes de Suspensión", category_id: 3, image_url: "/images/products/6.jpg" },
    { id: 19, familia: "Abrasadera", category_id: 4, image_url: "/images/products/1.jpg" },
    { id: 20, familia: "Amortiguadores", category_id: 4, image_url: "/images/products/2.jpg" },
    { id: 21, familia: "Barras Estabilizadoras", category_id: 4, image_url: "/images/products/3.jpg" },
    { id: 22, familia: "Abrasadera", category_id: 4, image_url: "/images/products/4.jpg" },
    { id: 23, familia: "Bujes de Suspensión", category_id: 4, image_url: "/images/products/5.jpg" },
    { id: 24, familia: "Bujes de Suspensión", category_id: 4, image_url: "/images/products/6.jpg" },
];

const activeTab = ref(families[0].id);

const orderedFamilies = computed(() =>
    families.slice().sort((a, b) => a.order - b.order)
);

function getProductsByFamily(familyId) {
    return products.filter(product => product.category_id === familyId);
}
</script>

<style scoped>
.card-img-top {
    width: 100%;
    height: 50%;
    max-height: 200px;
    object-fit: cover;
}
.card-title {
    font-size: 1.2rem;
    font-weight: bold;
}
</style>