<template>
    <div class="container-fluid bg-container">
        <HeadComponent :headInfo="headInfo" :whiteTitle="true" />
        <div class="mx-auto" style="max-width: 900px">
            <form action="post" class="mx-5">
                <div class="row mb-3">
                    <!-- Columna Izquierda -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                name="department"
                                id="departmentSelect"
                                v-model="inputContent.departmentId"
                            >
                                <option disabled value="">Departamento</option>
                                <option
                                    v-for="department in departments"
                                    :value="department.id"
                                >
                                    {{ department.name }}
                                </option>
                            </select>
                            <label for="departmentSelect"
                                >Seleccione departamento</label
                            >
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                class="form-control"
                                id="nameInput"
                                placeholder="name"
                                v-model="inputContent.name"
                            />
                            <label for="nameInput">Nombre</label>
                        </div>

                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                name="department"
                                id="stateSelect"
                                v-model="inputContent.stateId"
                            >
                                <option value="" disabled>Estado</option>
                                <option
                                    v-for="state in states"
                                    :value="state.id"
                                >
                                    {{ state.name }}
                                </option>
                            </select>
                            <label for="stateSelect"
                                >Seleccione Estado</label
                            >
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                class="form-control mb-3"
                                type="text"
                                id="cityInput"
                                placeholder="Ciudad"
                                v-model="inputContent.city"
                            />
                            <label for="cityInput">Ciudad</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input
                                class="form-control mb-3"
                                type="email"
                                id="emailInput"
                                placeholder="Email"
                            />
                            <label for="emailInput">Email</label>
                        </div>
                    </div>
                    <!-- Columna Derecha -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input
                                class="form-control"
                                type="number"
                                id="phoneInput"
                                placeholder="Phone"
                                v-model="inputContent.phone"
                            />
                            <label for="phoneInput">Teléfono</label>
                        </div>
                        <div class="form-floating">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="commentsInput"
                                v-model="inputContent.comments"
                                style="height: 132px"
                            ></textarea>
                            <label for="commentsInput">Commentarios</label>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button
                        class="btn btn-primary text-white text-uppercase custom-btn"
                    >
                        Enviar
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>

<script setup>
import HeadComponent from "../../components/HeadComponent.vue";
import { ref } from "vue";

const headInfo = {
    title: "Contacto",
    subtitle:
        "Puede enviarnos sus preguntas, comentarios ó sugerencias en el siguiente formulario, estamos a sus órdenes:",
};

const departments = [
    { id: 1, name: "Ventas" },
    { id: 2, name: "Soporte Técnico" },
    { id: 3, name: "Facturación" },
    { id: 4, name: "Recursos Humanos" },
    { id: 5, name: "Marketing" },
    { id: 6, name: "Atención al Cliente" },
];
const states = [
    { id: 1, name: "Aguascalientes" },
    { id: 2, name: "Baja California" },
    { id: 3, name: "Baja California Sur" },
    { id: 4, name: "Campeche" },
    { id: 5, name: "Chiapas" },
];

const inputContent = ref({
    departmentId: "",
    name: "",
    stateId: "",
    city: "",
    email: "",
    phone: "",
    comments: "",
});
</script>

<style scoped>
.bg-container {
    height: auto;
    padding-bottom: 50px;
    padding-top: 160px;
    background-color: var(--bs-dark);
    background-image: url("../images/map-image.png");
    background-position: center;
    background-repeat: no-repeat;
}
.custom-btn {
    padding: 25px 40px;
    font-weight: 800;
    font-size: 20px;
}
</style>
