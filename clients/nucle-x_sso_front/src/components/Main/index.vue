<template>
   <div class="flex flex-row">
        <side-bar />
        <div class="w-full ml-48 my-10 mr-0 p-4 ">
            <!-- <client-view></client-view> -->
            <router-view ></router-view>
        </div>
    </div>
</template>

<script>


import SideBar from "../Bars/SideBar"

export default {
     name: 'Main',
     components: {
        SideBar,
        //ClientView,
    },
}
</script>
