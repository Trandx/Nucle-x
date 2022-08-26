export default {
    
    clients(state){
        return state.clients
    },
    getOptionsofCreateForm: (state) =>{
        //console.log(formType);
      return state.form.create.options
    },
    // client(state, value){
    //     return state.sessionExpireAt
    // },

}