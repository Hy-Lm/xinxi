import Vue from 'vue'
import Router from 'vue-router'
import index from '@/components/index'
import home from '@/components/home'
import all from '@/components/all'
import student from '@/components/student'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'index',
      component: index
    },
    {
      path: '/home',
      name: 'home',
      component: home
    },
    {
      path: '/all',
      name: 'all',
      component: all
    },
    {
      path: '/student',
      name: 'student',
      component: student
    }
  ]
})
