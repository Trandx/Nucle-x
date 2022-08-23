

class ClientService {

    getClient(search, queryComposition = null) {
        
        console.log(search, queryComposition)

        return [
            {
                id: 1,
                name: "client 1",
                description: "client 1 blabla",
                active: true,
                accessType: "public",
                actions: ["otp"],
                scopes: ["username", "phone"],
                base_url: '/client_1',

            },
            {
                id: 2,
                name: "test 2",
                description: "client 1 blabla",
                active: true,
                accessType: "public",
                actions: ["otp"],
                scopes: ["username", "phone"],
                base_url: '/client_2',

            },

        ]
        //return client datas appollo query 
    }


  
}

export default new ClientService();

  