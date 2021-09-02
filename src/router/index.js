import Vue from 'vue'
import Router from 'vue-router'
import index from '@/components/index'
import home from '@/components/home'
import all from '@/components/all'
import student from '@/components/student'
import addXinxi from '@/components/addXinxi'
import updateXinxi from '@/components/updateXinxi'
import zhuci from '@/components/zhuci'
Vue.use(Router)

export default new Router({
	routes: [{
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
		},
		{
			path: '/addXinxi',
			name: 'addXinxi',
			component: addXinxi
		},
		
		{
			path: '/zhuci',
			name: 'zhuci',
			component: zhuci
		},
		{
			path: '/updateXinxi',
			name: 'updateXinxi',
			component: updateXinxi
		},
		
	]
})
