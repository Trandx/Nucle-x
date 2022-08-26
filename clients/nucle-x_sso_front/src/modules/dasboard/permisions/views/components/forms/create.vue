<template>
  <form class="space-y-6 capitalize" @submit.prevent="savePermission">
        
        <div class=" w-5/6justify-start hidden">
            <input type="hidden" id="permisionName" v-model="formData.id" class="self-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="permision 1" required="">
        </div>
        
        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="permisionName" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">name</label>
            </div>
            <div class=" w-5/6 flex justify-start">
                <input type="text" id="permisionName" v-model="formData.name" class="self-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="permision 1" required="">
            </div>
        </div>

        <div class="w-full flex">
            <div class="w-1/6 flex justify-start ">
                <label for="permisionDescription" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">description</label>
            </div>
            <div class=" w-5/6 flex justify-start">
                <textarea id="permisionDescription" v-model="formData.description" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="permision description..."></textarea>
            </div>
        </div>
        

        <!-- <div class="text-white">
            {{formData}}
        </div> -->

        
        
       
       <div class="justify-between flex px-4">
            <button type="submit" class=" mx-5 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                save
            </button>

            <button @click.prevent="reset"  class="mx-5 w-full text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                reset
            </button>
       </div>
        
        
    </form>
</template>

<script>

import { mapActions } from 'vuex';

//import {mapGetters} from 'vuex'

import ResetForm from '../../../../../../mixins/forms/index'

export default {
    name: "CreateClient",
    
    components: {
       
    },

    props:{
        datas:{
            default: null
        },

        // editForm:{
        //     type: Object
        // }
        
    },

    data(){
        return {
            formData: this.$props.datas||{},
            options: {}
        }
    },
    watch:{
        datas: {
            handler(newValue) {
                //console.log(newValue);
                this.formData = newValue || {}
            },
            deep: true
        },
    },

    methods:{

        ...mapActions({
            'upsert': "Permissions/upsert"
        }),

        savePermission(){
            console.log(this.formData)
        }
    },

    mixins: [ResetForm],

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