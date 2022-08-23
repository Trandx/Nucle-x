<template>
    <div ref="confirm-modal" tabindex="-1" :class="!open?'hidden':false" class=" overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 md:h-full justify-center items-center flex">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button @click.prevent="closeModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <i class="fa-solid fa-x"></i>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-6 text-center">
                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                
                   <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        <slot name="message">
                             Are you sure you want to delete ?
                        </slot>
                       
                    </h3>

                    <div class="w-full justify-between flex px-4">
                        <button  @click.prevent="confirm" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium
                        rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            <slot name="confirmBtn">Yes, I'm sure</slot>   
                        </button>
                        <button @click.prevent="cancel" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200
                        text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600
                        dark:focus:ring-gray-600">
                            <slot name="cancelBtn"> No, cancel</slot>
                        </button>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"ModalConfirm",
    data(){
        return {
            open: false
        }
    },

    methods:{
        closeModal(){

            this.open = false
            //this.$refs["default-modal"].classList.add('hidden')
        },

        openModal(){
            this.open = true
        },

        confirm(){
            this.$emit("cancel", true)
            this.closeModal()
        },

        cancel(){
            this.$emit("cancel", false)
            this.closeModal()
        }
    }
}
</script>

<style>

</style>