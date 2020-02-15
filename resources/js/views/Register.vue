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
                                        <small>Sign up with credentials</small>
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
                </div>
            </section>
        </div>
    </div>
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
