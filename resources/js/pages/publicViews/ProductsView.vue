<template>
    <div class="container">
        <HeadComponent :headInfo="headInfo" />
        <div class="row">
            <div class="col">
                <!-- Tabs por cada categoria -->
                <ul class="nav nav-tabs" id="productsTab" role="tablist">
                    <li
                        class="nav-item"
                        role="presentation"
                        v-for="category in orderedCategories"
                        :key="category.id"
                    >
                        <button
                            class="nav-link"
                            :class="{ active: activeTab === category.id }"
                            :id="`${category.name}-tab`"
                            data-bs-toggle="tab"
                            :data-bs-target="`#tab-${category.id}`"
                            type="button"
                            role="tab"
                            :aria-controls="`tab-${category.id}`"
                            :aria-selected="activeTab === category.id"
                            @click="activeTab = category.id"
                        >
                            {{ category.name }}
                        </button>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content mt-3" id="productsTabContent">
                    <div
                        class="tab-pane fade"
                        v-for="category in orderedCategories"
                        :key="category.id"
                        :id="`tab-${category.id}`"
                        role="tabpanel"
                        :aria-labelledby="`${category.name}-tab`"
                        :class="{ 'show active': activeTab === category.id }"
                    >
                        <div class="row">
                            <div
                                class="col-md-4"
                                v-for="item in getFamiliesByCategory(
                                    category.id,
                                )"
                                :key="item.id"
                            >
                                <div class="card mb-4">
                                    <img
                                        class="card-img-top"
                                        :src="
                                            `/images/Families/${item.image_url}` || '/images/DefaultImg.png'
                                        "
                                        :alt="item.familia"
                                    />
                                    <div
                                        class="card-body text-center p-2 border bg-light"
                                    >
                                        <p class="card-title text-uppercase">
                                            {{ item.name }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                v-if="
                                    getFamiliesByCategory(category.id)
                                        .length === 0
                                "
                                class="col-12 text-center"
                            >
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
import { ref, computed, onMounted } from "vue";
import HeadComponent from "../../components/HeadComponent.vue";

import { fetchCategories, fetchFamilies } from "../../api/useProducts.js";

const headInfo = {
    title: "Productos",
    subtitle: "Nuestra Calidad es desarrollada en Equipo Original.",
};


const categories = ref([]);
const families = ref([]);
const activeTab = ref(null);
// Ordena las categorías por el campo 'order'
const orderedCategories = computed(() =>
  categories.value.slice().sort((a, b) => a.order - b.order)
);

onMounted(async () => {
  try {
    categories.value = await fetchCategories();
    families.value = await fetchFamilies();
    // Inicializa el tab activo solo si hay categorías
    if (categories.value.length > 0) {
      activeTab.value = categories.value[0].id;
    }
  } catch (error) {
    console.error("Error fetching products:", error);
  }
});

function getFamiliesByCategory(categoryId) {
    return families.value.filter((family) => family.category_id === categoryId);
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
