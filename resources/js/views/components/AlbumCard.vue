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
                    <p class="card-text text-muted">Release: {{ release }}</p>
                    <p class="card-text text-muted" v-if="album.spotify_id">
                        <a :href="'https://open.spotify.com/album/' + album.spotify_id" target="_blank"><i class="fa fa-spotify"></i> View on Spotify</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";

    export default {
        props: ['album'],

        computed: {
            release() {
                return moment(this.album.release_date).format('Do MMMM YYYY');
            },
        },
    }
</script>
