import { createStore } from 'vuex'
import createPersistedState from 'vuex-persistedstate'
import Auth from '../modules/auth/store'
import Clients from '../modules/dasboard/clients/store'

export default createStore({
    plugins:[
        createPersistedState()
    ],
    modules:{
        Auth,
        Clients,
    }
})
