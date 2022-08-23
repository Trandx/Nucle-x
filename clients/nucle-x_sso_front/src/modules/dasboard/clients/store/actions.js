
import clientService from "../services";

export default {

    async listClient({commit}, data){

        /// call auth service
       return clientService.getClient(data).then(function(resp){
           
            if(resp.status && resp.code <= 300){
                
                commit('CREATE_CLIENTS',resp.data)
                return resp

            }

            return resp

        })
         
    },
    // listMoreClient({commit}, data){

    // },
    // searchClient({state}, data){
    //     // state.clients.data.find((value, index) => {

    //     // })
    // }
    

}
