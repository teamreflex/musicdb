<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="image" :alt="member.stage_name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">
                        {{ member.stage_name_en }}
                        <small class="text-muted" v-if="member.stage_name_kr">{{ member.stage_name_kr }}</small>
                    </h2>

                    <p class="card-text text-muted" v-if="member.name_en">
                        Name: {{ member.name_en }} <span v-if="member.name_kr">({{ member.name_kr }})</span>
                    </p>

                    <p class="card-text d-flex">
                        <SetFavorite column="favorite_member" :id="member.id" />
                    </p>
                </div>

                <div class="card-footer">
                    <div class="pull-left">
                        <span v-if="member.twitter">
                            <a :href="'https://twitter.com/' + member.twitter" target="_blank"><fa-icon :icon="['fab', 'twitter']" /></a>
                        </span>

                        <span v-if="member.instagram">
                            <a :href="'https://instagram.com/' + member.instagram" target="_blank"><fa-icon :icon="['fab', 'instagram']" /></a>
                        </span>

                        <span v-if="member.youtube">
                            <a :href="'https://youtube.com/c/' + member.youtube" target="_blank"><fa-icon :icon="['fab', 'youtube']" /></a>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import SetFavorite from "./SetFavorite";

    export default {
        props: ['member'],

        components: {SetFavorite},

        computed: {
            image() {
                return this.member.image ? this.$asset.url(this.member.image) : '/img/member.jpg';
            },
        },
    }
</script>
