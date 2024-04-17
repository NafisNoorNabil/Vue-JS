import { createRouter, createWebHistory } from 'vue-router'
import Books from '../views/Books.vue'
import Admin from '../views/AdminPanel.vue'
const routes = [
  {
    path: '/',
    name: 'books',
    component: Books
  },
  {
    path: '/admin',
    name: 'admin',
    component: Admin
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
