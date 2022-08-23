<template>
    
<aside class="fixed overflow-x-hidden w-[200px] h-full my-12" aria-label="Sidebar">
   <div class="overflow-y-auto h-full overflow-x-hidden py-4 bg-gray-50 dark:bg-gray-900">
      <ul class="space-y-2">
         
         <!-- <li>
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
                        </li>
                        <li>
                           <a href="#" class="flex items-center p-2 pl-11 w-full text-base font-normal text-gray-900 
                              hover:border-l-8 hover:border-gray-200 transition duration-150 group hover:bg-gray-100 dark:text-white 
                              dark:hover:bg-gray-700">Client 3</a>
                        </li>
                  </ul>
            </router-link>
         </li> -->

         
         <li v-for="(tab, key) in menus.tabs"  :key="key" :class="menus.currentTab === tab&&menus.active" :ref="tab">
            <router-link :to="{name: tab }"  @click="menus.currentTab = tab" > 
               <div class="  flex items-center p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 
               dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <i :class="menus.fa[key]" class=" flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150
                  dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"></i>
                  <span class="ml-3"> {{ tab }}</span>
               </div>
            </router-link>
         </li>

         <!-- <li class="pt-4 mt-4 space-y-2  border-t border-gray-200 dark:border-gray-700" >
            <router-link :to="{name: 'SignOut'}" @click="changeActiveMenu" > 
               <div class="flex items-center  p-2 px-4 text-base font-normal text-gray-900 hover:border-l-8 hover:border-gray-200 dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
                  <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-150 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
                  <span class="ml-3 ">Sign Out</span>
               </div>
            </router-link>
         </li> -->
      </ul>
   </div>
</aside>

</template>

<script>

//import changeActiveMenu from  '../../../mixins/activeMenu'

 export default {
     name: 'SideBar',

     data(){
      return {
         activeCss:{
            class : "isActive",
            value: ["isActive", "border-primary", "border-l-8", "translate-x-3", "bg-gray-800"],
            default: [],
         },

         menus: {
            currentTab: 'Client',

            tabs: ["Clients", "Groups", "Roles", "Permisions", "Users", "Logout"],
            fa: [
               "fas fa-network-wired", 
               "fa-solid fa-users-gear", 
               "fa-solid fa-users-viewfinder", 
               "fas fa-person-booth",
               "fa-solid fa-users",
               "fa-solid fa-right-from-bracket"
               ],

            active: "isActive border-primary border-l-8 translate-x-3 bg-gray-800",
            border: ["pt-1", "mt-0", "space-y-2", "border-t", "border-gray-200", "dark:border-gray-700"]
         }
         

      }
      
     },
     methods: {
         catchPath(to = null){

           this.menus.currentTab = to ? to.name:this.$route.name

           this.menus.currentTab;
            // const path = this.$route.path.split('/', 2)
      
            // this.menus.currentTab = path[1].charAt(0).toUpperCase() + path[1].slice(1);
         }
     },
     watch:{
         $route (to){
            this.catchPath(to)
           // console.log(this.$route.name, to, from);
         }
      }, 

     mounted(){
        
         this. catchPath()
         this.$refs["Logout"][0].classList.add(...this.menus.border);
     },
     // mixins: [changeActiveMenu]
     
  }
</script>

<style>

</style>