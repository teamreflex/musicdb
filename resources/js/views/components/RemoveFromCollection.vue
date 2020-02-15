<template>
    <div>
        <base-button size="sm" type="danger" @click="modal = true">
            <fa-icon icon="times" />
            Remove
        </base-button>

        <modal :show.sync="modal"
               gradient="danger"
               modal-classes="modal-danger modal-dialog-centered">
            <h6 slot="header" class="modal-title" id="modal-title-notification">Remove From Collection</h6>

            <div class="py-3 text-center">
                <i class="ni ni-bell-55 ni-3x"></i>
                <h4 class="heading mt-4">{{ item.collectable.name_en }}</h4>
                <p>Are you sure you want to remove this from your collection?</p>
            </div>

            <template slot="footer">
                <base-button type="white" @click="remove" :disable="busy">
                    <i class="fa fa-spin fa-spinner" v-if="busy" />
                    <span v-else>Ok, remove it</span>
                </base-button>
                <base-button type="link"
                             text-color="white"
                             class="ml-auto"
                             @click="modal = false">
                    Cancel
                </base-button>
            </template>
        </modal>
    </div>
</template>

<script>
    import Modal from "../../components/Modal";

    export default {
        props: ['item'],

        components: {
            Modal,
        },

        data() {
            return {
                modal: false,
                busy: false,
            };
        },

        methods: {
            remove() {
                this.busy = true;

                axios.delete('/api/collection/' + this.item.id)
                    .then(response => {
                        alert('Removed from collection!');

                        this.$bus.$emit('collection-remove', this.item.id);

                        this.modal = false;
                        this.busy = false;
                    }).catch(error => {
                        console.log(error);

                        this.modal = false;
                        this.busy = false;
                    });
            },
        },
    }
</script>
