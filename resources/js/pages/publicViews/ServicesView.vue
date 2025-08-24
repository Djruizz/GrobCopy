<template>
    <HeadComponent :headInfo="headInfo"></HeadComponent>
    <div class="row">
        <div
            class="col-md-4 mb-4"
            v-for="(service, index) in services"
            :key="index"
        >
            <div class="card text-center mb-4 border-0">
                <div class="card-body bg-light">
                    <div class="icon-container mx-auto">
                        <Icon
                            :name="service.icon"
                            :customParameters="iconParameters"
                        ></Icon>
                    </div>
                    <h4 class="card-title my-3">{{ service.title }}</h4>
                    <p class="card-text">{{ service.text }}</p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import HeadComponent from "../../components/HeadComponent.vue";
import Icon from "../../components/Icon.vue";

const headInfo = {
    title: "Servicios",
    subtitle: "Somos Expertos en Seguridad y Confort",
};

const services = [
    {
        icon: "shield",
        title: "Seguridad",
        text: "Protegemos lo que más valoras con sistemas de seguridad avanzados y soluciones personalizadas.",
    },
    {
        icon: "home",
        title: "Domótica",
        text: "Transformamos tu hogar en un espacio inteligente y conectado para mayor comodidad y eficiencia.",
    },
    {
        icon: "video",
        title: "Videovigilancia",
        text: "Monitoreo constante con tecnología de punta para garantizar la seguridad de tus espacios.",
    },
    {
        icon: "wifi",
        title: "Redes",
        text: "Diseñamos e implementamos redes robustas y seguras para mantenerte siempre conectado.",
    },
    {
        icon: "cloud",
        title: "Nube",
        text: "Soluciones en la nube que optimizan el almacenamiento y acceso a tus datos desde cualquier lugar.",
    },
    {
        icon: "smartphone",
        title: "Móviles",
        text: "Desarrollamos aplicaciones móviles personalizadas para mejorar la interacción y experiencia del usuario.",
    },
];

const iconParameters = {
    color: "white",
    stroke: "currentColor",
    "stroke-width": 2,
    width: "80",
    height: "80",
    display: "block",
};
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
