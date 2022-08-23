import axios from 'axios'

const API_URL =  process.env.VUE_APP_API_URL_RESSOURCE+'auth/'

class AuthService {
    login(user){

        // test part//
        
        localStorage.setItem('user', JSON.stringify({"login": user.login, "password": user.password, "role":"admin"}));
       
        return Promise.resolve({"login": user.login, "password": user.password});

        // return axios
        //     .post(API_URL+'login', {
        //         username: user.login,
        //         password: user.password
        //     })
        //     .then(response => {
                
        //         if (response.data.accessToken) {
        //             localStorage.setItem('user', JSON.stringify(response.data));
        //           }
                
        //         return response.data;
        //     }).catch((error) => {
        //         return error
        //     })
    }


    logout() {
        localStorage.removeItem('user');
    }

    register(user) {
        return axios.post(API_URL + 'signup', {
          lastname:user.lastname,
          firstname:user.firstname,
          phones:user.phones,
          speciality: user.speciality,
          password: user.password,
          password_confirmation: user.password_confirmation,
        })
        .then((response) => {
            return response.data
        })
        .catch((error) => {
            return error
        })
    }

    forgot(user, step){
       let data = {}
        if(step==1){    
            data = {
                email_phone:user.email_phone,
            }
        }
        if(step==2){
            data = {
                email_phone:user.email_phone,
                code: user.code,
            }
        }
        if(step==3){
            data = {
                email_phone:user.email_phone,
                code: user.code,
                password: user.password,
                password_confirmation: user.password_confirmation
            }
            
        }
        return axios.post(API_URL + 'forgot', data)
          .then((response) => {
              return response.data
          })
          .catch((error) => {
              return error
          })
    }
}


export default new AuthService();