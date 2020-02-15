<template>
    <div>
        <base-button type="success" @click="modal = true">Add To Collection</base-button>

        <modal :show.sync="modal"
               body-classes="p-0"
               modal-classes="modal-dialog-centered modal-sm">
            <card type="secondary" shadow
                  header-classes="bg-white pb-5"
                  body-classes="px-lg-5 py-lg-5"
                  class="border-0">
                <template>
                    <div class="text-muted text-center mb-3">
                        <small>Add "{{ name }}" to your collection</small>
                    </div>
                    <form role="form">
                        <base-input alternative
                                    v-model="form.amount"
                                    class="mb-3"
                                    placeholder="Amount">
                        </base-input>

                        <base-input addon-left-icon="ni ni-calendar-grid-58">
                            <flat-picker slot-scope="{focus, blur}"
                                         @on-open="focus"
                                         @on-close="blur"
                                         :config="{allowInput: true}"
                                         class="form-control datepicker"
                                         v-model="form.acquired_at">
                            </flat-picker>
                        </base-input>

                        <base-checkbox v-model="form.is_signed" v-if="signed">
                            Signed?
                        </base-checkbox>

                        <base-checkbox v-model="form.is_promo" v-if="promo">
                            Promo?
                        </base-checkbox>

                        <div v-if="versions.length && versions.length > 1">
                            <div class="text-muted text-center mb-3">
                                <small>Select version</small>
                            </div>

                            <base-radio v-for="album in versions" :key="'version-' + album.id"
                                        :name="album.id.toString()"
                                        :value="album.id"
                                        v-model="form.collectable_id">
                                {{ album.version || album.name_en }}
                            </base-radio>
                        </div>

                        <div class="text-center">
                            <base-button type="primary" class="my-4" @click="add" :disabled="busy">
                                <span v-if="busy">
                                    <fa-icon icon="spinner" spin />
                                </span>

                                <span v-else>
                                    <fa-icon icon="plus" /> Add
                                </span>
                            </base-button>
                        </div>
                    </form>
                </template>
            </card>
        </modal>
    </div>
</template>

<script>
    import Modal from "../../components/Modal";
    import flatPicker from "vue-flatpickr-component";
    import "flatpickr/dist/flatpickr.css";

    export default {
        props: ['id', 'type', 'name', 'signed', 'promo', 'versions'],

        components: {
            Modal,
            flatPicker,
        },

        data() {
            return {
                modal: false,
                busy: false,

                form: {
                    amount: null,
                    acquired_at: null,
                    is_signed: false,
                    is_promo: false,
                    collectable_id: this.id.toString(),
                },
            };
        },

        methods: {
            add() {
                this.busy = true;

                axios.post('/api/collection', this.makeForm())
                    .then(response => {
                        alert('Added to collection!');

                        this.modal = false;
                        this.busy = false;
                    }).catch(error => {
                        console.log(error);

                        this.modal = false;
                        this.busy = false;
                    });
            },

            makeForm() {
                return {
                    collectable_id: this.id,
                    collectable_type: this.type,
                    ...this.form,
                };
            }
        },
    }
</script>
