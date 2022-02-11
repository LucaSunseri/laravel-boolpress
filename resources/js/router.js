import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './components/pages/Home'
import About from './components/pages/About'
import Contacs from './components/pages/Contacs'
import Posts from './components/pages/Posts'
import NotFound from './components/pages/NotFound'

const routes = [
    { path: '/', name: 'home', component: Home },
    { path: '/chi-sono', name: 'about', component: About },
    { path: '/contatti', name: 'contacs', component: Contacs },
    { path: '/posts', name: 'posts', component: Posts },
    { path: '*', component: NotFound },
  ]

const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active', 
    routes // short for `routes: routes`
  })


export default router;