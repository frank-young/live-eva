
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import VueResource from 'vue-resource'
Vue.use(VueResource)

Vue.component('paper-list', require('./components/paper/List.vue'));
Vue.component('paper-report', require('./components/paper/Report.vue'));
Vue.component('module-list', require('./components/module/List.vue'));
Vue.component('question-input', require('./components/question/Input.vue'));
Vue.component('report-input', require('./components/report/Input.vue'));

const app = new Vue({
    el: '#app'
});
