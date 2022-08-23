 


import store from "../../store";

const auth = {


    authenticaded: ({next}) => {
        //console.log(auth.isLoggedIn());
        if(!auth.isLoggedIn()){
            next({name: 'Login'}); 
            //next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            next()
        }
        
    },

    redirectIfAuthenticated: function({next}){
        //console.log(isLoggedIn (store)(), to, next)
        if(auth.isLoggedIn ()){    
            next( {name: 'Clients'});
            //next( {name: 'Dashboard', params: {lang: to.params.lang}});        
            return true
        }else{
            next()
        }
    },
    // redirectToGoodView: ({to,next}) =>{

    //     if(!auth.isLoggedIn()){

    //         next({name: 'Login', params: {lang: to.params.lang}});        
    //         return false
    
    //     }else{
            
    //         let user = getUserDatas()
    //         user = JSON.parse(user)
            
    //         let role = user.role.charAt(0).toUpperCase()+ user.role.substring(1) // capitalize
    //         console.log(role)
    //         next({name: role+'Home', params: {lang: to.params.lang}});    
    //     }
    // },

    isLoggedIn: () => { 

      //console.log(Date.now(), store.getters['Auth/authenticated'])
        
        if(store.getters['Auth/authenticated']){
            store.dispatch('Auth/updateSessionTime') 
            return true
        }else{
            return false
        }

    }
}

export default auth