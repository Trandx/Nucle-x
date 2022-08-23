

//import {objectToGqlString} from '../../../apollo/lib'

import gql from "graphql-tag";


const LOGIN_USER = gql`
    mutation LOGIN_USER (
        $login: String!
        $password: String!

    ){      
    login_SSO(input: {login:$login, password:$password}){
        ...on LoginSuccess{
            status,
            data{
                access_token, 
                user{
                    id,
                    first_name,
                    last_name,
                    username
                    birthday,
                    phones{
                        active,
                        all
                    },
                    email{
                        active,
                        old
                    }
                    avatar{
                        thumb
                        real_size
                        old
                    }
                    created_at,
                    updated_at,
                    roles{
                        name
                    }
                }
                
            }
        }
        ...on Errors{ status, code, message}
    }
    
  }
`
export default LOGIN_USER