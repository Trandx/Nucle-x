 
function isLoggedIn (store) { return store.state.auth.status.loggedIn}
function getUserDatas() { return localStorage.getItem('user')}

const role = {

    secretary: ({store,to, next}) => {

        let authRole = ['secretary', 'super', 'admin']
        
        if(!isLoggedIn (store)){    
            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            let user = getUserDatas()
            user = JSON.parse(user)
            let role = user.role

            if(!authRole.includes(role)){
                next({name: 'Home', params: {lang: to.params.lang}});
            }
            next()
        }
    },

    doctor: ({store,to, next}) => {

        let authRole = ['doctor', 'super', 'admin']
        
        if(!isLoggedIn (store)){    
            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            let user = getUserDatas()
            user = JSON.parse(user)
            let role = user.role

            if(!authRole.includes(role)){
                next({name: 'Home', params: {lang: to.params.lang}});
            }
            next()
        }
    },

    director: ({store,to, next}) => {

        let authRole = ['director', 'super', 'admin']
        
        if(!isLoggedIn (store)){    
            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            let user = getUserDatas()
            user = JSON.parse(user)
            let role = user.role

            if(!authRole.includes(role)){
                next({name: 'Home', params: {lang: to.params.lang}});
            }
            next()
        }
    },
    admin: ({store,to, next}) => {

        let authRole = ['super', 'admin']
        
        if(!isLoggedIn (store)){    
            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            let user = getUserDatas()
            user = JSON.parse(user)
            let role = user.role

            if(!authRole.includes(role)){
                next({name: 'Home', params: {lang: to.params.lang}});
            }
            next()
        }
    },
    super: ({store,to, next}) => {

        let authRole = ['super']
        
        if(!isLoggedIn (store)){    
            next({name: 'Login', params: {lang: to.params.lang}});        
            return false
        }else{
            let user = getUserDatas()
            user = JSON.parse(user)
            let role = user.role

            if(!authRole.includes(role)){
                next({name: 'Home', params: {lang: to.params.lang}});
            }
            next()
        }
    }

    
}

export default role