<template>
  <div class="m-5 capitalize">
    <div class=" dark:bg-gray-900 ">

        <div class="mb-4 border-b border-gray-200 dark:border-gray-700">
            <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="myTab" data-tabs-toggle="#myTabContent" role="tablist">
                <li class="mr-2" >
                    <a class="inline-block p-4 rounded-t-lg border-b-2 text-blue-600 hover:text-v-dark dark:text-primary dark:hover:text-v-dark 
                        border-primary dark:border-v-dark" id="setting-tab">
                        <i class=" fa-list-alt fas mr-2"></i>
                        Lookup
                    </a>
                </li>
            </ul>
        </div>
        <div id="myTabContent" class="pb-4 mb-4">
            
           <div class="overflow-x-auto shadow-md sm:rounded-lg">
                <div class="pb-4 pt-4 flex justify-between bg-white dark:bg-gray-900">
                    
                    <div class=" mt-1">
                        <div class="flex  relative items-center pl-3 p">
                            <i class="ointer-events-none fas fa-search absolute left-6 w-5 h-5 text-gray-500 dark:text-gray-400"></i>
                        <input @input="search" type="text" id="table-search" v-model="keyWord" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Clients">

                        </div>
                    </div>

                    <button @click.prevent="openCreateClient" type="button" class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-primary dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">
                        Create
                    </button>

                </div>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            
                            <th scope="col" class="py-3 px-6">
                                Client
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Actif
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
                        <tr v-for="(client, key) in clientList" :key="key" class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                               {{client.name || client.item.name }}
                            </th>
                            <td class=" px-6">
                                {{ client.active || client.item.active }}
                            </td>
                            <td class=" px-6">
                               {{ client.base_url || client.item.base_url }}
                            </td>
                            <td class=" px-6 w-48 ">
                                <a  @click.prevent="() => openCredentialClient(client.id || client.item.id)" class=" inline-block cursor-pointer font-medium mr-4 text-primary dark:text-primary hover:underline">
                                     <i class="fas fa-key"></i>
                                     keys
                                </a>

                                <!-- <router-link :to="{name: 'MoreSetting'}"  @click.prevent="openDeleteClient" class=" cursor-pointer font-medium mr-7 text-primary dark:text-primary hover:underline">More</router-link> -->
                                <a @click.prevent="() => openEditClient(client.id || client.item.id)" class=" cursor-pointer font-medium mr-4 text-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                                <a @click.prevent="() => openDeleteClient(client.id || client.item.id)" class=" cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
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

            <component :is="view.name" :editForm="view.datas"></component>
           
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

// import { defineAsyncComponent } from 'vue'

import Modal from '../../Modals'

import ModalConfirm from '../../Modals/confirm.vue'

import CreateClient from '../../Forms/clients/create.vue'

import CredentialClient from '../../Forms/clients/credential.vue'


export default {
    name: "UsersLookup",
    components:{
        Modal,
        ModalConfirm,
        CreateClient,
        CredentialClient,
        // CreateClient: defineAsyncComponent(() => import('../../Forms/clients/create.vue')),
        // CredentialClient: defineAsyncComponent(() => import('../../Forms/clients/credential.vue')),
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

    methods:{
        
        openModal(title, componentName,footer = null){
            this.$refs.modal.open = true;
            this.modalData.title = title
            this.view.name = componentName
            this.modalData.footer = footer || false

        },

        openCredentialClient(){
            const name = "credentialClient"
            //let data = {"id": "hello", "key": "xyz"}
            this.openModal("Client Credentiels", name) 
            //this.editClientData(data)        
           
        },
        openCreateClient(){
       
            const name = "createClient"
            
            this.$store.dispatch('client/resetDatasForm')
            //this.$store.commit('client/changeDatasForm',{})
            this.view.datas = {}
            this.openModal("create client" , name) 
         
        },

        openDeleteClient(clientId){
            this.$refs.modalComfirm.open = true;
            this.modalComfirm.message = "Are you sure ?"

            console.log(clientId);
        },

        openEditClient(clientId){
            //console.log(this.$refs.createClient.formData.email = "emaillll");
            //this.$refs.createClient.formData.email = "emails"
           
           //this.view.datas = {name: "Trandx", description: "Trandx", "active": true}

            const name = "createClient"

            this.editClientData(clientId)

            this.openModal("create client" , name)

            
        },

        editClientData(clientId){

            //console.log(clientId);
            this.$store.commit('client/changeDatasForm',clientId)
            
            this.view.datas = this.$store.getters['client/getDatasofCreateForm']

            console.log(this.view.datas);

        },

        modalConfirmCallback(data){
            console.log(data)
        },

        search(){

            if(this.keyWord.trim()){

                const result = this.$store.getters['client/search']( {
                    keyWord:  this.keyWord,
                    keys: ["name"]
                })

                result&& (this.clientList = result)
                
                return 
                
            }
            return this.clientList = this.$store.getters['client/getClientList']

        }
    },

    created(){
        this.$store.dispatch('client/loadClientDatas')
        this.clientList = this.$store.getters['client/getClientList']

    }


}
</script>

<style>

</style>