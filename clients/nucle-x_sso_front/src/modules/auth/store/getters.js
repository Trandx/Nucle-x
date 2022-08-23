export default {
    
    authenticated(state){
    
        return (state.authenticated && (state.sessionExpireAt >= Date.now()) )
    },
    user(state){
        return state.user
    },
    sessionExpireAt(state){
        return state.sessionExpireAt
    },
    token(state){
        return state.token
    },

}