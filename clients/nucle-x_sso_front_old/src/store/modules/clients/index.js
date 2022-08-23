
import form from './forms/client.module'
import Fuse from 'fuse.js'
import clientService from "../../../services/client.service";

export default {
    namespaced: true,

    state: {
        list:[]

    },

    getters: {
        // getClientByKey: (state) => () => {

        // },

        getClientList: (state) => state.list,

        search: (state) => ({keyWord, keys=["name"]}) =>{

            const options = {
                // isCaseSensitive: false,
                // includeScore: false,
                // shouldSort: true,
                // includeMatches: false,
                // findAllMatches: false,
                // minMatchCharLength: 1,
                // location: 0,
                 threshold: 0.6,
                // distance: 100,
                // useExtendedSearch: false,
                // ignoreLocation: false,
                // ignoreFieldNorm: false,
                // fieldNormWeight: 1,
                keys: keys //["title","author.firstName"]
            };
              
            const fuse = new Fuse(state.list, options);

            return fuse.search(keyWord)
        }

    },

    mutations: {

        changeDatasForm(state, clientId){
            const client = state.list.filter(val=>val.id == clientId)
            //console.log(client);
            Object.assign(form.state.create.formData, ...client)

            console.log(form.state.create.formData);
        },
           
        setClientDatas(state, datas){

            state.list = [...new Set([...state.list,...datas])]
           
        }
    },

    actions: {
        loadClientDatas({commit, state}){
            commit('setClientDatas', clientService.getClient("")) 

            return state.list
        }
    },

    modules: {
        form: form
    }
}