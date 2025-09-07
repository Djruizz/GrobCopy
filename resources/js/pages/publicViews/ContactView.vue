<template>
    <div class="container-fluid bg-container">
        <HeadComponent :headInfo="headInfo" :whiteTitle="true" />
        <div class="mx-auto" style="max-width: 1200px">
            <form action="post" class="mx-5" @submit.prevent="submitForm">
                <div class="row mb-3">
                    <!-- Columna Izquierda -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                name="department"
                                id="departmentSelect"
                                v-model="inputContent.department_id"
                            >
                                <option disabled value="">Departamento</option>
                                <option
                                    v-for="department in departments"
                                    :value="department.id"
                                >
                                    {{ department.department_name }}
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
                                v-model="inputContent.state"
                            >
                                <option value="" disabled>Estado</option>
                                <option v-for="state in states" :value="state">
                                    {{ state }}
                                </option>
                            </select>
                            <label for="stateSelect">Seleccione Estado</label>
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
                                v-model="inputContent.email"
                            />
                            <label for="emailInput">Email</label>
                        </div>
                    </div>
                    <!-- Columna Derecha -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input
                                class="form-control"
                                type="text"
                                id="phoneInput"
                                placeholder="Telefono"
                                v-model="inputContent.phone"
                            />
                            <label for="phoneInput">Teléfono</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea
                                class="form-control"
                                placeholder="Leave a comment here"
                                id="commentsInput"
                                v-model="inputContent.comments"
                                style="height: 132px"
                            ></textarea>
                            <label for="commentsInput">Commentarios</label>
                        </div>
                        <div class="d-flex aling-items-center mb-3">
                            <ReCaptchaComponent
                                @captchaSuccess="handleCaptcha"
                                :resetCaptcha="resetCaptcha"
                            />
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button
                        class="btn btn-primary text-white text-uppercase custom-btn"
                        :class="{ disabled: !canSubmit }"
                        type="submit"
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
import ReCaptchaComponent from "../../components/ReCaptchaComponent.vue";
import { onMounted, ref } from "vue";
import { sendEmail, fetchDepartments } from "../../api/useContact";
import { states } from "../../data/states.js";

const headInfo = {
    title: "Contacto",
    subtitle:
        "Puede enviarnos sus preguntas, comentarios ó sugerencias en el siguiente formulario, estamos a sus órdenes:",
};

const departments = ref([]);

const inputContent = ref({
    department_id: "",
    name: "",
    state: "",
    city: "",
    email: "",
    phone: "",
    comments: "",
});

const canSubmit = ref(false);
const resetCaptcha = ref(false);

onMounted(async () => {
    try {
        departments.value = await fetchDepartments();
    } catch (error) {
        console.error("Error fetching departments:", error);
    }
});

const handleCaptcha = (status) => {
    canSubmit.value = status;
    if (status) {
        resetCaptcha.value = false;
    }
};

const submitForm = async () => {
    try {
        await sendEmail(inputContent.value);
        resetCaptcha.value = true;
        canSubmit.value = false;

        // Reset form fields
        inputContent.value = {
            department_id: "",
            name: "",
            state: "",
            city: "",
            email: "",
            phone: "",
            comments: "",
        };
    } catch (error) {
        console.error("Error sending form:", error);
        alert(
            "Hubo un error al enviar el formulario. Por favor, inténtelo de nuevo.",
        );
    }
};
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
