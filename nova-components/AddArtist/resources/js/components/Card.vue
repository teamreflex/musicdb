<template>
    <card class="flex flex-col items-center justify-center">
        <div class="px-3 py-3">
            <h3 class="text-80 font-light">Add Artist</h3>
            <label for="spotify" />
            <input type="text" id="spotify" class="form-control form-input form-input-bordered" placeholder="Spotify ID..." v-model="artistForm.spotify_id" />

            <button @click.prevent="submit" class="btn btn-default btn-primary">Add</button>
        </div>
    </card>
</template>

<script>
export default {
    props: [
        'card',

        // The following props are only available on resource detail cards...
        // 'resource',
        // 'resourceId',
        // 'resourceName',
    ],

    data() {
        return {
            busy: false,

            artistForm: {
                spotify_id: null,
            },
        };
    },

    methods: {
        submit() {
            this.busy = true;

            axios.post('/nova-vendor/add-artist/spotify', this.artistForm)
                .then(response => {
                    this.$toasted.show('Successfully added/updated ' + response.data.data.name_en, { type: 'success' });

                    this.artistForm.spotify_id = null;
                    this.busy = false;
                })
                .catch(error => {
                    this.$toasted.show(error.response.data.message || 'There was an error adding a new artist.', { type: 'error' });
                    console.log(error);
                });
        },
    },
}
</script>
