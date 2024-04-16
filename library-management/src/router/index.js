import { createRouter, createWebHistory } from 'vue-router'
import Books from '../views/Books.vue'
import Order from '../views/Order.vue'

const routes = [
  {
    path: '/',
    name: 'books',
    component: Books
  },
  {
    path: '/orders',
    name: 'orders',
    component: Order
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
