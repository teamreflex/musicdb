<template>
    <div id="app">
        <router-view name="header"></router-view>
        <main>
            <fade-transition origin="center" mode="out-in" :duration="250">
                <router-view/>
            </fade-transition>
        </main>
        <router-view name="footer"></router-view>
    </div>
</template>
<script>
    import { FadeTransition } from "vue2-transitions";
    import {mapGetters, mapMutations} from "vuex";

    export default {
        components: {
            FadeTransition
        },

        computed: {
            ...mapGetters({
                user: 'user',
            }),
        },

        mounted() {
            axios.get('/api/user')
                .then(response => {
                    this.setUser(response.data);
                })
                .catch(error => {
                    console.log(error);
                });
        },

        methods: {
            ...mapMutations({
                setUser: 'setUser',
            }),
        },
    };
</script>
