<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="artist.icon_url" :alt="artist.name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ artist.name_en }} <span v-if="artist.name_kr">({{ artist.name_kr }})</span></h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                </div>

                <div class="card-footer">
                    <div class="pull-left">
                        <span v-if="artist.twitter">
                            <a :href="'https://twitter.com/' + artist.twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                        </span>

                        <span v-if="artist.facebook">
                            <a :href="'https://facebook.com/' + artist.facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                        </span>

                        <span v-if="artist.instagram">
                            <a :href="'https://instagram.com/' + artist.instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                        </span>

                        <span v-if="artist.youtube">
                            <a :href="'https://youtube.com/c/' + artist.youtube" target="_blank"><i class="fa fa-youtube"></i></a>
                        </span>

                        <span v-if="artist.spotify_id">
                            <a :href="'https://open.spotify.com/artist/' + artist.spotify_id" target="_blank"><i class="fa fa-spotify"></i></a>
                        </span>

                        <span v-if="artist.daum">
                            <a :href="'http://cafe.daum.net/' + artist.daum" target="_blank"><i class="fa fa-coffee"></i></a>
                        </span>
                    </div>

                    <div class="pull-right">
                        <router-link :to="{ name: 'artist', params: {artistId: artist.id} }"
                                     class="btn btn-info btn-sm mb-3 mb-sm-0">
                            <i class="fa fa-music" /> View
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
    }
</script>
