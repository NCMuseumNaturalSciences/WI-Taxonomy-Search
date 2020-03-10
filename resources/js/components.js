import Vue from "vue";
Vue.component('pagination', require('laravel-vue-pagination'));

Vue.component('navbar',
    require('./components/includes/Navbar.vue').default);

Vue.component('vue-wi-taxonomy-search',
    require('./components/WildlifeInsightsTaxonomySearchComponent.vue').default);

