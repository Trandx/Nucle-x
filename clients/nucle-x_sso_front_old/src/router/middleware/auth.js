 
function isLoggedIn (store) { return store.state.auth.status.loggedIn}
function getUserDatas() { return localStorage.getItem('user')}

const auth = {

    redirectToLogin: ({store,to, next}) => {
        
        if(!isLoggedIn (store)){    
            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            next()
        }
    },

    redirectToHome: ({store,to, next}) => {
        //console.log(isLoggedIn (store)(), to, next)
        if(isLoggedIn (store)){    
            next( {name: 'Home', params: {lang: to.params.lang}});        
            return true
        }else{
            next()
        }
    },
    redirectToGoodView: ({store,to,next}) =>{

        if(!isLoggedIn(store)){

            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
    
        }else{
            
            let user = getUserDatas()
            user = JSON.parse(user)
            
            let role = user.role.charAt(0).toUpperCase()+ user.role.substring(1) // capitalize
            console.log(role)
            next({name: role+'Home', params: {lang: to.params.lang}});    
        }
    },

    
}

export default auth