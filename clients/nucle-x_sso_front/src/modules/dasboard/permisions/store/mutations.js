export default {

    SET_PERMISSIONS (state, value) {
        state.permissions.find((client) => {
            if(client.id = value.id){
                return Object.assign(client, value)
            }
        })
    },

    CREATE_PERMISSIONS(state, permissions) {
        state.permissions = permissions
    },

    ADD_PERMISSIONS(state, client){

        state.permissions.push(client)
    },
    
    DELETE_PERMISSIONS(state, value){
       
        state.permissions.find((client, index) => {
            if(client.id = value.id){
                state.permissions.splice(index, 1)
            }
        })
    }
}
