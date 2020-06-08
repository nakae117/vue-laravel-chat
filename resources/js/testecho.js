import _ from 'lodash'
import Vue from 'vue'
import Vuetify from 'vuetify'
import store from './store'
import Echo from "laravel-echo"
window.io = require('socket.io-client')
window.axios = require('axios')

const files = require.context('./test_components', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(Vuetify)

let token = document.head.querySelector('meta[name="csrf-token"]')

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

if (token) {
	axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

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
})