import _ from 'lodash'
import Vue from 'vue'
import Vuetify from 'vuetify'
import store from './store'
import Echo from "laravel-echo"
window.io = require('socket.io-client')

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(Vuetify)

window.Echo = new Echo({
	broadcaster: 'socket.io',
	host: window.location.hostname + ':6001'
})

const app = new Vue({
	el: '#app',
	store,
	vuetify: new Vuetify({
		icons: {
			iconfont: 'md',
		},
	}),
	data: () => ({
		rememberMe: false,
		steps: 1
	})
})