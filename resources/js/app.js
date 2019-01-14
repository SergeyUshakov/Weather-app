import Vue from 'vue'
import VueRouter from 'vue-router'
import * as VueGoogleMaps from "vue2-google-maps";

Vue.use(VueRouter, require('./bootstrap'));
Vue.use(VueGoogleMaps, {
    load: {
        key: "REPLACE-THIS-WITH-YOUR-KEY-FROM-ABOVE",
        libraries: "places" // necessary for places input
    }
});

Vue.mixin({
   methods: {
       getQuery: function(endpoint) {
           if(typeof endpoint !== "string") {
               throw "Endpoint must be string";
           }

           return axios.get('http://localhost/weather-app/public/api/' + endpoint);
       }
   }
});

import App from './components/App'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'app',
            component: App
        }
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    router,
});