<template>
  <form class="space-y-6 capitalize" action="#">
        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="clientName" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">name</label>
            </div>
            <div class=" w-5/6 flex justify-start">
                <input type="text" id="clientName" v-model="formData.name" class="self-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="client 1" required="">
            </div>
        </div>

        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="clientDescription" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">description</label>
            </div>
            <div class=" w-5/6 flex justify-start">
                <textarea id="clientDescription" v-model="formData.description" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="client description..."></textarea>
            </div>
        </div>

        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="clientDescription" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">Active</label>
            </div>
            <div class=" w-5/6 flex justify-start">
                <label for="clientActive" class="inline-flex relative items-center cursor-pointer">
                    <input type="checkbox" id="clientActive" v-model="formData.active" class="sr-only peer" >
                    <div class="w-11 h-6 bg-gray-200 rounded-full peer dark:bg-gray-300 peer-checked:after:translate-x-full  after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-gray-800 after:border-gray-800 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                    
                </label>
            </div>
            
        </div>
        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="clientAccessType" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">access type</label>
            </div>

            <div class=" w-5/6 flex justify-start">
                <Multiselect class= "multiselect"
                    v-model="formData.accessType"
                    mode="single"
                    placeholder="Choose access type"
                    :close-on-select="false"
                    :options="options.accessType"
                />
                <!-- <select id="clientAccessType" v-model="formData.accessType" class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value=""></option>
                    <option value="public">public</option>
                    <option value="private">private</option>
                </select> -->
            </div>
        </div>

        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="clientAccessType" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">Actions</label>
            </div>

            <div class=" w-5/6 flex justify-start">
                <Multiselect class= "multiselect"
                    v-model="formData.actions"
                    mode="tags"
                    placeholder="search client's Action"
                    :close-on-select="false"
                    :searchable="true"
                    :object="false"
                    :create-option="false"
                    :options="options.actions"
                />
            </div>
        </div>

        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="clientAccessType" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">Scopes</label>
            </div>

            <div class=" w-5/6 flex justify-start">
                <Multiselect class= "multiselect"
                    v-model="formData.scopes"
                    mode="tags"
                    placeholder="search client's Action"
                    :close-on-select="false"
                    :searchable="true"
                    :object="false"
                    :create-option="false"
                    :options="options.scopes"
                />
            </div>
        </div>

        <!-- <div class="text-white">
            {{formData}}
        </div> -->

        
        
       
       <div class="justify-between flex px-4">
            <button type="submit" class=" mx-5 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                save
            </button>

            <button type="rest" class="mx-5 w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                reset
            </button>
       </div>
        
        
    </form>
</template>

<script>

import Multiselect from '@vueform/multiselect'

//import {mapGetters} from 'vuex'

export default {
    name: "CreateClient",
    
    components: {
        Multiselect
    },

    props:{
        datas:{
            type: Object
        },

        editForm:{
            type: Object
        }
        
    },

    data(){
        return {
            formData: {},
            options: {}
        }
    },
    watch: {
        editForm: {
            handler(newval){
                console.log(newval);
                this.formData = newval
            },

            deep: true,
            immediate: true,

        }
    },

    created(){
       
        this.options =this.$store.getters['client/getOptionsForm']
        
    },

    // computed:{
    //     ...mapGetters({
    //         datasOfCreateForm: 'client/getDatasofCreateForm'
    //     })
    // },


    // watch:{ 
    //     editData: {
    //         handler(newValue) {
    //             console.log(newValue);
    //             this.formData = {...this.formData, ...newValue}
    //         },
    //         deep: true
    //      },
    // },

}
</script>

<style>

</style>