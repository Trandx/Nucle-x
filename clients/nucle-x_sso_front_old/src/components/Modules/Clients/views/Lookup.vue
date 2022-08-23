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
                        <input type="text" id="table-search" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search Clients">

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
                        <tr class=" bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple MacBook Pro 17"
                            </th>
                            <td class=" px-6">
                                Sliver
                            </td>
                            <td class=" px-6">
                                Laptop
                            </td>
                            <td class=" px-6 w-48 ">
                                <a  @click.prevent="openCredentialClient" class=" inline-block cursor-pointer font-medium mr-4 text-primary dark:text-primary hover:underline">
                                     <i class="fas fa-key"></i>
                                     keys
                                </a>

                                <!-- <router-link :to="{name: 'MoreSetting'}"  @click.prevent="openDeleteClient" class=" cursor-pointer font-medium mr-7 text-primary dark:text-primary hover:underline">More</router-link> -->
                                <a @click.prevent="openEditClient" class=" cursor-pointer font-medium mr-4 text-blue-500 dark:text-blue-500 hover:underline">Edit</a>
                                <a @click.prevent="openDeleteClient" class=" cursor-pointer font-medium text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-2 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Microsoft Surface Pro
                            </th>
                            <td class=" px-6">
                                White
                            </td>
                            <td class=" px-6">
                                Laptop PC
                            </td>
                            <td class=" px-6">
                                <a href="#" class="font-medium mr-5 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium mr-5 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Magic Mouse 2
                            </th>
                            <td class="py-4 px-6">
                                Black
                            </td>
                            <td class="py-4 px-6">
                                Accessories
                            </td>
                            <td class=" px-6">
                                <a href="#" class="font-medium mr-5 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium mr-5 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple Watch
                            </th>
                            <td class="py-4 px-6">
                                Silver
                            </td>
                            <td class="py-4 px-6">
                                Accessories
                            </td>
                            <td class=" px-6">
                                <a href="#" class="font-medium mr-5 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium mr-5 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                iPad
                            </th>
                            <td class="py-4 px-6">
                                Gold
                            </td>
                            <td class="py-4 px-6">
                                Tablet
                            </td>
                            <td class=" px-6">
                                <a href="#" class="font-medium mr-5 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium mr-5 text-red-600 dark:text-red-500 hover:underline">Delete</a>
                            </td>
                        </tr>
                        <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                            
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                Apple iMac 27"
                            </th>
                            <td class="py-4 px-6">
                                Silver
                            </td>
                            <td class="py-4 px-6">
                                PC Desktop
                            </td>
                            <td class=" px-6">
                                <a href="#" class="font-medium mr-5 text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#" class="font-medium mr-5 text-red-600 dark:text-red-500 hover:underline">Delete</a>
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
             <credentialClient v-if="viewName=='credential'"></credentialClient>
            <createClient ref="createClient" v-else ></createClient>
           
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

import Modal from '../../../Modals'

import ModalConfirm from '../../../Modals/confirm.vue'

import CreateClient from '../../../Forms/clients/create.vue'

import CredentialClient from '../../../Forms/clients/credential.vue'



export default {
    name: "Lookup",
    components:{
        Modal,
        CreateClient,
        ModalConfirm,
        CredentialClient,
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

            viewName: null,
        }
    },

    methods:{
        openCredentialClient(){
             this.$refs.modal.open = true;
            this.modalData.title = "Client Credentiels"
            this.viewName = "credential"
        },
        openCreateClient(){
            this.$refs.modal.open = true;
            this.modalData.title = "create client"
        },

        openDeleteClient(){
            this.$refs.modalComfirm.open = true;
            this.modalComfirm.message = "Are you sure ?"
        },

        openEditClient(){
            //console.log(this.$refs.createClient.formData.email = "emaillll");
            //this.$refs.createClient.formData.email = "emails"
            this.editClientData()
            this.$refs.modal.open = true;
            this.modalData.title = "edit client"
        },

        editClientData(){
            const model = this.$refs.createClient.formData
            const oldData = {name: "Trandx", description: "Trandx"}
            this.$refs.createClient.formData = {...model, ...oldData}
        },

        modalConfirmCallback(data){
            console.log(data)
        }
    },


}
</script>

<style>

</style>