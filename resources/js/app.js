/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


// ISO-3166-2 country and subdivision codes
window.iso31662 = require('iso-3166/2')
Vue.set(Vue.prototype, 'iso31662', window.iso31662);

// country flags
import countryFlagEmoji from "country-flag-emoji";
Vue.set(Vue.prototype, 'countryFlagEmoji', countryFlagEmoji);

// vue i18n
import VueI18n from 'vue-i18n';
import messages from './lang';
Vue.use(VueI18n);
export const i18n = new VueI18n({
    locale: 'en',
    fallbackLocale: 'en',
    messages: messages
});


import jobFormMixin from "./components/jobFormMixin";


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);
//Vue.component('jobform-component', require('./components/JobformComponent.vue').default);
Vue.component('chart-component', require('./components/ChartComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    mixins: [
        jobFormMixin
    ],
    i18n,
    beforeCreate: function() {
        this.$i18n.locale = document.querySelector('html').lang || 'en'; // Sprache übernehmen von Laravel
    }
});
