import router from "../../../router";
import authService from "../services/auth.service";

export default {

 /*async */  loginUserInStore({commit}, data){

        const remember = data.remember || false

        if(data.remember){
            delete data.remember // remove remember property into the data
        }
        /// call auth service
     /* return */  authService.login(data).then(function(resp){

            if(!resp.status && resp.code >= 300){
                return resp
            }else{
                const {access_token, user} = resp.data
                
                commit('SET_USER',user)
                commit('SET_ACCESS_TOKEN',access_token)
                commit('SET_AUTHENTICATED',true)
                commit('CREATE_SESSION_TIME',remember)
                
                // redirect to dasboard
                router.push({name:'Clients'});
                
            }
        })
         
    },
    
    logoutUserInStore({commit}){
        commit('SET_USER',{})
        commit('SET_AUTHENTICATED',false)
        commit('CREATE_SESSION_TIME',false)
    },

    updateSessionTime({commit}){
        commit('SET_SESSION_TIME')
    },

}
