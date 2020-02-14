<template>
    <section class="section-hero section-shaped my-0">
        <div class="shape shape-style-1 shape-primary">
            <span class="span-150"></span>
            <span class="span-50"></span>
            <span class="span-50"></span>
            <span class="span-75"></span>
            <span class="span-100"></span>
            <span class="span-75"></span>
            <span class="span-50"></span>
            <span class="span-100"></span>
            <span class="span-50"></span>
            <span class="span-100"></span>
        </div>

        <div class="container shape-container d-flex">
            <div class="col px-0">
                <div class="row" v-for="artist in artists" :key="'artist-' + artist.id">
                    <div class="col-2">
                        <img v-lazy="artist.logo_url" :alt="artist.name_en"
                             class="img-fluid rounded-circle shadow-lg" style="width: 150px;">
                    </div>

                    <div class="col-10">
                        <h3 class="text-white">{{ artist.name_en }}</h3>
                        <p class="text-white" v-if="artist.name_kr"> {{ artist.name_kr }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
    export default {
        name: "artists",

        data() {
            return {
                artists: [],
            };
        },

        mounted() {
            axios.get('/api/artist')
                .then((response => {
                    this.artists = response.data.data;
                }))
                .catch(error => {
                    console.log(error);
                });
        },
    };
</script>
