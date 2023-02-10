import { createRouter, createWebHistory } from 'vue-router'
import Dashboard from '../components/Dashboard.vue'
import Login from  '../components/Login.vue'
import Register from  '../components/Register.vue'
import ProductIndex from '../components/products/ProductIndex.vue'
import ProductCreate from '../components/products/ProductCreate.vue'
import ProductEdit from '../components/products/ProductEdit.vue'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'Dashboard',
      component: Dashboard
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
      path: '/products',
      name: 'ProductIndex',
      component: ProductIndex
    },
    {
      path: '/products/create',
      name: 'ProductCreate',
      component: ProductCreate
    },
    {
      path: '/products/:id/edit',
      name: 'ProductEdit',
      component: ProductEdit,
      props: true
    },
  ]
})

export default router