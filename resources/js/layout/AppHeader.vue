<template>
    <header class="header-global">
        <base-nav class="navbar-main" transparent type="" effect="light" expand>
            <router-link slot="brand" class="navbar-brand mr-lg-5" :to="{ name: user ? 'home' : 'index' }">
                <img src="/img/brand/white.png" alt="logo">
            </router-link>

            <div class="row" slot="content-header" slot-scope="{closeMenu}">
                <div class="col-6 collapse-brand">
                    <router-link :to="{ name: user ? 'home' : 'index' }">
                        <img src="/img/brand/blue.png">
                    </router-link>
                </div>
                <div class="col-6 collapse-close">
                    <close-button @click="closeMenu"></close-button>
                </div>
            </div>
            <ul class="navbar-nav align-items-lg-center">
                <!-- Artists -->
                <router-link class="nav-link" role="button" :to="{ name: 'artists' }">
                    <i class="ni ni-collection d-lg-none"></i>
                    <span class="nav-link-inner--text">Artists</span>
                </router-link>
            </ul>

            <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                <!-- Login -->
                <li class="nav-item" v-if="! user">
                    <router-link class="nav-link nav-link-icon" :to="{ name: 'login' }">
                        <fa-icon icon="sign-in-alt" />
                        <span class="nav-link-inner--text d-lg-none">Login</span>
                    </router-link>
                </li>

                <!-- Register -->
                <li class="nav-item" v-if="! user">
                    <router-link class="nav-link nav-link-icon" :to="{ name: 'register' }">
                        <fa-icon icon="user-plus" />
                        <span class="nav-link-inner--text d-lg-none">Register</span>
                    </router-link>
                </li>

                <!-- Admin -->
                <li class="nav-item" v-if="user && user.is_admin">
                    <a class="nav-link nav-link-icon" href="/admin">
                        <fa-icon icon="user-shield" />
                        <span class="nav-link-inner--text d-lg-none">Admin</span>
                    </a>
                </li>

                <!-- Logout -->
                <li class="nav-item" v-if="user">
                    <span class="nav-link nav-link-icon" @click="logout">
                        <fa-icon icon="sign-out-alt" />
                        <span class="nav-link-inner--text d-lg-none">Logout</span>
                    </span>
                </li>

                <!-- Profile -->
                <li class="nav-item" v-if="user">
                    <router-link class="nav-link nav-link-icon" :to="{ name: 'profile', params: {username: user.username} }">
                        {{ user.username }}
                        <span class="nav-link-inner--text d-lg-none">Profile</span>
                    </router-link>
                </li>
            </ul>
        </base-nav>
    </header>
</template>

<script>
    import BaseNav from "../components/BaseNav";
    import BaseDropdown from "../components/BaseDropdown";
    import CloseButton from "../components/CloseButton";
    import {mapActions, mapGetters} from "vuex";

    export default {
        components: {
            BaseNav,
            CloseButton,
            BaseDropdown
        },

        computed: {
            ...mapGetters({
                user: 'user',
            }),
        },

        methods: {
            ...mapActions({
                logout: 'logout',
            }),
        }
    };
</script>

<style>
</style>
