// Import statements at the top
import { createApp, ref } from 'vue';
import { createRouter, createWebHashHistory } from 'vue-router';
import App from './App.vue';
import Home from './pages/Home.vue';
import Shop from './pages/Shop.vue';
import Sell from './pages/Sell.vue';
import Sales from './pages/Sales.vue';
import Account from './pages/Account.vue';
import Login from './pages/Login.vue';
import Signup from './pages/Signup.vue';
import Terms from './pages/Terms.vue';
import WineShop from './pages/WineShop.vue';
import './style.css';

// Define your routes
const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home,
    },
    {
        path: '/shop',
        name: 'Shop',
        component: WineShop,
    },
    {
        path: '/sell',
        name: 'Sell',
        component: Sell,
    },
    {
        path: '/sales',
        name: 'Sales',
        component: Sales,
    },
    {
        path: '/account',
        name: 'Account',
        component: Account,
    },
    {
        path: '/login',
        name: 'Login',
        component: Login,
    },
    {
        path: '/signup',
        name: 'Signup',
        component: Signup,
    },
    {
        path: '/terms',
        name: 'Terms',
        component: Terms,
    },


];

// Create the router instance
const router = createRouter({
    history: createWebHashHistory(),
    routes,
});

// Create the Vue application
const app = createApp(App);

// Usage of ref should be inside a setup function or similar context, not exported globally without context.
// Here it is used to demonstrate a point, but normally you would handle state like this inside a Vue component or provide it via a store/context.
export const isLoggedIn = ref(false);

// Apply the router to the Vue application
app.use(router);

// Mount the Vue application
app.mount('#app');
