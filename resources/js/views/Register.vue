<template>
    <section class="section section-shaped section-lg my-0">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container pt-lg-md">
            <div class="row justify-content-center">
                <div class="col-lg-5">
                    <card type="secondary" shadow
                          header-classes="bg-white pb-5"
                          body-classes="px-lg-5 py-lg-5"
                          class="border-0">
                        <template>
                            <div class="text-muted text-center mb-3">
                                <small>Sign in with</small>
                            </div>
                            <div class="btn-wrapper text-center">
                                <base-button type="neutral">
                                    <i class="fa fa-twitter" />
                                    Twitter
                                </base-button>

                                <base-button type="neutral">
                                    <i class="fa fa-spotify" />
                                    Spotify
                                </base-button>

                                <base-button type="neutral">
                                    <i class="fa fa-lastfm" />
                                    Last.fm
                                </base-button>
                            </div>
                        </template>
                        <template>
                            <div class="text-center text-muted mb-4">
                                <small>Or sign up with credentials</small>
                            </div>
                            <form role="form">
                                <base-input alternative
                                            v-model="form.username"
                                            class="mb-3"
                                            placeholder="Username"
                                            addon-left-icon="ni ni-hat-3">
                                </base-input>
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
                                <base-input alternative
                                            v-model="form.password_confirmation"
                                            type="password"
                                            placeholder="Confirm Password"
                                            addon-left-icon="ni ni-lock-circle-open">
                                </base-input>
<!--                                <base-checkbox>-->
<!--                                    <span>I agree with the-->
<!--                                        <a href="#">Privacy Policy</a>-->
<!--                                    </span>-->
<!--                                </base-checkbox>-->
                                <div class="text-center">
                                    <base-button type="primary" class="my-4" @click="register">Create account</base-button>
                                </div>
                            </form>
                        </template>
                    </card>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    username: null,
                    email: null,
                    password: null,
                    password_confirmation: null,
                },
            };
        },

        methods: {
            register() {
                axios.post('/api/register', this.form)
                    .then(response => {
                        console.log(response);
                    })
                    .catch(error => {
                        console.log(error);
                    })
            },
        }
    };
</script>
<style>
</style>
