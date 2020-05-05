require('./bootstrap');

//window.Vue = require('vue');
import Vue from 'vue';

import notifications from './components/notifications/Notifications';


const app = new Vue({
    el: '#app',
    components: {
        notifications
    }
});
