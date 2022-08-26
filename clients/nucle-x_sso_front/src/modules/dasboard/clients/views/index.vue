<template>

  <div class="m-0 capitalize">
    <div class=" dark:bg-gray-900 ">

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" >
                    <a class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-v-dark dark:text-primary dark:hover:text-v-dark 
                        border-primary dark:border-v-dark" id="setting-tab">
                        <i class=" fa-list-alt fas mr-2"></i>
                        Clients
                    </a>
                </li>
            </ul>
        </div>
        <div id="myTabContent" class="pb-4 mb-4 ml-4 mr-4">
            
           <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="pb-4 pt-4 flex justify-between bg-white dark:bg-gray-900">
                    
                    <div class=" mt-1">
                        <div class="flex  relative items-center pl-3 p">
                            <i class="ointer-events-none fas fa-search absolute left-6 w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                        <input @input="search" type="text" id="table-search" v-model="keyWord" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Clients">

                        </div>
                    </div>

                    <button @click.prevent="() =>openCreate('CreateClient',  'client')" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Create
                    </button>

                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            
                            <th scope="col" class="py-3 px-6">
                                Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Description
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Revoke
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Base URL
                            </th>
                            <th scope="col" class="py-3 px-6 w-2 ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-if="!clientList">
                            <td colspan="4" class="text-center" >
                                <div role="status" class="p-4">
                                    <svg class="inline mr-2 w-16 h-16 text-gray-200 animate-spin dark:text-gray-600 fill-primary" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                                        <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
                                    </svg>
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </td>

                        </tr>
                        <tr v-for="(client, key) in clientList" :key="key" class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{client.name}}
                            </th>
                            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" >
                                <p class="hover:text-clip text-ellipsis  overflow-auto ">
                                   {{client.description}}
                                </p>
                            </th>
                            <td class=" px-6">
                                {{ client.revoked  }}
                            </td>
                            <td class=" px-6">
                               {{ client.redirect  }}
                            </td>
                            <td class=" px-6 w-48 ">
                                <a  @click.prevent="() => openCredential('CredentialClient',client, client.name)" class=" inline-block cursor-pointer font-medium mr-4 text-primary dark:text-primary hover:underline">
                                     <i class="fas fa-key"></i>
                                     keys
                                </a>

                                <!-- <router-link :to="{name: 'MoreSetting'}"  @click.prevent="openDeleteClient" class=" cursor-pointer font-medium mr-7 text-primary dark:text-primary hover:underline">More</router-link> -->
                                <a @click.prevent="() => openEdit('CreateClient', client, client.name)" class=" cursor-pointer font-medium mr-4 text-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                                <a @click.prevent="() => openDelete( client, client.name)" class=" cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
        
    
    <Modal ref="modal">
        <template #modalTitle >
            {{modalData.title}}
        </template>

        <template #modalBody v-if="modalData.body" v-html="modalData.body" />

        <template #modalBody v-else >
            <!-- <credential-client v-if="view.name=='credentialClient'" :ref="view.ref" />
            <create-client v-else :ref="view.ref" /> -->
            <!-- <template v-if="view.edit"  >
                <component :is="view.name" :datas="view.datas" ></component>
            </template>

            <template v-else >
                <component :is="view.name" ></component>
            </template> -->

            <component :is="view.name" :datas="view.datas"></component>
           
        </template>

        <template #modalFooter >
            {{modalData.footer}}
        </template>
    </Modal>

    <ModalConfirm ref="modalComfirm" @cancel="modalConfirmCallback" @confirm="modalConfirmCallback">
        <template #message>
            {{modalComfirm.message}}
        </template> 
    </ModalConfirm>
  </div>


</template>

<script>

import { mapActions, mapGetters } from 'vuex'

// import { defineAsyncComponent } from 'vue'

import Modal from '../../../../components/Modals'

import ModalConfirm from '../../../../components/Modals/confirm.vue'

import CreateClient from './components/forms/create.vue'

import CredentialClient from './components/forms/credential.vue'

import openModal from '../../../../mixins/modals'


export default {
    name: "Client",
    components:{
        Modal,
        ModalConfirm,
        CreateClient,
        CredentialClient,
        // CreateClient: () => import('./components/forms/create.vue'),
        // CredentialClient: () => import('./components/forms/credential.vue'),
    },
    data(){
        return {
            modalData: {
                title: null,
                body: null,
                footer: null
            },

            modalComfirm: {
                message: null,
                cancelBtn: null,
                confirmBtn: null
            },

            view:{
                name: null,
                edit: false,
                datas: null,
            },

            keyWord: null,

            clientList: null

        }
    },
    watch: {
        getClients(promise) {
            // save Promise result in local state
            promise.then(clients => this.clientList = clients.data)
        }
    },

    methods: {

        ...mapGetters({
            "getClients" : "Clients/clients"
        }),

        ...mapActions({
            "listClient": "Clients/listClient",
        }),

        showClient(){
            
            let clients = this.getClients()

            if(clients.data != undefined && clients.data.length != 0){
                this.clientList = clients.data
            }else{

               this.listClient().then((datas) => {

                    if(datas.status){
                       const {data} = datas.data
                        this.clientList = data
                   //     console.log(this.clientList)
                    }else{
                        console.log(datas)
                    }

               })
                   
            }   
            
        },

        // openCredentialClient(client){
        //     this.$refs.modal.open = true;
        //     this.modalData.title = "Credentiels of "+client.name
        //     this.view.name = "CredentialClient"
        //     this.view.datas = client
        // },
        // openCreateClient(){
        //     this.$refs.modal.open = true;
        //     this.modalData.title = "create new client"
        //     this.view.name = "CreateClient"
        //      this.view.datas = null
        // },

        // openEditClient(client){
            
        //     this.$refs.modal.open = true;
        //     this.modalData.title = "edit client "+client.name
        //     this.view.name = "CreateClient"
        //     this.view.datas = client

        // },

        // openDeleteClient(client){
        //     this.$refs.modalComfirm.open = true;
        //     this.modalComfirm.message = `Are you sure to delete ${client.name} ?`
        // },

        modalConfirmCallback(value){
            console.log(value);
        }
    },

    mounted(){
        this.showClient()
    },

    mixins: [openModal],



}
</script>

<style>

</style>
