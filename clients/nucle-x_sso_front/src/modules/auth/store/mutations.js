export default {
    SET_AUTHENTICATED (state, value) {
        state.authenticated = value
    },
    SET_USER (state, value) {
        state.user = value
    },
    SET_ACCESS_TOKEN (state, value) {
        state.token = value
    },
    CREATE_SESSION_TIME(state, value = false){
       
        // update session time 
        const add_time = value?process.env.VUE_APP_SESSION_TIME_REMEMBER : process.env.VUE_APP_SESSION_TIME

        const date = parseInt(Date.now()) + parseInt(add_time);

        state.sessionExpireAt = date
    },
    SET_SESSION_TIME(state){
       
        // update session time 
        const add_time = process.env.VUE_APP_SESSION_TIME_ADD
        const date = parseInt(Date.now()) + parseInt(add_time);

        state.sessionExpireAt = date
    }
}
