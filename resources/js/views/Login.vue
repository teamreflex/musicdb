<template>
    <div>
        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section-shaped my-0">
                <div class="shape shape-style-1 shape-dark shape-skew">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="container shape-container d-flex">
                    <div class="col px-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <card type="secondary" shadow
                                      header-classes="bg-white pb-5"
                                      body-classes="px-lg-5 py-lg-5"
                                      class="border-0">
                                    <template>
                                        <div class="text-center text-muted mb-4">
                                            <small>Sign in with credentials</small>
                                        </div>
                                        <form role="form">
                                            <base-input alternative
                                                        v-model="form.email"
                                                        class="mb-3"
                                                        placeholder="Email"
                                                        addon-left-icon="ni ni-email-83">
                                            </base-input>
                                            <base-input alternative
                                                        v-model="form.password"
                                                        type="password"
                                                        placeholder="Password"
                                                        addon-left-icon="ni ni-lock-circle-open">
                                            </base-input>
                                            <base-checkbox>
                                                Remember me
                                            </base-checkbox>
                                            <div class="text-center">
                                                <base-button type="primary" class="my-4" @click="login">Sign In</base-button>
                                            </div>
                                        </form>
                                    </template>
                                </card>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <a href="#" class="text-light">
                                            <small>Forgot password?</small>
                                        </a>
                                    </div>
                                    <div class="col-6 text-right">
                                        <router-link :to="{ name: 'register' }" class="text-light">
                                            <small>Create new account</small>
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    import {mapMutations} from "vuex";

    export default {
        data() {
            return {
                form: {
                    email: null,
                    password: null,
                },
            };
        },

        methods: {
            ...mapMutations({
                setUser: 'setUser',
            }),

            login() {
                axios.get('/airlock/csrf-cookie')
                    .then(response => {
                        axios.post('/api/login', this.form)
                            .then(response => {
                                this.fetchUser();
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    });
            },

            fetchUser() {
                axios.get('/api/user')
                    .then(response => {
                        this.setUser(response.data.data);

                        this.$router.push({ name: 'home' });
                    })
                    .catch(error => {
                        console.log(error);
                    });
            },
        }
    };
</script>
<style>
</style>
