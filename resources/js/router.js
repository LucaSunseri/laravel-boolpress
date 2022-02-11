import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

import Home from './components/pages/Home'
import About from './components/pages/About'
import Contacs from './components/pages/Contacs'
import Posts from './components/pages/posts/Posts'
import Show from './components/pages/posts/Show'
import NotFound from './components/pages/NotFound'


const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active', 
    routes: [
      { path: '/', name: 'home', component: Home },
      { path: '/chi-sono', name: 'about', component: About },
      { path: '/contatti', name: 'contacs', component: Contacs },
      { path: '/posts', name: 'posts', component: Posts },
      { path: '/posts/:slug', name: 'show', component: Show},
      { path: '*', name: 'notFound', component: NotFound },
    ]
  })

export default router;