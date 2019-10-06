/*require('./bootstrap');

window.Vue = require('vue');

Vue.component(
    'app',
    require('./views/App.vue').default
);

const app = new Vue({
    el: '#app'
});
*/

import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Layout from './views/Layout'
import DepartementIndex from './views/departements/Index'
import DepartementShow from './views/departements/Show'
import DepartementEdit from './views/departements/Edit'
import DepartementCreate from './views/departements/Create'
import FiliereIndex from './views/filieres/Index'
import FiliereCreate from './views/filieres/Create'
import FiliereShow from './views/filieres/Show'
import FiliereEdit from './views/filieres/Edit'
import ProfIndex from './views/profs/Index'
import ResponsableIndex from './views/responsables/Index'
import CoordinateurIndex from './views/coordinateurs/Index'

Vue.component('pagination', require('laravel-vue-pagination'));

const router = new VueRouter({
        mode: 'history',
        routes: [
            {
                path: '/departement',
                name: 'departement',
                component: DepartementIndex
            },
            {
                path: '/departement/create',
                name: 'departement.create',
                component: DepartementCreate
            },
            {
                path: '/departement/show/:id',
                name: 'departement.show',
                component: DepartementShow
            },
            {
                path: '/departement/edit/:id',
                name: 'departement.edit',
                component: DepartementEdit
            },
            {
                path: '/filiere',
                name: 'filiere',
                component: FiliereIndex
            },
            {
                path: '/filiere/create',
                name: 'filiere.create',
                component: FiliereCreate
            },
            {
                path: '/filiere/show/:id',
                name: 'filiere.show',
                component: FiliereShow
            },
            {
                path: '/filiere/edit/:id',
                name: 'filiere.edit',
                component: FiliereEdit
            },
            {
                path: '/prof',
                name: 'prof',
                component: ProfIndex
            },
            {
                path: '/responsable',
                name: 'responsable',
                component: ResponsableIndex
            },
            {
                path: '/coordinateur',
                name: 'coordinateur',
                component: CoordinateurIndex
            }
        ]
})

const app = new Vue({
    el: '#app',
    components: { Layout },
    router,
});

