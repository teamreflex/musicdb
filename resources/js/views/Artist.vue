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
                            <div class="row no-gutters">
                                <div class="col-4">
                                    <h3 class="text-white">{{ artist.name_en }}</h3>
                                </div>

                                <div class="col-4">
                                    <SetFavorite column="favorite_artist" :id="artist.id" />
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <tabs fill class="flex-column flex-md-row">
                                        <card shadow>
                                            <tab-pane title="Albums">
                                                <span slot="title">
                                                    <fa-icon icon="compact-disc" />
                                                    Albums
                                                </span>

                                                <AlbumCard v-for="album in albums"
                                                           :key="'album-' + album.id"
                                                           :album="album"
                                                           :show-add="!! user"
                                                           :show-remove="false"/>
                                            </tab-pane>

                                            <tab-pane title="Subunits">
                                                <span slot="title">
                                                    <fa-icon icon="users" />
                                                    Subunits
                                                </span>

                                                <p class="description text-center" v-if="artist.subunits.length === 0">
                                                    {{ artist.name_en }} has no subunits.
                                                </p>

                                                <SubunitCard v-for="subunit in artist.subunits" :key="'subunit-' + subunit.id" :subunit="subunit" />
                                            </tab-pane>

                                            <tab-pane title="Members">
                                                 <span slot="title">
                                                    <fa-icon icon="user" />
                                                    Members
                                                  </span>

                                                <p class="description text-center" v-if="artist.members.length === 0">
                                                    {{ artist.name_en }} has no members.
                                                </p>

                                                <MemberCard v-for="member in artist.members" :key="'member-' + member.id" :member="member" />
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
    import MemberCard from "./components/MemberCard";
    import {mapGetters} from "vuex";
    import SetFavorite from "./components/SetFavorite";

    export default {
        name: "artist",

        components: {
            SetFavorite,
            MemberCard,
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
            ...mapGetters({
                user: 'user',
            }),

            albums() {
                return _.chain(this.artist.albums)
                    .filter(album => album.primary_version)
                    .map(album => {
                        let versions = _.filter(this.artist.albums, {spotify_id: album.spotify_id});
                        if (versions) {
                            album.versions = versions;
                        }
                        return album;
                    })
                    .orderBy(['release_date'], ['desc'])
                    .value();
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
