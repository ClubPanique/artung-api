import Vue from "vue";
import App from "./App.vue";
import router from "./router";

// Variables globales
window.rootUrl = "http://localhost:8000/";

// Imports fontawesome
import { library } from '@fortawesome/fontawesome-svg-core';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
// Définir ici les icones à utiliser.
import { faHome, faHeart, faMusic, faCheck } from '@fortawesome/free-solid-svg-icons';
import { faHeart as farHeart } from '@fortawesome/free-regular-svg-icons';
import { faFacebook, faTwitter, faYoutube, faWordpress } from '@fortawesome/free-brands-svg-icons';

Vue.component('font-awesome-icon', FontAwesomeIcon);
// Ajouter les icones à la librairie
library.add(faHome, faHeart, farHeart, faMusic, faFacebook, faTwitter, faYoutube, faWordpress, faCheck);

Vue.config.productionTip = false;

new Vue({
  render: h => h(App),
  router
}).$mount("#app");
