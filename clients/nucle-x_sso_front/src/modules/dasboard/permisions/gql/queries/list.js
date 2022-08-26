import gql from "graphql-tag";


const LIST_PERMISSION = gql`
    query LIST_PERMISSION (
        $limit: String
        $page: String
        $search: String

    ){
    ListPermission(input: {
        limit: $limit,
        page: $page,
        search: $search
    }){
   
        ...on ListPermissionSuccess{
            status
            code
            data{
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
                description
                default
                created_at
                updated_at
                }
            }
        }
        ...on Errors{status code message}

    }
}
`
export default LIST_PERMISSION