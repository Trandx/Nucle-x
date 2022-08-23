<template #client-view>

    <div>
         <router-view/>
        <!-- <lookup v-if="!showModule || showModule=='default'"></lookup> -->

        <router-view name="MoreSetting" />
        

        
    </div>
</template>

<script>

//import ClientModule from '../components/Modules/Clients'

export default {
    name: "ClientView",
    components:{
       //ClientModule, 
    },

    data(){
        return {
           // path: null
        }
    }
}
</script>

<style>

</style>