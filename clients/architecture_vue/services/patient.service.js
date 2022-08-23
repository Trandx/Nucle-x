
import axios from 'axios';
import authHeader from './auth-header';

const API_URL = process.env.VUE_APP_API_URL_RESSOURCE+'patient/';

class PatientService {
  getAllPatient() {
    return axios.get(API_URL + '?search=all');
  }

  getPatient(search, queryComposition = null) {
      console.log(search, queryComposition)
      return [
        {
            "id": 1,
            "first_name":"Trandx",
            "last_name": "Argand",
            "age":"",
            "sexe": "",
            "appointment":[
            {
                "departement": {
                        "name": "neurology",
                        "date": "2022-10-10",
                        "created_at": "2022-01-10",
                    },
                "is_maded": false
            },
            {
                "departement": {
                        "name": "dentistry",
                        "date": "2022-11-10",
                        "created_at": "2022-01-10",
                    },
                "is_maded": false
            },
          ]
        },

        {
            "id": 2,
            "first_name":"Trandx 2",
            "last_name": "Argand 2",
            "age":"",
            "sexe": "",
            "appointment":[
              {
                  "departement": {
                          "name": "neurology",
                          "date": "2022-10-10",
                          "created_at": "2022-01-10",
                      },
                  "is_maded": false
              },
              {
                  "departement": {
                          "name": "dentistry",
                          "date": "2022-11-10",
                          "created_at": "2022-01-10",
                      },
                  "is_maded": false
              },
            ]
          }
    ]
    //return axios.get(API_URL + '?search='+search+queryComposition, { headers: authHeader() });
  }

  qrCodeVerification(code){
    
    if(isNaN(code)){
      return {
        sucess : false,
      }
    }
    return {
      sucess : true,
      datas : {
        personal_referral_code: code
      }
    }
    
    // let datas = Object.assign( { headers: authHeader() }, code)
    
    // return axios.post(API_URL + 'qrCodeVerification', datas);

  }

  postNewPatient(patient) {

    let datas = Object.assign( { headers: authHeader() }, patient)
    
    return axios.post(API_URL + 'mod', datas);
  }

  getAdminBoard() {
    return axios.get(API_URL + 'admin', { headers: authHeader() });
  }

  
}

export default new PatientService();

  