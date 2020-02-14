import Vue from "vue";
import Vuex from "vuex";

Vue.use(Vuex);

const store = new Vuex.Store({
    state: {
        user: null,
    },

    getters: {
        user: state => state.user,
    },

    mutations: {
        setUser(state, user) {
            state.user = user;
        },
    },

    actions: {
        logout(context) {
            axios.post('/api/logout')
                .then(response => {
                    console.log(response);
                    context.commit('setUser', null);
                })
                .catch(error => {
                    console.log(error);
                });
        },
    },
});

export default store;
