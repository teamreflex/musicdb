<template>
    <div>
        <base-button size="sm" class="btn-favorite" @click="favorite" :disabled="busy">
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


<style>
    .btn-favorite {
        color: #fff;
        background-color: #f4028e;
        border-color: #f4028e;
    }

    /** lighter */
    .btn-favorite:hover {
        color: #fff;
        background-color: #f4028e;
        border-color: #f4028e;
    }

    .btn-favorite:focus, .btn-favorite.focus {
        color: #fff;
        background-color: #f4028e;
        border-color: #f4028e;
        box-shadow: 0 0 0 0.2rem rgba(134, 0, 83, 0.5);
    }

    .btn-danger.disabled, .btn-danger:disabled {
        color: #fff;
        background-color: #f4028e;
        border-color: #f4028e;
    }
</style>
