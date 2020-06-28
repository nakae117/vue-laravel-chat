import $axios from '../utils/axios'

const state = () => ({
	user: null
})

const mutations = {
	SET_PROFILE(state, profile) {
		state.user = profile
	},
	SET_PHOTO(state, photo){
		state.user.url_photo = photo
	}
}

const actions = {
	setProfile({ commit }, profile) {
		commit('SET_PROFILE', profile)
	},
	updateProfile({ commit }, profileData){
		return new Promise((resolve, reject) => {
			$axios.put('/perfil/update', profileData)
				  .then((profile) => {
					  commit('SET_PROFILE', profile.data)
					  resolve(profile.data)
				  })
				  .catch((res) => {
					  reject(res)
				  })
		})
	},
	updatePassword({}, passwordData){
		return new Promise((resolve, reject) => {
			$axios.put('/perfil/update-password', passwordData)
				  .then((profile) => {
					  resolve(profile.data)
				  })
				  .catch((res) => {
					  reject(res)
				  })
		})
	},
	setPhoto({commit}, photo){
		commit('SET_PHOTO', photo)
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