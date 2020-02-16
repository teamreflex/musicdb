<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img v-lazy="album.cover_art || album.spotify_image" :alt="album.name_en"
                     class="card-img img-fluid" />
            </div>
            <div class="col-md-8">
                <div class="card-body justify-content-left">
                    <h5 class="card-title">{{ album.name_en }} <span v-if="album.name_kr">({{ album.name_kr }})</span></h5>

                    <p class="cart-text text-muted">
                        <!-- Acquired at -->
                        <badge v-if="acquired"
                               type="primary" >
                            <fa-icon icon="shopping-cart" /> {{ acquiredAt }}
                        </badge>

                        <!-- Release date -->
                        <badge v-else
                               type="primary" >
                            <fa-icon icon="calendar" /> {{ release }}
                        </badge>

                        <!-- Promo album? -->
                        <badge v-if="owned && album.version && promo"
                               type="warning"
                               v-b-tooltip.hover.top
                               title="Promotional album, given out to radio stations, directors etc.">
                            <fa-icon icon="star" />
                        </badge>

                        <!-- Signed album? -->
                        <badge v-if="owned && album.version && signed"
                               type="success"
                               v-b-tooltip.hover.top
                               title="Album is signed by the artist.">
                            <fa-icon icon="signature" />
                        </badge>

                        <!-- Album version -->
                        <badge v-if="owned && album.version"
                               type="secondary">
                            {{ album.version }}
                        </badge>
                    </p>

                    <p class="card-text text-muted" v-if="album.versions && album.versions.length > 1">
                        <badge v-for="version in album.versions"
                               :key="'version-' + version.id"
                               type="secondary">
                            {{ version.version || version.name_en }}
                        </badge>
                    </p>

                    <p class="card-text d-flex">
                        <a :href="'https://open.spotify.com/album/' + album.spotify_id"
                           target="_blank"
                           class="btn btn-success btn-sm"
                           v-if="album.spotify_id">
                            <fa-icon :icon="['fab', 'spotify']" /> View on Spotify
                        </a>

                        <AddToCollection v-if="showAdd"
                                         :id="album.id"
                                         type="album"
                                         :name="album.name_en"
                                         :signed="true"
                                         :promo="true"
                                         :versions="versions"/>
                        <RemoveFromCollection v-if="showRemove"
                                              :item="owned" />
                        <SetFavorite column="favorite_album" :id="album.id" />
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import moment from "moment";
    import AddToCollection from "./AddToCollection";
    import RemoveFromCollection from "./RemoveFromCollection";
    import SetFavorite from "./SetFavorite";

    export default {
        props: ['album', 'owned', 'showAdd', 'showRemove'],

        components: {
            AddToCollection,
            RemoveFromCollection,
            SetFavorite,
        },

        computed: {
            release() {
                return moment(this.album.release_date).format('Do MMMM YYYY');
            },

            signed() {
                return this.owned && this.owned.is_signed;
            },

            promo() {
                return this.owned && this.owned.is_promo;
            },

            acquired() {
                return this.owned && !! this.owned.acquired_at;
            },

            acquiredAt() {
                return this.acquired ? moment(this.owned.acquired_at).format('Do MMMM YYYY') : null;
            },

            versions() {
                return _.orderBy(this.album.versions, ['version'], ['asc'])
            },

            stringVersions() {
                return _.chain(this.versions)
                    .map(album => album.version || album.name_en)
                    .join(', ')
                    .value();
            },
        },
    }
</script>
