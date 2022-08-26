import apolloClient from "../../../../apollo";
import gqlClient from '../gql';

class permissionService {

    async getPermission(data = null){

      return await apolloClient.query({
            query:  gqlClient.queries.LIST_PERMISSION ,
            variables: data
        }).then(function({data: {ListPermission}}) {

            return ListPermission
          //console.log(createUser);
        }).catch(function(error){
            return {
                status: 500, //error.networkError.response.status||
                data: error.message
            }
        })

    }

    async upsertPermission(data){
        return await apolloClient.query({
            query:  gqlClient.mutations.UPSERT_PERMISSION ,
            variables: data
        }).then(function({data: {UpsertPermission}}) {

            return UpsertPermission
          //console.log(createUser);
        }).catch(function(error){
            return {
                status: 500, //error.networkError.response.status||
                data: error.message
            }
        })

    }

    async deletePermission(data){
        return await apolloClient.query({
            query:  gqlClient.mutations.DELETE_PERMISSION ,
            variables: data
        }).then(function({data: {DeletePermission}}) {

            return DeletePermission
          //console.log(createUser);
        }).catch(function(error){
            return {
                status: 500, //error.networkError.response.status||
                data: error.message
            }
        })

    }

}


export default new permissionService();