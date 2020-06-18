import $axios  from '../utils/axios'

const state = () => ({
	data: []
})

const mutations = {
	SET_USERS(state, users) {
		state.data = users
	}
}

const actions = {
	setUsers({ commit }, users) {
		commit('SET_USERS', users)
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