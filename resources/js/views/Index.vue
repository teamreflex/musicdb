<template>
    <div>
        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section-shaped my-0">
                <div class="shape shape-style-1 shape-default shape-skew">
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
                        <div class="row">
                            <div class="col-lg-6">
                                <h1 class="display-3 text-white">kpopdb
                                    <span>Maintain your collection</span>
                                </h1>
                                <p class="lead text-white">without having to learn how to use spreadsheets</p>
                                <div class="btn-wrapper">
                                    <router-link :to="{ name: 'artists' }"
                                                 class="btn btn-info mb-3 mb-sm-0">
                                        <fa-icon icon="music" /> View Artists
                                    </router-link>
                                    <router-link :to="{ name: 'register' }"
                                                 class="btn btn-neutral mb-3 mb-sm-0">
                                        <fa-icon icon="sign-in-alt" /> Sign up
                                    </router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- 1st Hero Variation -->
        </div>
        <section class="section section-lg pt-lg-0 mt--200">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="row row-grid">
                            <div class="col-lg-4">
                                <card class="border-0" hover shadow body-classes="py-5">
                                    <icon name="ni ni-collection" type="primary" rounded class="mb-4">
                                    </icon>
                                    <h6 class="text-primary text-uppercase">Track Merch</h6>
                                    <p class="description mt-3">Track albums you own, right down to signed and promo copies.
                                        Stop checking your binder every time you need to double check which photocard you're missing. We've all done it.</p>
<!--                                    <div>-->
<!--                                        <badge type="primary" rounded>design</badge>-->
<!--                                        <badge type="primary" rounded>system</badge>-->
<!--                                        <badge type="primary" rounded>creative</badge>-->
<!--                                    </div>-->
<!--                                    <base-button tag="a" href="#" type="primary" class="mt-4">-->
<!--                                        Learn more-->
<!--                                    </base-button>-->
                                </card>
                            </div>
                            <div class="col-lg-4">
                                <card class="border-0" hover shadow body-classes="py-5">
                                    <icon name="ni ni-bullet-list-67" type="success" rounded class="mb-4">
                                    </icon>
                                    <h6 class="text-success text-uppercase">Flex</h6>
                                    <p class="description mt-3">Show off rare, out of print or limited merch on your profile.</p>
<!--                                    <div>-->
<!--                                        <badge type="success" rounded>business</badge>-->
<!--                                        <badge type="success" rounded>vision</badge>-->
<!--                                        <badge type="success" rounded>success</badge>-->
<!--                                    </div>-->
<!--                                    <base-button tag="a" href="#" type="success" class="mt-4">-->
<!--                                        Learn more-->
<!--                                    </base-button>-->
                                </card>
                            </div>
                            <div class="col-lg-4">
                                <card class="border-0" hover shadow body-classes="py-5">
                                    <icon name="ni ni-favourite-28" type="warning" rounded class="mb-4">
                                    </icon>
                                    <h6 class="text-warning text-uppercase">Pick Favorites</h6>
                                    <p class="description mt-3">Pick and display your favorite artist, subunit and album on your profile.</p>
<!--                                    <div>-->
<!--                                        <badge type="warning" rounded>marketing</badge>-->
<!--                                        <badge type="warning" rounded>product</badge>-->
<!--                                        <badge type="warning" rounded>launch</badge>-->
<!--                                    </div>-->
<!--                                    <base-button tag="a" href="#" type="warning" class="mt-4">-->
<!--                                        Learn more-->
<!--                                    </base-button>-->
                                </card>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
    import {mapGetters} from "vuex";

    export default {
        name: "index",

        computed: {
            ...mapGetters({
                user: 'user',
            }),
        },

        mounted() {
            if (this.user) {
               //this.$router.push({ name: 'home' });
            }
        },
    };
</script>
