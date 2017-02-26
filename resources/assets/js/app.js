
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
import Vue from 'vue'
import VueMaterial from 'vue-material'
require('./bootstrap');
import router from './router'
import App from './App.vue'

Vue.use(VueMaterial)
Vue.material.registerTheme({
    default: {
        primary: 'blue',
        accent: 'pink'
    },
    blue: {
        primary: 'blue',
        accent: 'pink'
    },
    indigo: {
        primary: 'indigo',
        accent: 'pink'
    },
    brown: {
        primary: 'brown',
        accent: 'green'
    },
    purple: {
        primary: 'purple',
        accent: 'blue'
    },
    orange: {
        primary: 'orange',
        accent: 'purple'
    },
    green: {
        primary: 'green',
        accent: 'pink'
    },
    'light-blue': {
        primary: 'light-blue',
        accent: 'yellow'
    },
    teal: {
        primary: 'teal',
        accent: 'orange'
    },
    'blue-grey': {
        primary: 'blue-grey',
        accent: 'blue'
    },
    cyan: {
        primary: 'cyan',
        accent: 'pink'
    },
    red: {
        primary: 'red',
        accent: 'pink'
    },
    white: {
        primary: 'white',
        accent: 'blue'
    },
    grey: {
        primary: {
            color: 'grey',
            hue: 300
        },
        accent: 'indigo'
    }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    components: {
        App
    },
    template: '<App/>'
});
