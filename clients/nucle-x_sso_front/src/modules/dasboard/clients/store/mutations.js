export default {

    SET_CLIENTS (state, value) {
        state.clients.find((client) => {
            if(client.id = value.id){
                return Object.assign(client, value)
            }
        })
    },

    CREATE_CLIENTS(state, clients) {
        state.clients = clients
    },

    ADD_CLIENTS(state, client){

        state.clients.push(client)
    },
    
    DELETE_CLIENTS(state, value){
       
        state.clients.find((client, index) => {
            if(client.id = value.id){
                state.clients.splice(index, 1)
            }
        })
    }
}
