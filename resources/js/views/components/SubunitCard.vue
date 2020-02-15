<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="subunit.icon_url" :alt="subunit.name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ subunit.name_en }} <span v-if="subunit.name_kr">({{ subunit.name_kr }})</span></h5>
                    <p class="card-text text-muted" v-if="subunit.spotify_id">
                        <a :href="'https://open.spotify.com/artist/' + subunit.spotify_id" target="_blank"><fa-icon :icon="['fab', 'spotify']" /> View on Spotify</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['subunit'],
    }
</script>
