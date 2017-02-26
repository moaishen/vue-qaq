/**
 * Created by zcong on 2017/2/26.
 */
import Vue from 'vue'
import VueRouter from 'vue-router'
import Example from '../components/Example.vue'

Vue.use(VueRouter)

export default new VueRouter({
    base: '/app/',
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Example',
            component: Example
        }
    ]
})