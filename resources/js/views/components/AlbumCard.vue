<template>
    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <router-link :to="{ name: 'artist', params: { artistId: album.artist_id } }">
                    <img v-lazy="image" :alt="album.name_en"
                         class="card-img img-fluid" />
                </router-link>
            </div>
            <div class="col-md-8 d-flex flex-column">
                <div class="card-body justify-content-left">
                    <h2 class="card-title">
                        <router-link class="album-name" :to="{ name: 'artist', params: { artistId: album.artist_id } }">
                            {{ album.name_en }}
                        </router-link>
                        <small class="text-muted" v-if="album.name_kr">({{ album.name_kr }})</small>
                        <small class="text-muted" v-if="album.artist">{{ album.artist.name_en }}</small>
                    </h2>

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
                        <badge v-if="promo"
                               type="warning"
                               v-b-tooltip.hover.top
                               title="Promotional album, given out to radio stations, directors etc.">
                            <fa-icon icon="star" />
                        </badge>

                        <!-- Signed album? -->
                        <badge v-if="signed"
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
                </div>

                <div class="card-footer d-flex justify-content-between">
                    <div>
                        <a :href="'https://open.spotify.com/album/' + album.spotify_id"
                           target="_blank"
                           v-if="album.spotify_id">
                            <fa-icon :icon="['fab', 'spotify']" />
                        </a>
                    </div>

                    <div class="d-flex">
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
                    </div>
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
            image() {
                if (this.album.cover_art) {
                    return this.$asset.url(this.album.cover_art);
                }

                return this.album.spotify_image
                    || (this.album.album_image
                    ? this.$asset.url(this.album.album_image)
                    : '/img/album.jpg');
            },

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

<style>
    .album-name {
        color: black;
    }
</style>
