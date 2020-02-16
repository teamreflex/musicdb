<template>
    <div>
        <base-button size="sm" type="danger" @click="favorite" :disabled="busy">
            <span v-if="busy">
                <fa-icon spin icon="spinner" />
            </span>
            <span v-else>
                <fa-icon icon="heart" />
                Favorite
            </span>
        </base-button>
    </div>
</template>

<script>
    export default {
        props: ['column', 'id'],

        data() {
            return {
                busy: false,
            };
        },

        methods: {
            favorite() {
                this.busy = true;

                axios.put('/api/user', this.makeForm())
                    .then(response => {
                        alert('Set favorite!');

                        this.busy = false;
                    }).catch(error => {
                        console.log(error);

                        this.busy = false;
                    });
            },

            makeForm() {
                return _.zipObject([this.column], [this.id]);
            },
        },
    }
</script>
