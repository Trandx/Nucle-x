const model = {
  name: '',
  description: '',
  active:'',
  accessType: "",
  actions: [""],
  scopes: [""]
  
}
const form  = {
  //namespaced: true,

    state: {
        // there we define datas state
        create: {
            formData: {},

            options: {
                actions: [
                    { value: 'otp', label: 'OTP' },
                    { value: 'update_password', label: 'update password' },
                    { value: 'verify_email', label: 'verify Email' },
                    { value: 'update_user', label: 'update other User Field' },
                ],
                accessType: {public:'public', private:'private'},
                scopes: //{public:'public', private:'private'}
                [
                    { value: 'username', label: 'username'},
                    { value: 'profil', label: 'profil'},
                    { value: 'email', label: 'e-mail'},
                    { value: 'phone', label: 'phone number'},
                    { value: 'birthday', label: 'birthday'},
                    { value: 'country', label: 'country'},
                    { value: 'city', label: 'city'},
                    { value: 'quarter', label: 'quarter'}

                ]
            }
        },

        credential:{
            formData:{}
        }
    
      },
      getters: {
        // there we define differents methods to get datas
        getDatasofCreateForm: (state) =>{
            //console.log(formType);
          return state.create.formData
        },

        getOptionsForm: (state) =>{
          //console.log(formType);
        return state.create.options
      },
    
        // doneTodosCount (state, getters) {
        //   return getters.doneTodos.length
        // },
    
        // getTodoById: (state) => (id) => {
        //   return state.todos.find(todo => todo.id === id)
        // }
      },
      mutations: {
        // there we define differents methods to update datas
       
        setDatasForm(state){
          
          Object.assign(state.create.formData, model)
        }
        // increment (state, n) {
        //   state.count += n
        // },
    
        // [SOME_MUTATION] (state) {
        //   // mutate state
        // }
    
      },
      actions: {

        resetDatasForm({commit}){
          commit('setDatasForm')
        }
        // there we can do any action
    
        // increment ({ commit }) {
        //   commit('increment')
        // }
      },
}

export default form

