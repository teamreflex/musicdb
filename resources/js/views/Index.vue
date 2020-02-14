<template>
    <div>
        <hero></hero>
    </div>
</template>
<script>
    import Hero from "./components/Hero";
    import {mapGetters} from "vuex";

    export default {
        name: "index",

        components: {
            Hero,
        },

        computed: {
            ...mapGetters({
                user: 'user',
            }),
        },

        mounted() {
            if (this.user) {
                this.$router.push({ name: 'home' });
            }
        },
    };
</script>
