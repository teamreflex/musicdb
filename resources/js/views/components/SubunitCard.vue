<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="image" :alt="subunit.name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8 d-flex flex-column">
                <div class="card-body">
                    <h5 class="card-title">{{ subunit.name_en }} <span v-if="subunit.name_kr">({{ subunit.name_kr }})</span></h5>
                </div>

                <div class="card-footer d-flex justify-content-start">
                    <a :href="'https://open.spotify.com/artist/' + subunit.spotify_id"
                       target="_blank"
                       v-if="subunit.spotify_id">
                        <fa-icon :icon="['fab', 'spotify']" />
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['subunit'],

        computed: {
            image() {
                if (this.subunit.image) {
                    return this.$asset.url(this.subunit.image);
                }

                return this.subunit.spotify_image || '/img/subunit.jpg';
            },
        },
    }
</script>
