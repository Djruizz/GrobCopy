<template>
    <div class="container-fluid bg-container">
        <HeadComponent :headInfo="headInfo" :whiteTitle="true" />
        <div class="mx-auto" style="max-width: 1200px">
            <form
                action="post"
                class="mx-5 needs-validation"
                @submit.prevent="handleForm"
                novalidate
            >
                <div class="row mb-3">
                    <!-- Columna Izquierda -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                :class="inputClass('department_id')"
                                name="department"
                                id="departmentSelect"
                                v-model="inputContent.department_id"
                                v-if="departments.length > 1"
                                @blur="onBlur('department_id')"
                            >
                                <option disabled :value="0">
                                    Departamento
                                </option>
                                <option
                                    v-for="department in departments"
                                    :value="department.id"
                                >
                                    {{ department.department_name }}
                                </option>
                            </select>
                            <input
                                v-else
                                type="text"
                                class="form-control"
                                id="departmentSelect"
                                disabled
                                placeholder="departmentInput"
                                :value="departments[0]?.department_name"
                            />
                            <label for="departmentSelect">Departamento *</label>
                            <div class="invalid-feedback">
                                Seleccione un departamento.
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                type="text"
                                :class="inputClass('name')"
                                class="form-control"
                                id="nameInput"
                                placeholder="name"
                                v-model="inputContent.name"
                                @blur="onBlur('name')"
                            />
                            <label for="nameInput">Nombre *</label>
                            <div class="invalid-feedback">
                                El nombre es obligatorio (mínimo 3 caracteres).
                            </div>
                        </div>

                        <div class="form-floating mb-3">
                            <select
                                class="form-select"
                                :class="inputClass('state')"
                                name="department"
                                id="stateSelect"
                                v-model="inputContent.state"
                                @blur="onBlur('state')"
                            >
                                <option value="" disabled>Estado</option>
                                <option v-for="state in states" :value="state">
                                    {{ state }}
                                </option>
                            </select>
                            <label for="stateSelect">Seleccione Estado *</label>
                            <div class="invalid-feedback">Elige un estado.</div>
                        </div>

                        <div class="form-floating mb-3">
                            <input
                                class="form-control"
                                :class="inputClass('city')"
                                type="text"
                                id="cityInput"
                                placeholder="Ciudad"
                                v-model="inputContent.city"
                                @blur="onBlur('city')"
                            />
                            <label for="cityInput">Ciudad *</label>
                            <div class="invalid-feedback">
                                La ciudad es obligatoria.
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input
                                class="form-control"
                                :class="inputClass('email')"
                                type="email"
                                id="emailInput"
                                placeholder="Email"
                                v-model="inputContent.email"
                                @blur="onBlur('email')"
                            />
                            <label for="emailInput">Email *</label>
                            <div class="invalid-feedback">
                                Proporcione un correo electrónico válido.
                            </div>
                        </div>
                    </div>
                    <!-- Columna Derecha -->
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input
                                class="form-control"
                                :class="inputClass('phone')"
                                type="text"
                                id="phoneInput"
                                placeholder="Telefono"
                                v-model="inputContent.phone"
                                @blur="onBlur('phone')"
                            />
                            <label for="phoneInput">Teléfono *</label>
                            <div class="invalid-feedback">
                                Proporcione un número de teléfono válido (10
                                dígitos, sin espacios ni caracteres).
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea
                                class="form-control"
                                :class="inputClass('comments')"
                                placeholder="Leave a comment here"
                                id="commentsInput"
                                v-model="inputContent.comments"
                                style="height: 132px"
                                @blur="onBlur('comments')"
                            ></textarea>
                            <label for="commentsInput">Commentarios *</label>
                            <div class="invalid-feedback">
                                Agregue sus comentarios.
                            </div>
                        </div>
                        <div
                            class="mb-3 mx-auto mx-md-0"
                            style="width: fit-content"
                        >
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
const inputContent = ref({});

const submitted = ref(false);
const canSubmit = ref(false);
const resetCaptcha = ref(false);

const touched = ref({
    department_id: false,
    name: false,
    state: false,
    city: false,
    email: false,
    phone: false,
    comments: false,
});

onMounted(async () => {
    resetInputs();
    try {
        departments.value = await fetchDepartments();
    } catch (error) {
        console.error("Error fetching departments:", error);
    }
});

const resetInputs = () => {
    inputContent.value = {
        department_id: 0,
        name: "",
        state: "",
        city: "",
        email: "",
        phone: "",
        comments: "",
    };
    touched.value = {
        department_id: false,
        name: false,
        state: false,
        city: false,
        email: false,
        phone: false,
        comments: false,
    };
    submitted.value = false;
};

// Maneja el estado del captcha
const handleCaptcha = (status) => {
    canSubmit.value = status;
    if (status) {
        resetCaptcha.value = false;
    }
};

const onBlur = (field) => {
    touched.value[field] = true;
};

//  Define las reglas de validación en un objeto
const validationRules = {
    department_id: (v) => v > 0,
    name: (v) => v.trim().length >= 3,
    state: (v) => v !== "",
    city: (v) => v.trim().length >= 3,
    email: (v) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v.trim()),
    phone: (v) => /^\d{10}$/.test(v.trim()),
    comments: (v) => v.trim().length > 0,
};

// Función para validar todos los campos
const validateInputs = () => {
    const errors = {};
    for (const field in validationRules) {
        errors[field] = !validationRules[field](
            inputContent.value[field] || "",
        );
    }
    return errors;
};

// Refactoriza inputClass para usar validateInputs
const inputClass = (field) => {
    const errors = validateInputs();
    return {
        "is-invalid":
            (touched.value[field] || submitted.value) && errors[field],
        "is-valid": (touched.value[field] || submitted.value) && !errors[field],
    };
};

// handleForm para usar validateInputs
const handleForm = () => {
    if (!canSubmit.value) return;

    submitted.value = true;

    const errors = validateInputs();
    const allValid = Object.values(errors).every((v) => v === false);
    if (!allValid) return;

    submitForm();
    resetInputs();
};

const submitForm = async () => {
    try {
        await sendEmail(inputContent.value);
        resetCaptcha.value = true;
        canSubmit.value = false;
    } catch (error) {
        console.error("Error sending form:", error);
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
