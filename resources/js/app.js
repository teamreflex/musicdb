require('./bootstrap');

import Vue from "vue";
import App from "./App.vue";
import Argon from "./plugins/argon-kit";
import store from "./store";
import router from "./router";
import FontAwesomeIcon from "./icons";

Vue.config.productionTip = false;

Vue.component('fa-icon', FontAwesomeIcon);

Vue.use(Argon);

Vue.prototype.$bus = new Vue();

new Vue({
    router,
    store,
    render: h => h(App)
}).$mount('#app');
