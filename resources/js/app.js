import _ from 'lodash'
import Vue from 'vue'
import Vuetify from 'vuetify'
import store from './store'
import router from './router'
import Echo from "laravel-echo"
window.io = require('socket.io-client')

const files = require.context('./components', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.use(Vuetify)

window.Echo = new Echo({
	broadcaster: 'socket.io',
	host: window.location.hostname + ':6001'
})

const app = new Vue({
	el: '#app',
	store,
	router,
	data: () => ({
		dialogUsers: false,
	}),
	vuetify: new Vuetify({
		icons: {
			iconfont: 'md',
		},
	}),
	computed: {
		users(){
			return this.$store.state.users.data
		},
		chats(){
			return this.$store.state.chat.data
		},
		currentChat(){
			return this.$store.state.chat.currentChat
		},
	},
	methods: {
		createChat(user){
			this.$store.dispatch('chat/creatChat', user).then((chat) => {
				this.$router.push({ name: 'chat', params: { token: chat.token } })
				this.dialogUsers = false
			})
		},
	},
})