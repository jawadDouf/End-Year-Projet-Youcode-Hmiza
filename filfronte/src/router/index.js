import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'
import AuthView from '../views/AuthView.vue'
import productsView from '../views/productsView.vue'
import oneProductView from '../views/oneProductView.vue';
// import businessProfileView from '../views/businessProfileView.vue';
// import userProfileVue from '../views/userProfileVue.vue';
import oneBusProView from '../views/oneBusProView.vue'
import profileView from "../views/profileView.vue"
import businessesView from "../views/businessesView.vue"
const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/about',
    name: 'about',
    component: () => import(/* webpackChunkName: "about" */ '../views/AboutView.vue')
  },
  {
    path: '/AuthView',
    name: 'AuthView',
    component: AuthView
  },
  {
    path: '/productsView',
    name: 'productsView',
    component: productsView
  },
  {
    path: '/productsView/:id',
    name: 'oneProductView',
    component: oneProductView
  }, 
  {
    path: '/profileView',
    name: 'profileView',
    component: profileView
  }, 
  // {
  //   path: '/userProfileVue',
  //   name: 'userProfileVue',
  //   component: userProfileVue
  // },
  {
    path: '/businessProfileView/:id',
    name: 'oneBusProView',
    component: oneBusProView
  },
  {
    path: '/businessesView',
    name: 'businessesView',
    component: businessesView
  },
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
