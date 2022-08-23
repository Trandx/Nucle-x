<template>
  
    <div class="flex flex-row">
        <side-bar />
        <div class="w-full ml-48 my-16 mx-1 p-4 ">
            <!-- <client-view></client-view> -->
            <router-view ></router-view>
        </div>
    </div>
  
</template>

<script>
//import ClientView from '../../views/client.view.vue'

import SideBar from "../Bars/SideBar"

export default {
     name: 'Main',
     components: {
        SideBar,
        //ClientView,
    },

    data(){
        return {
            slotName: "client",
        }
    },

    methods: {
        
    }

}
</script>

<style>

</style>