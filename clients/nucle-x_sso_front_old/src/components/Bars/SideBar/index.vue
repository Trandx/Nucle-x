<template>
    
<aside class="fixed overflow-x-hidden w-48 my-16" aria-label="Sidebar">
   <div class="overflow-y-auto py-4 bg-gray-50 dark:bg-gray-900">
      <ul class="space-y-2">
         
         <li>
            <router-link :to="{name: 'Lookup'}" @click="changeActiveMenu" > 
               <div ref="clients"  class=" default flex items-center p-2 px-4 w-full text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                     <i class="fas fa-network-wired w-6 h-6 text-gray-500 transition duration-150 dark:text-gray-400 
                     group-hover:text-gray-900 dark:group-hover:text-white"></i> 
                     <span class="flex-1 ml-3 text-left whitespace-nowrap" sidebar-toggle-item>Clients</span>
                     <i class="fa-solid fa-chevron-down"></i>
               </div>
                  <ul id="dropdown-example" class="hiddens py-2 space-y-2">
                        <li>
                           <router-link :to="{name: 'Lookup'}" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 
                              hover:border-l-8 hover:border-gray-200 transition duration-150 group hover:bg-gray-100 dark:text-white 
                              dark:hover:bg-gray-700">Client 1</router-link>
                        </li>
                        <li>
                           <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 
                              hover:border-l-8 hover:border-gray-200 transition duration-150 group hover:bg-gray-100 dark:text-white 
                              dark:hover:bg-gray-700">Client 2</a>
                           <!-- <router-link :to="{name: 'Groups'}"  class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 
                              hover:border-l-8 hover:border-gray-200 transition duration-150 group hover:bg-gray-100 dark:text-white 
                              dark:hover:bg-gray-700">Client 2</router-link> -->
                        </li>
                        <li>
                           <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 
                              hover:border-l-8 hover:border-gray-200 transition duration-150 group hover:bg-gray-100 dark:text-white 
                              dark:hover:bg-gray-700">Client 3</a>
                        </li>
                  </ul>
            </router-link>
         </li>

         
         <li >
            <router-link :to="{name: 'Groups'}"  @click="changeActiveMenu" > 
               <div ref="groups" class="  flex items-center p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 
               dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <i class="fa-solid fa-users-gear flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150
                  dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                  <span class="ml-3">Groups</span>
               </div>
            </router-link>
         </li>
          <li>
            <router-link :to="{name: 'Roles'}" @click="changeActiveMenu" > 
               <div ref="roles" class="flex items-center p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <i class="fa-solid fa-users-viewfinder flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150
                  dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                  <span class="ml-3">Roles</span>
               </div>
            </router-link>
         </li>
         <li >
            <router-link :to="{name: 'Permissions'}" @click="changeActiveMenu" > 
               <div ref="permissions" class=" flex items-center p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <i class="fas fa-person-booth flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150
                  dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                  <span class="ml-3">Permissons</span>
               </div>
            </router-link>
         </li>
         <li >
            <router-link :to="{name: 'Users'}" @click="changeActiveMenu" > 
               <div ref="users" class=" flex items-center p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
                  <span class="ml-3">Users</span>
               </div>
            </router-link>
         </li>
         <li class="pt-4 mt-4 space-y-2  border-t border-gray-200 dark:border-gray-700" >
            <router-link :to="{name: 'SignOut'}" @click="changeActiveMenu" > 
               <div class="flex items-center  p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                  <span class="ml-3 ">Sign Out</span>
               </div>
            </router-link>
         </li>
      </ul>
   </div>
</aside>

</template>

<script>

import changeActiveMenu from  '../../../mixins/activeMenu'

 export default {
     name: 'SideBar',

     data(){
      return {
         activeCss:{
            class : "isActive",
            value: ["isActive", "border-primary", "border-l-8", "translate-x-3", "bg-gray-800"],
            default: []
         } 
      }
      
     },

     mounted(){

      const path = this.$route.path.split('/', 2)

      this.$refs[path[1]].classList.add(...this.activeCss.value)

     },

     methods: {
      // selectDefault(){
         
      //    return this.activeCss.value
      // },
   
      // emitMenuSelected(event){
      //    let menuName = event.currentTarget.getAttribute('name');

      //    this.$emit('menu-selected', {"name": menuName})
      // }
     },

      mixins: [changeActiveMenu]
     
  }
</script>

<style>

</style>