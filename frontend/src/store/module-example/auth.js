// import state from './state'
// import * as getters from './getters'
// import * as mutations from './mutations'
// import * as actions from './actions'
// export default {
//   namespaced: true,
//   getters,
//   mutations,
//   actions,
//   state
// }
export const state = {
    user: {},
    admin: null,
    token: null
  
  }
  
  export const mutations = {
    auth_success(admin, token, user) {
        state.admin = admin
        state.token = token
        state.user = user
    },
    auth_logout() {
        state.admin = false
        state.token = false
        state.user = {}
    }
  }
  
  export const actions = {
    login(admin, token, user) {
        auth_success(admin, token, user)
        console.log('User stored')
    },
    logout() {
        auth_logout()
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
  