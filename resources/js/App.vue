<template>
    <div id="app">
        <router-view name="header"></router-view>
        <main>
            <div v-if="busy">
                <i class="fa fa-spin fa-spinner" />
            </div>

            <fade-transition origin="center" mode="out-in" :duration="250" v-else>
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

        data() {
            return {
                busy: true,
            };
        },

        computed: {
            ...mapGetters({
                user: 'user',
            }),
        },

        mounted() {
            axios.get('/api/user')
                .then(response => {
                    this.setUser(response.data.data);

                    this.busy = false;
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
