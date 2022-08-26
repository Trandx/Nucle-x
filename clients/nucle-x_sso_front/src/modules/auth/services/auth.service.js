import apolloClient from "../../../apollo";
import gqlAuth from '../gql';

class AuthService {

     async login(user){

      return await apolloClient.mutate({
            mutation:  gqlAuth.mutations.LOGIN_USER ,
            variables: user
        }).then(function({data: {login_SSO}}) {

            return login_SSO
          //console.log(createUser);
        }).catch(function(error){
            return {
                code: 500,
                status: false, //error.networkError.response.status||
                message: error.message
            }
        })


        //return apollo.mutation.createUser(user)
        // const {result, loading, error} = apollo.mutation.createUser(user)
        // //store.addLoggedUserInStore(result.value)

        // return {result, loading, error}
    }


    logout() {
        localStorage.removeItem('user');
    }

    register() {
        // return axios.post(API_URL + 'signup', {
        //   lastname:user.lastname,
        //   firstname:user.firstname,
        //   phones:user.phones,
        //   speciality: user.speciality,
        //   password: user.password,
        //   password_confirmation: user.password_confirmation,
        // })
        // .then((response) => {
        //     return response.data
        // })
        // .catch((error) => {
        //     return error
        // })
    }

    forgot(){
    //    
    }
}


export default new AuthService();