<template>
    <div>
        <div class="position-relative">
            <!-- shape Hero -->
            <section class="section-shaped my-0">
                <div class="shape shape-style-1 shape-primary shape-skew">
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
                        <div class="row" v-if="busy">
                            <i class="fa fa-spin fa-spinner" />
                        </div>

                        <template v-if="artist && ! busy">
                            <div class="row">
                                <div class="col-4">
                                    <h3 class="text-white">{{ artist.name_en }}</h3>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <tabs fill class="flex-column flex-md-row">
                                        <card shadow>
                                            <tab-pane title="Albums">
                                                <span slot="title">
                                                    <i class="fa fa-music" />
                                                    Albums
                                                </span>

                                                <AlbumCard v-for="album in albums" :key="'album-' + album.id" :album="album" />
                                            </tab-pane>

                                            <tab-pane title="Subunits">
                                                <span slot="title">
                                                    <i class="fa fa-users" />
                                                    Subunits
                                                </span>

                                                <SubunitCard v-for="subunit in artist.subunits" :key="'subunit-' + subunit.id" :subunit="subunit" />
                                            </tab-pane>

                                            <tab-pane title="Members">
                                                 <span slot="title">
                                                    <i class="fa fa-user" />
                                                    Members
                                                  </span>
                                                <p class="description">Raw denim you probably haven't heard of them jean shorts
                                                    Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                                    cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro
                                                    keffiyeh dreamcatcher synth.</p>
                                            </tab-pane>
                                        </card>
                                    </tabs>
                                </div>
                            </div>
                        </template>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    import Tabs from "../components/Tabs/Tabs";
    import TabPane from "../components/Tabs/TabPane";
    import AlbumCard from "./components/AlbumCard";
    import SubunitCard from "./components/SubunitCard";

    export default {
        name: "artist",

        components: {
            SubunitCard,
            AlbumCard,
            Tabs,
            TabPane,
        },

        data() {
            return {
                artist: null,
                busy: true,
            };
        },

        computed: {
            albums() {
                return _.orderBy(this.artist.albums, ['release_date'], ['desc']);
            },
        },

        mounted() {
            axios.get('/api/artist/' + this.$route.params.artistId)
                .then((response => {
                    this.artist = response.data.data;

                    this.busy = false;
                }))
                .catch(error => {
                    console.log(error);

                    this.busy = false;
                });
        },
    };
</script>
