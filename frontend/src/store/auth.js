export const state = {
    user: {},
    admin: false,
    token: false
  
  }
  
  export const mutations = {
    auth_success(state,data) {
        state.admin = data.admin
        state.token = data.token
        state.user = data.user
    },
    auth_logout(state) {
        state.admin = false
        state.token = false
        state.user = {}
    }
  }
  
  export const actions = {
    login({commit},data) {
        console.log(data)
        commit('auth_success',data)
        console.log('User stored')
    },
    logout({commit}) {
        commit('auth_logout')
    }
  }
  
  export const getters = {
    isLoggedIn: state => state.token,
    isAdmin: state => state.admin
  }
  
  export default {
    namespaced: true,
    getters,
    mutations,
    actions,
    state
  }
  