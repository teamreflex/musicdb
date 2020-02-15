<template>
    <div class="profile-page">
        <section class="section-profile-cover section-shaped my-0">
            <div id="header" class="shape shape-style-1 shape-primary shape-skew alpha-4">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </section>
        <section class="section section-skew">
            <div class="container">
                <div v-if="busy">
                    <i class="fa fa-spin fa-spinner" />
                </div>

                <card shadow class="card-profile mt--300" no-body v-if="user && ! busy">
                    <div class="px-4">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img v-lazy="'/img/theme/team-4-800x800.jpg'" class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-3 text-lg-right align-self-lg-center">
                                <div class="card-profile-actions py-4 mt-lg-0">
                                    <router-link class="btn btn-default btn-sm mr-4" :to="{ name: 'artist', params: {artistId: 7} }">
                                        <i class="fa fa-heart" /> LOONA
                                    </router-link>

                                    <router-link class="btn btn-danger btn-sm mr-4" :to="{ name: 'artist', params: {artistId: 7} }">
                                        <i class="fa fa-heart" /> Kim Lip
                                    </router-link>
                                </div>
                            </div>
                            <div class="col-lg-4 order-lg-1">
                                <div class="card-profile-stats d-flex justify-content-center">
                                    <div>
                                        <span class="heading">{{ albums.length }}</span>
                                        <span class="description">Albums</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ photocards.length }}</span>
                                        <span class="description">Photocards</span>
                                    </div>
                                    <div>
                                        <span class="heading">{{ other.length }}</span>
                                        <span class="description">Other</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-5">
                            <h3>{{ user.username }}
                            </h3>
                            <div class="h6 font-weight-300"><i class="ni location_pin mr-2"></i>Auckland, New Zealand</div>
                        </div>
                        <div class="mt-5 py-5 border-top text-center">
                            <div class="row justify-content-center">
                                <div class="col-lg-9">
                                    <tabs fill class="flex-column flex-md-row">
                                        <card shadow>
                                            <tab-pane title="Albums">
                                                <span slot="title">
                                                    <i class="fa fa-music" />
                                                    Albums
                                                </span>

                                                <AlbumCard v-for="collectable in albums"
                                                           :key="'album-' + collectable.id"
                                                           :album="collectable.collectable"
                                                           :signed="collectable.is_signed"
                                                           :promo="collectable.is_promo"
                                                           :acquired="collectable.acquired_at"/>
                                            </tab-pane>

                                            <tab-pane title="Photocards">
                                                <span slot="title">
                                                    <i class="fa fa-portrait" />
                                                    Photocards
                                                </span>

                                                <p class="description">TBD</p>
                                            </tab-pane>

                                            <tab-pane title="Other">
                                                 <span slot="title">
                                                    <i class="fa fa-user" />
                                                    Other
                                                  </span>
                                                <p class="description">TBD</p>
                                            </tab-pane>
                                        </card>
                                    </tabs>
                                </div>
                            </div>
                        </div>
                    </div>
                </card>
            </div>
        </section>
    </div>
</template>

<script>
    import Tabs from "../components/Tabs/Tabs";
    import TabPane from "../components/Tabs/TabPane";
    import AlbumCard from "./components/AlbumCard";

    export default {
        components: {
            AlbumCard,
            Tabs,
            TabPane,
        },

        data() {
            return {
                user: null,

                busy: true,
            };
        },

        computed: {
            albums() {
                return _.filter(this.user.collection, c => c.collectable_type === 'album')
            },

            photocards() {
                return _.filter(this.user.collection, c => c.collectable_type === 'photocard')
            },

            other() {
                return _.filter(this.user.collection, c => ! ['album', 'photocard'].includes(c.collectable_type))
            },
        },

        mounted() {
            axios.get('/api/user/' + this.$route.params.username)
                .then(response => {
                    this.user = response.data.data;

                    this.busy = false;
                })
                .catch(error => {
                    console.log(error);
                });
        }
    };
</script>

<style>
    .section-profile-cover {
        height: 380px;
    }

    #header {
        background-color: black;
        //background-image: url("/img/theme/img-2-1200x1000.jpg");

        //filter: blur(10px);
        //transform: scale(1.1);
    }
</style>
