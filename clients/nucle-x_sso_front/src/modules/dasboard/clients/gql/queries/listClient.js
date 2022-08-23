import gql from "graphql-tag";


const LIST_CLIENT = gql`
    query LIST_CLIENT (
        $limit: String
        $page: String
        $search: String

    ){
    ListClient(input: {
        limit: $limit,
        page: $page,
        search: $search
    }){
   
        ...on ListClientSuccess{
            status
            code
            data {
            pagination{
                count
                total
                firstPage
                lastPage
                currentPage
                perPage
                hasMorePage
            }
            data{
                id
                name
                revoked
                redirect
                secret
                type
            }
            }
        }
        ...on Errors{ status code message}     
    }
}
`
export default LIST_CLIENT