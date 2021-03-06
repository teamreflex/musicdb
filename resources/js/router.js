import Vue from "vue";
import Router from "vue-router";
import AppHeader from "./layout/AppHeader";
import AppFooter from "./layout/AppFooter";
import Index from "./views/Index.vue";
import Home from "./views/Home.vue";
import Login from "./views/Login.vue";
import Register from "./views/Register.vue";
import Profile from "./views/Profile.vue";
import Artists from "./views/Artists.vue";
import Artist from "./views/Artist.vue";

Vue.use(Router);

export default new Router({
    mode: 'history',
    linkExactActiveClass: "active",
    routes: [
        {
            path: "/",
            name: "index",
            components: {
                header: AppHeader,
                default: Index,
                footer: AppFooter
            }
        },
        {
            path: "/home",
            name: "home",
            components: {
                header: AppHeader,
                default: Home,
                footer: AppFooter
            }
        },
        {
            path: "/login",
            name: "login",
            components: {
                header: AppHeader,
                default: Login,
                footer: AppFooter
            }
        },
        {
            path: "/register",
            name: "register",
            components: {
                header: AppHeader,
                default: Register,
                footer: AppFooter
            }
        },
        {
            path: "/profile/:username",
            name: "profile",
            components: {
                header: AppHeader,
                default: Profile,
                footer: AppFooter
            }
        },
        {
            path: "/artists",
            name: "artists",
            components: {
                header: AppHeader,
                default: Artists,
                footer: AppFooter
            }
        },
        {
            path: "/artist/:artistId",
            name: "artist",
            components: {
                header: AppHeader,
                default: Artist,
                footer: AppFooter
            }
        },

        {
            path: "*",
            redirect: '/',
        },
    ],
    scrollBehavior: to => {
        if (to.hash) {
            return { selector: to.hash };
        } else {
            return { x: 0, y: 0 };
        }
    }
});
