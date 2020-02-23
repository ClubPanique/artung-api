import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

// Import des composants
import HelloWorld from './components/HelloWorld';
import Home from './views/Home';
import Register from './views/Register';
import DeleteAccount from './views/DeleteAccount';
import Login from './views/Login';
import Catalog from './views/fan/Catalog';
import ArtistDetails from './views/fan/ArtistDetails';
import FanAccount from './views/fan/FanAccount';
import ArtistAccount from './views/artist/ArtistAccount';
import ArtistPreview from './views/artist/ArtistPreview';
// Routes test
import Adrien from './views/test/Adrien';
import Alice from './views/test/Alice';
import Aude from './views/test/Aude';
import Steve from './views/test/Steve';

// Définition des routes
const routes = [
  {
    name: "Logo",
    path: "/",
    component: HelloWorld
  },
  {
    name: "Home",
    path: "/home",
    component: Home
  },
  {
    name: "Register",
    path: "/register",
    component: Register
  },
  {
    name: "DeleteAccount",
    path: "/delete-account",
    component: DeleteAccount
  },
  {
    name: "Login",
    path: "/login",
    component: Login
  },
  // Routes Fan
  {
    name: "Catalog",
    path: "/fan",
    component: Catalog
  },
  {
    name: "ArtistDetails",
    path: "/fan/artist/:id",
    component: ArtistDetails,
    props: true
  },
  {
    name: "FanAccount",
    path: "/fan/account",
    component: FanAccount
  },
  // Routes Artist
  {
    name: "ArtistAccount",
    path: "/artist/account",
    component: ArtistAccount
  },
  {
    name: "ArtistPreview",
    path: "/artist/preview",
    component: ArtistPreview
  },
  // Routes Test
  {
    name: "Adrien",
    path: "/adrien",
    component: Adrien
  },
  {
    name: "Alice",
    path: "/alice",
    component: Alice
  },
  {
    name: "Aude",
    path: "/aude",
    component: Aude
  },
  {
    name: "Steve",
    path: "/steve",
    component: Steve
  }
];

//Création du routeur.
const router = new VueRouter({
  mode: 'history',
  routes,
});

export default router;
