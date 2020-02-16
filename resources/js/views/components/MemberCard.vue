<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="member.image || '/img/member.jpg'" :alt="member.stage_name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ member.stage_name_en }} <span v-if="member.stage_name_kr">({{ member.stage_name_kr }})</span></h5>

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
    }
</script>
