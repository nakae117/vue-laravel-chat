import $axios from "axios"
let token = document.head.querySelector('meta[name="csrf-token"]')

$axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

if (token) {
	$axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content
} else {
	console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token')
}

const state = () => ({
	data: []
})

const mutations = {
	SET_CHAT(state, chat){
		state.data.push(chat)
	}
}

const actions = {
	getChat({ commit }, user){
		return new Promise((resolve, reject) => {
			$axios.get(`/get/chat/${user}`)
				.then((chat) => {
					commit('SET_CHAT', chat.data)
					resolve(chat.data)
				})
				.catch((error) => {
					reject(error)
				})
		})
	}
}

const getters = {}

export default {
	namespaced: true,
	state,
	mutations,
	actions,
	getters
}