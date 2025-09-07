<template>
    <div
        class="modal fade"
        id="alertModal"
        tabindex="-1"
        aria-labelledby="alertModalLabel"
        ref="alertModalEl"
    >
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header text-primary">
                    <Icon :name="icon" class="me-2" />
                    <h5 class="modal-title" id="alertModalLabel">
                        {{ data.title }}
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                <div class="modal-body">
                    <p>{{ data.content }}</p>
                </div>
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-primary text-white"
                        data-bs-dismiss="modal"
                    >
                        Cerrar
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { defineProps, ref, defineEmits } from "vue";
import { watch, onMounted } from "vue";
import { Modal } from "bootstrap";
import Icon from "./Icon.vue";
const props = defineProps({
    show: {
        type: Boolean,
        default: false,
    },
    data: {
        type: Object,
        default: () => ({}),
    },
    icon: {
        type: String,
        default: "info",
    },
});
const emit = defineEmits(["hide"]);

const alertModalEl = ref([]);
let modalInstance = null;

onMounted(() => {
    modalInstance = new Modal(alertModalEl.value);

    alertModalEl.value.addEventListener("hidden.bs.modal", () => {
        if (props.show) {
            emit("hide");
        }
    });
});

watch(
    () => props.show,
    (newVal) => {
        if (!modalInstance) return;
        if (newVal) {
            modalInstance.show();
        } else {
            modalInstance.hide();
        }
    },
);
</script>
