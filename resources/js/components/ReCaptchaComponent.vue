<template>
    <VueRecaptcha
        ref="recaptchaRef"
        :sitekey="siteKey"
        :load-recaptcha-script="true"
        theme="dark"
        class="border rounded"
        @verify="handleSuccess"
        @error="handleError"
    ></VueRecaptcha>
</template>

<script setup>
import { computed, defineProps, watch, ref } from "vue";
import { VueRecaptcha } from "vue-recaptcha";

const props = defineProps({
    resetCaptcha: {
        type: Boolean,
        default: false,
    },
});

const recaptchaRef = ref(null);

watch(() => props.resetCaptcha, (newVal) => {
    if (newVal && recaptchaRef.value) {
        recaptchaRef.value.reset();
    }
});

const emit = defineEmits(['captchaSuccess']);

const siteKey = computed(() => {
    return "6LdQVMErAAAAAGtHWQTIXqlgtaQpdQPjTWR6ReQg";
});

const handleError = () => {
    emit("captchaSuccess", false);
};

const handleSuccess = () => {
    emit("captchaSuccess", true);
};
</script>

