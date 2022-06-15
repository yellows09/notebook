import Vue from "vue";
import VueRouter from "vue-router";
import Notebook from "./components/Notebook";
import CreateNote from "./components/CreateNote";
import ShowNote from "./components/ShowNote";

Vue.use(VueRouter)

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/notebook',
            name: 'Notebook',
            component: Notebook
        },
        {
            path: '/create/note',
            name: 'CreateNote',
            component: CreateNote
        },
        {
            path: '/show/note/:id',
            name: 'ShowNote',
            component: ShowNote,
            props:true
        },
    ]
})

require('./bootstrap');

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

Vue.component('notebook-project', require('./components/ExampleComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{ app },
    router
});
