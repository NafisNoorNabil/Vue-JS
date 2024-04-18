import { createRouter, createWebHistory } from 'vue-router'
import Books from '../views/Books.vue'
import Create from '../views/Create.vue'
import bookEdit from '../views/Edit.vue'
const routes = [
  {
    path: '/books',
    name: 'books',
    component: Books
  },
  {
    path: '/books/create',
    name: 'bookCreate',
    component: Create
  },
    {
    path: '/books/:id/edit',
    name: 'bookEdit',
    component: bookEdit
  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
