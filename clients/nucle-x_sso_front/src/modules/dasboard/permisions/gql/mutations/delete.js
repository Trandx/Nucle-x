const DELETE_PERMISSION = gql`
    mutation DELETE_PERMISSION (
        $id: String!
    ){
        DeletePermission(input:{id:$id}){
            ...on DeletePermissionSuccess{
                status
                code
                data{
                    id
                    name
                    description
                }
            }
            ...on Errors{status code message}
        }
    }
`
export default DELETE_PERMISSION