<template>
  <div ref="default-modal" tabindex="-1" :class="!open?'hidden':false" class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 md:h-full justify-center items-center flex" >
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button @click.prevent="closeModal" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                    <i class="fa-solid fa-x"></i>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="py-6 px-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-gray-900 dark:text-white text-left capitalize ">
                        <slot name="modalTitle" ></slot>
                        
                    </h3>
                    <slot name="modalBody"></slot>
                    <slot name="modalFooter"></slot>
                </div>
            </div>
        </div>
    </div> 
</template>

<script>
export default {
    name: "Modal",
    data(){
        return {
            open: true
        }
    },
    // props: {
    //     modalOpen:{
    //         type: Boolean
    //     }
    // },

    // watch: { 
    //     modalOpen: {
    //         handler(newValue) {
    //             this.open = newValue
    //         },
    //        // deep: true
    //      },
    // },

    methods:{
        closeModal(){

            this.open = false
            //this.$refs["default-modal"].classList.add('hidden')
        },

        openModal(){
            this.open = true
        }
    }
}
</script>

<style>

</style>