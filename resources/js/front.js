require('./bootstrap');

import Vue from 'vue';
import App from './App.vue';
import Vuex from 'vuex'
import store from './store'
import VueRouter from 'vue-router';
import PageHome from './pages/PageHome';
import PageDishes from './pages/PageDishes';
import PageCart from './pages/PageCart';
import OrderSuccess from './pages/OrderSuccess';
import PagePayment from './pages/PagePayment';
import Stripe from 'stripe';


Vue.use(VueRouter);
Vue.use(Vuex)

const routes = [
    {
        path:'/',
        name:'home',
        component: PageHome,
    },
    {
        path:'/restaurants/:slug/dishes',
        name:'dishes',
        component: PageDishes,
    },
    {
        path:'/cart',
        name:'cart',
        component: PageCart,
    },
    {
        path: '/order',
        name: 'order',
        component: OrderSuccess,
    },
    {
        path: '/payment',
        name: 'payment',
        component: PagePayment,
    },
];

const router = new VueRouter({
    mode: 'history',
    routes,
});

new Vue({
    el: '#root',
    render: h => h(App),
    router,
    store,
});
