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

                    <div v-if="acquired">
                        <p class="card-text text-muted">Acquired: {{ acquiredAt }}</p>
                        <p class="card-text text-muted">
                            Promo: <i class="fa" :class="{'fa-check': promo, 'fa-times': ! promo}" />
                            Signed: <i class="fa" :class="{'fa-check': signed, 'fa-times': ! signed}" />
                        </p>
                    </div>
                    <p class="card-text text-muted" v-else>Release: {{ release }}</p>

                    <p class="card-text text-muted" v-if="album.spotify_id">
                        <a :href="'https://open.spotify.com/album/' + album.spotify_id" target="_blank"><i class="fa fa-spotify"></i> View on Spotify</a>
                    </p>
                    <p class="card-text">
                        <AddToCollection :id="album.id"
                                         type="album"
                                         :name="album.name_en"
                                         :signed="true"
                                         :promo="true" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    import AddToCollection from "./AddToCollection";

    export default {
        props: ['album', 'signed', 'promo', 'acquired'],

        components: {
            AddToCollection,
        },

        computed: {
            release() {
                return moment(this.album.release_date).format('Do MMMM YYYY');
            },

            acquiredAt() {
                return this.acquired ? moment(this.acquired).format('Do MMMM YYYY') : null;
            },
        },
    }
</script>
