require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';

Vue.component('showNotification', require('./components/notifications/showNotification').default);
import notifications from './components/notifications/Notifications';
import store from './vuex/store';


const app = new Vue({
    el: '#app',
    components: {
        notifications,

    },
    store
});
