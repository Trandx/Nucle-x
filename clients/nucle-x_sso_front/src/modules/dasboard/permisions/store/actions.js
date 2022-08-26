
import permissionService from "../services";

export default {

    async listPermission({commit}, data){

        /// call auth service
       return permissionService.getPermission(data).then(function(resp){
           
            if(resp.status && resp.code <= 300){
                
                commit('UPSERT_PERMISSION',resp.data)
                return resp
            }

            return resp

        })
         
    },

    /// update or create permission 
    async upsert({commit}, data){
        return permissionService.upsertPermission(data).then(function(resp){
           
            if(resp.status && resp.code <= 300){
                
                commit('UPSERT_PERMISSION',resp.data)
                return resp

            }

            return resp

        })
    },

    /// update or create permission 
    async delete({commit}, data){
        return permissionService.deletePermission(data).then(function(resp){
           
            if(resp.status && resp.code <= 300){
                
                commit('DELETE_PERMISSION',resp.data)
                return resp

            }

            return resp

        })
    }
    // listMoreClient({commit}, data){

    // },
    // searchClient({state}, data){
    //     // state.clients.data.find((value, index) => {

    //     // })
    // }
    

}
