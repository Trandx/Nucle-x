<template>
    <form action="#">
        <div class="max-w-3xl mx-10">
            <div class=" space-y-6 capitalize">
                <div class="w-full flex">
                    <div class="w-1/5 flex justify-start ">
                        <label  class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">client ID</label>
                    </div>
                    <div class=" w-4/5 flex justify-start">
                        <div  class="self-center h-9 max-h-min text-left bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" >
                            {{formData.id}}
                        </div>
                    </div>
                </div>

                <div class="w-full flex">
                    <div class="w-1/5 flex justify-start ">
                        <label for="clientName" class=" text-left my-auto pr-2 font-medium text-gray-900 dark:text-gray-300">client secret</label>
                    </div>
                    <div class=" w-4/5 flex justify-start">
                        <input type="text" id="clientName" v-model="formData.secret" class="self-center bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="client 1" required="">
                    </div>
                </div>

                <div class=" w-full flex justify-end">
                    <button type="submit" class=" ml-5 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Generate
                    </button>
                </div>
            </div>
            
           

        </div>
    </form>
  
</template>

<script>
export default {
    name: "Credentials",

    props:["datas"],

    data(){
        return {
            formData: this.$props["datas"]
        }
    },
    watch:{
        datas: {
            handler(newValue) {
                console.log(newValue);
                this.formData = newValue
            },
            deep: true
        },
    }

}
</script>

<style>

</style>