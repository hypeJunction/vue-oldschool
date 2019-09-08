import Vue from 'vue';

Vue.component('CocktailCard', () => import(/* webpackChunkName: "components/entry/CocktailCard" */ './entry/CocktailCard.vue'));
Vue.component('CocktailProfile', () => import(/* webpackChunkName: "components/entry/CocktailProfile" */ './entry/CocktailProfile.vue'));
Vue.component('FavoriteButton', () => import(/* webpackChunkName: "components/elements/FavoriteButton" */ './elements/FavoriteButton.vue'));
Vue.component('LikeButton', () => import(/* webpackChunkName: "components/elements/LikeButton" */ './elements/LikeButton.vue'));
