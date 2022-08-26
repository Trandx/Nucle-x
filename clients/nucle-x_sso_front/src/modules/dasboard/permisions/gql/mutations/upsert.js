
const UPSERT_PERMISSION = gql`
    mutation UPSERT_PERMISSION (
        $id: String
        #$password: String!
        $name: String!
        $description: String

    ){
        UpsertPermission(input:{id: $id, name:$name, description: $description}){
            ...on UpsertPermissionSuccess{
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
export default UPSERT_PERMISSION