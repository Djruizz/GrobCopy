<template>
    <span v-html="svg"></span>
</template>

<script>
    import feather from 'feather-icons';

    export default {
        props: {
            name: {
                type: String,
            },
            customParameters: {
                type: Object,
                default: () => ({}),
            },
        },
        computed: {
            svg() {
                return (
                    feather.icons[this.name]?.toSvg(this.customParameters) || feather.icons['alert-triangle'].toSvg()
                );
            },
        },
        mounted() {
            feather.replace();
        },
        watch: {
            name() {
                this.$forceUpdate();
            },
        },
    };
</script>
