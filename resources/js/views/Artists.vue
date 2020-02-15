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
                        <div v-for="artist in artists" :key="'artist-' + artist.id">
                            <ArtistCard :artist="artist" />
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</template>
<script>
    import ArtistCard from "./components/ArtistCard";

    export default {
        name: "artists",

        components: {
            ArtistCard,
        },

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
