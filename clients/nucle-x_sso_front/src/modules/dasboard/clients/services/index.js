import apolloClient from "../../../../apollo";
import gqlClient from '../gql';

class clientService {

     async getClient(data = null){

      return await apolloClient.query({
            query:  gqlClient.queries.LIST_CLIENT ,
            variables: data
        }).then(function({data: {ListClient}}) {

            return ListClient
          //console.log(createUser);
        }).catch(function(error){
            return {
                status: 500, //error.networkError.response.status||
                data: error.message
            }
        })

    }

}


export default new clientService();