import $axios from '../utils/axios'

const state = () => ({
	data: [],
	currentChat: null
})

const mutations = {
	SET_CHATS(state, chats){
		state.data = chats
	},
	CREATE_CHAT(state, chat){
		state.data.unshift(chat)
	},
	SET_CURRENT_CHAT(state, chat){
		state.currentChat = chat
	},
}

const actions = {
	creatChat({ commit }, user){
		return new Promise((resolve, reject) => {
			$axios.get(`/chat/create/${user}`)
				  .then((chat) => {
					  commit('CREATE_CHAT', chat.data[0])
					  resolve(chat.data[0])
				  })
				  .catch((error) => {
					  reject(error)
				  })
		})
	},
	setChats({ commit }, chats){
		commit('SET_CHATS', chats)
	},
	setCurrentChat({ commit }, chat){
		commit('SET_CURRENT_CHAT', chat)
	},
	getMessage({ commit }, user){
		return new Promise((resolve, reject) => {
			$axios.get(`/chat/get/${user}`)
				.then((chat) => {
					// commit('SET_CHATS', chat.data)
					resolve(chat.data)
				})
				.catch((error) => {
					reject(error)
				})
		})
	},
}

const getters = {}

export default {
	namespaced: true,
	state,
	mutations,
	actions,
	getters
}