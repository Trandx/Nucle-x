import { createStore } from 'vuex'

import clientDataForm from './modules/clients'

export default createStore({
 
  modules: {
    client: clientDataForm
  }
})
