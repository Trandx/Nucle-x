
//import {objectToGqlString} from '../../../apollo/lib'

import gql from "graphql-tag";


const REGISTER_USER = gql`
    mutation REGISTER_USER (
        $username: String!
        #$password: String!
        $name: String!
        $email: String!

    ){
        createUser(input: {
            username: $username,
            #password: $password,
            name: $name,
            email: $email
        }){
            id,
            username,
            name,
            email

        }
    }
`
export default REGISTER_USER