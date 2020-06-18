import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

const routes = [{
		path: '/',
		name: 'home',
		component: require('../views/Home').default
	},{
		path: '/chat/open/:token',
		name: 'chat',
		component: require('../views/Chat').default
	}
]

const router = new VueRouter({
	mode: 'history',
	base: process.env.BASE_URL,
	routes
})

export default router