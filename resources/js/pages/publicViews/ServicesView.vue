<template>
    <HeadComponent :head-info="headInfo" />
    <div class="row">
        <div
            class="col-md-4 mb-4"
            v-for="service in services"
            :key="service.id"
        >
            <div class="card text-center mb-4 border-0">
                <div class="card-body bg-light">
                    <div class="icon-container mx-auto">
                        <Icon
                            :name="service.icon"
                            :custom-parameters="iconParameters"
                        />
                    </div>
                    <h4 class="card-title my-3">{{ service.title }}</h4>
                    <p class="card-text">{{ service.description }}</p>
                </div>
            </div>
        </div>
        <div v-if="error" class="col-12">
            <div class="alert alert-danger text-center">
                {{ error }}
            </div>
        </div>
    </div>
</template>

<script setup>
import HeadComponent from "../../components/HeadComponent.vue";
import Icon from "../../components/Icon.vue";
import { fetchServices } from "../../api/useServices";
import { onMounted, ref } from "vue";

const headInfo = {
    title: "Servicios",
    subtitle: "Somos Expertos en Seguridad y Confort",
};

const iconParameters = {
    color: "white",
    stroke: "currentColor",
    "stroke-width": 2,
    width: "80",
    height: "80",
    display: "block",
};

const services = ref([]);
const error = ref(null);

onMounted(async () => {
    try {
        services.value = await fetchServices();
    } catch (err) {
        error.value = "No se pudieron cargar los servicios. Intenta más tarde.";
        console.error('Error fetching services:', err);
    }
});
</script>

<style scoped>
.card-title {
    font-weight: bold;
}
.card-text {
    font-size: 15px;
    color: var(--bs-gray);
}
.icon-container {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 120px;
    width: 120px;
    border-radius: 100%;
    background-color: var(--bs-primary);
}
</style>