<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="image" :alt="artist.name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8 d-flex flex-column">
                <div class="card-body">
                    <h2 class="card-title">
                        {{ artist.name_en }}
                        <small class="text-muted" v-if="artist.name_kr">{{ artist.name_kr }}</small>
                    </h2>

                    <p class="card-text">{{ artist.description }}</p>
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div>
                        <span v-if="artist.twitter">
                            <a :href="'https://twitter.com/' + artist.twitter" target="_blank"><fa-icon :icon="['fab', 'twitter']" /></a>
                        </span>

                        <span v-if="artist.facebook">
                            <a :href="'https://facebook.com/' + artist.facebook" target="_blank"><fa-icon :icon="['fab', 'facebook']" /></a>
                        </span>

                        <span v-if="artist.instagram">
                            <a :href="'https://instagram.com/' + artist.instagram" target="_blank"><fa-icon :icon="['fab', 'instagram']" /></a>
                        </span>

                        <span v-if="artist.youtube">
                            <a :href="'https://youtube.com/c/' + artist.youtube" target="_blank"><fa-icon :icon="['fab', 'youtube']" /></a>
                        </span>

                        <span v-if="artist.spotify_id">
                            <a :href="'https://open.spotify.com/artist/' + artist.spotify_id" target="_blank"><fa-icon :icon="['fab', 'spotify']" /></a>
                        </span>

                        <span v-if="artist.daum">
                            <a :href="'http://cafe.daum.net/' + artist.daum" target="_blank"><fa-icon icon="coffee" /></a>
                        </span>
                    </div>

                    <div>
                        <router-link :to="{ name: 'artist', params: {artistId: artist.id} }"
                                     class="btn btn-info btn-sm mb-3 mb-sm-0">
                            <fa-icon icon="music" /> View
                        </router-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['artist'],

        computed: {
            image() {
                if (this.artist.image) {
                    return this.$asset.url(this.artist.image);
                }

                return this.artist.spotify_image || '/img/artist.jpg';
            },
        },
    }
</script>
