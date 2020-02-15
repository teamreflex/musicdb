<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="album.icon_url" :alt="album.name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ album.name_en }} <span v-if="album.name_kr">({{ album.name_kr }})</span></h5>
                    <p class="card-text text-muted" v-if="album.version">{{ album.version }}</p>

                    <div v-if="acquired">
                        <p class="card-text text-muted">Acquired: {{ acquiredAt }}</p>
                        <p class="card-text text-muted">
                            Promo: <fa-icon :icon="promo ? 'check' : 'times'" />
                            Signed: <fa-icon :icon="signed ? 'check' : 'times'" />
                        </p>
                    </div>
                    <p class="card-text text-muted" v-else>Release: {{ release }}</p>

                    <p class="card-text text-muted" v-if="album.spotify_id">
                        <a :href="'https://open.spotify.com/album/' + album.spotify_id" target="_blank"><fa-icon :icon="['fab', 'spotify']" /> View on Spotify</a>
                    </p>
                    <p class="card-text">
                        <AddToCollection v-if="showAdd"
                                         :id="album.id"
                                         type="album"
                                         :name="album.name_en"
                                         :signed="true"
                                         :promo="true" />
                        <RemoveFromCollection v-if="showRemove"
                                              :item="owned" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    import AddToCollection from "./AddToCollection";
    import RemoveFromCollection from "./RemoveFromCollection";

    export default {
        props: ['album', 'owned', 'showAdd', 'showRemove'],

        components: {
            AddToCollection,
            RemoveFromCollection,
        },

        computed: {
            release() {
                return moment(this.album.release_date).format('Do MMMM YYYY');
            },

            signed() {
                return this.owned && this.owned.is_signed;
            },

            promo() {
                return this.owned && this.owned.is_promo;
            },

            acquired() {
                return this.owned && !! this.owned.acquired_at;
            },

            acquiredAt() {
                return this.acquired ? moment(this.owned.acquired_at).format('Do MMMM YYYY') : null;
            },
        },
    }
</script>
