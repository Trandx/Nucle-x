export default {
    clients:{
    },
    form: {
        create: {
            formData: {},

            options: {
                permissions: [
                    { value: 'update', label: 'update user' },
                    { value: 'create', label: 'create' },
                    { value: 'delete', label: 'delete' },
                    { value: 'update_user_password', label: 'update password' },
                    
                    { value: '*', label: 'all' },
                ],
                //accessType: {public:'public', private:'private'},
                type: {
                    authorization:'authorization', 
                    client:'client',
                    personnal:'personnal',
                    password:'password',

                },
                scopes: //{public:'public', private:'private'},
                [
                    { value: 'username', label: 'username'},
                    { value: 'profil', label: 'profil'},
                    { value: 'email', label: 'e-mail'},
                    { value: 'phone', label: 'phone number'},
                    { value: 'birthday', label: 'birthday'},
                    { value: 'country', label: 'country'},
                    { value: 'city', label: 'city'},
                    { value: 'quarter', label: 'quarter'},
                    { value: '', label: 'all'}

                ]
            }
        },
    }
}
