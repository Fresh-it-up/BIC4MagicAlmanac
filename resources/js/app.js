/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import vue from 'vue';

window.Vue = vue;


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('index-kinds', require('./components/Kinds.vue').default);
Vue.component('create-kind', require('./components/CreateKind.vue').default);
Vue.component('list-kinds', require('./components/ListKinds.vue').default);
Vue.component('kind', require('./components/Kind.vue').default);
Vue.component('query-message', require('./components/base/QueryMessage.vue').default);
Vue.component('index-spells', require('./components/Spells.vue').default);
Vue.component('create-spell', require('./components/CreateSpell.vue').default);
Vue.component('list-spells', require('./components/ListSpells.vue').default);
Vue.component('spell', require('./components/Spell.vue').default);
Vue.component('search', require('./components/Search.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
