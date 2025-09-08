<template>
    <HeadComponent
        :headInfo="{
            title: 'Ubicaciones',
            subtitle: 'Una sucursal siempre cerca de ti.',
        }"
    />
    <div class="accordion" id="locationsAccordion">
        <div
            class="accordion-item"
            v-for="(group, index) in groups"
            :key="index"
        >
            <h2 class="accordion-header" :id="'heading' + index">
                <button
                    class="accordion-button bg-light text-dark"
                    style="font-weight: 600"
                    type="button"
                    data-bs-toggle="collapse"
                    :data-bs-target="'#collapse' + index"
                    :aria-expanded="index === 0 ? 'true' : 'false'"
                    :aria-controls="'collapse' + index"
                >
                    {{ group.name.toUpperCase() }}
                </button>
            </h2>
            <div
                :id="'collapse' + index"
                class="accordion-collapse collapse"
                :class="index === 0 ? 'show' : ''"
                :aria-labelledby="'heading' + index"
                data-bs-parent="#locationsAccordion"
            >
                <div class="accordion-body">
                    <div class="row">
                        <div
                            class="col-md-4 card-group"
                            :class=" // Center cards if there are 2 or fewer in the group
                                locations.filter(
                                    (loc) => loc.group_id === group.id,
                                ).length <= 2
                                    ? 'mx-auto'
                                    : ''
                            "
                            v-for="(location, locIndex) in locations.filter(
                                (loc) => loc.group_id === group.id,
                            )"
                            :key="locIndex"
                        >
                            <div class="card mb-3">
                                <div class="card-header text-center">
                                    <h5
                                        class="card-title my-2"
                                        style="font-size: 15px"
                                    >
                                        {{ location.sucursal.toUpperCase() }}
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">
                                        {{ location.address }}
                                    </p>
                                    <p class="card-text">
                                        <span
                                            v-for="(
                                                phone, phoneIndex
                                            ) in location.phone"
                                            :key="phoneIndex"
                                        >
                                            {{ phone }}
                                            <span
                                                v-if="
                                                    phoneIndex <
                                                    location.phone.length - 1
                                                "
                                                >,
                                            </span>
                                        </span>
                                    </p>
                                    <a href="#" class="card-text custom-a">
                                        <span
                                            v-for="(
                                                email, emailIndex
                                            ) in location.email"
                                            :key="emailIndex"
                                        >
                                            {{ email }}
                                            <span
                                                v-if="
                                                    emailIndex <
                                                    location.email.length - 1
                                                "
                                                >,
                                            </span>
                                        </span>
                                    </a>
                                </div>
                                <div
                                    class="card-footer d-flex justify-content-center"
                                >
                                    <button
                                        class="btn btn-primary btn-sm py-2 text-dark mx-auto"
                                        :disabled="!location.lat || !location.lng"
                                        @click="openMap(location.lat, location.lng)"
                                    >
                                        <Icon
                                            name="map-pin"
                                            :customParameters="{
                                                width: 16,
                                                height: 16,
                                            }"
                                        ></Icon>
                                        Indicaciones
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import HeadComponent from "../../components/HeadComponent.vue";
import Icon from "../../components/Icon.vue";
const groups = [
    {
        id: 1,
        name: "Centros de distribución",
    },
    // Add more groups as needed
];

const locations = [
    {
        address: "Av. Reforma 123, Ciudad de México, CDMX ",

        sucursal: "Ciudad de México",
        phone: ["+52 55 1234 5678", "+52 55 8765 4321"],
        email: ["contacto@empresa.com"],
        group_id: 1,
        lat: 19.4326,
        lng: -99.1332,
    },
    // {
    //     address: "Calle Juárez 456, Guadalajara, Jalisco",
    //     sucursal: "Jalisco",
    //     phone: ["+52 33 8765 4321"],
    //     email: "guadalajara@empresa.com",
    //     group_id: 1,
    // },
    // {
    //     address: "Blvd. Díaz Ordaz 789, Monterrey, Nuevo León",
    //     sucursal: "Nuevo León",
    //     phone: ["+52 81 1122 3344", "+52 81 9988 7766"],
    //     email: "monterrey@empresa.com",
    //     group_id: 1,
    // },
    // {
    //     address: "Av. Universidad 101, Puebla, Puebla",
    //     sucursal: "Puebla",
    //     phone: ["+52 222 334 5566"],
    //     email: "puebla@empresa.com",
    //     group_id: 1,
    // },
    // {
    //     address: "Malecón 505, Veracruz, Veracruz",
    //     sucursal: "Veracruz",
    //     phone: ["+52 229 445 6677", "+52 229 998 1122"],
    //     email: "veracruz@empresa.com",
    //     group_id: 1,
    // },
    // {
    //     address: "Centro Histórico 202, Mérida, Yucatán",
    //     sucursal: "Yucatán",
    //     phone: ["+52 999 332 4455"],
    //     email: "merida@empresa.com",
    //     group_id: 1,
    // },
];

function openMap(lat, lng) {
    if (!lat || !lng) return;
    const url = `https://www.google.com/maps?q=${lat},${lng}`;
    window.open(url, "_blank");
}
</script>

<style scoped>
.custom-a {
    color: #7b95a3 !important;
    text-decoration: none !important;
}
.custom-a:hover {
    text-decoration: underline !important;
}
</style>
