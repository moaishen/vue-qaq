/**
 * Created by zcong on 2017/2/26.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import Example from '../components/Example.vue'
import Index from '../components/Index.vue'
import Login from '../components/Login.vue'

Vue.use(VueRouter)

export default new VueRouter({
    base: '/app/',
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'example',
            component: Example
        },
        {
            path: '/index',
            name: 'index',
            component: Index
        },
        {
            path: '/login',
            name: 'login',
            component: Login
        }
    ]
})