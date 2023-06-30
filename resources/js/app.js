/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../../node_modules/admin-lte/plugins/jquery/jquery');
require('../../node_modules/admin-lte/plugins/bootstrap/js/bootstrap.bundle');
require('../../node_modules/admin-lte/dist/js/adminlte');
require('../../node_modules/admin-lte/plugins/chart.js/Chart');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('bar-chart', require('./components/BarChart.vue').default);
Vue.component('bubble-chart', require('./components/BubbleChart.vue').default);
Vue.component('doughnut-chart', require('./components/DoughnutChart.vue').default);
Vue.component('line-chart', require('./components/LineChart.vue').default);
Vue.component('pie-chart', require('./components/PieChart.vue').default);
Vue.component('polar-area-chart', require('./components/PolarAreaChart.vue').default);
Vue.component('radar-chart', require('./components/RadarChart.vue').default);
Vue.component('scatter-chart', require('./components/ScatterChart.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
