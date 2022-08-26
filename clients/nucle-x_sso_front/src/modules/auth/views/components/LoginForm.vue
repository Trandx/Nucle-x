<template>
  <div class="bg-gray-700 absolute top-0 left-0 bottom-0 right-0">

    

    <div class=" m-auto p-4 w-[450px] ">

      <alert-danger  ref="alert" v-show="alert.name == 'AlertDanger'">
        <template #alertMessage >
          {{alert.message}}
        </template>
      </alert-danger>

        
        <div class="w-full  rounded-lg shadow bg-gray-800 border border-white">
            
            <div class="py-6 px-6 lg:px-8">
              <div class="border-b border-gray-100">
                <h3 class="mb-1 text-4xl font-extrabold  text-white">Login</h3>
              </div>
                <form class="space-y-6 pt-4" @submit.prevent="login">
                    <div>
                      <div class="flex justify-start p-0 m-0">
                        <label for="email" class="block mb-2 text-sm font-medium w-1/2 text-white text-left">Your email</label>
                        <span :class="goodFormat&&'hidden'" class=" text-red-500 text-sm text-right block mt-1 w-1/2" > Email isn't on good format</span>
                      </div>

                      <!-- <input type="email" @blur="isGoodFormat" v-model="user.email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,10}$" id="email" class=" border  text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="name@company.com" required> -->
                      <input type="text"  v-model="user.login"   class=" border  text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" placeholder="email/phone/username" required>

                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-white">Your password</label>
                        <input type="password" v-model="user.password" id="password" placeholder="••••••••" class=" border  text-sm rounded-lg  block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white" required>
                    </div>
                    <div class="flex justify-between">
                        <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" v-model="user.remember" type="checkbox" value="" class="w-4 h-4  rounded border focus:ring-3 bg-gray-600 border-gray-500 focus:ring-primary ring-offset-gray-800" >
                            </div>
                            <label for="remember" class="ml-2 text-sm font-medium text-white">Remember me</label>
                        </div>
                        <a href="#" class="text-sm text-primary hover:underline ">Lost Password?</a>
                    </div>
                    <button type="submit" class="w-full text-white  focus:ring-4 focus:outline-none font-medium 
                      rounded-lg text-sm px-5 py-2.5 text-center bg-primary hover:bg-gray-600 focus:ring-gray-700">
                      Login 
                    </button>
                    <div class="text-sm font-medium text-gray-200 ">
                        Not registered? <a href="#" class=" hover:underline text-primary">Create account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div> 
</template>
<script >
import { mapActions } from 'vuex';

import formValidate from "../../../../mixins/forms";

import AlertDanger from "../../../../components/Alerts/danger.vue"

export default{
  name: "LoginForm",
  components: {
    AlertDanger
  },

  data(){
    return {
      user: {},
      goodFormat: true,

      alert: {
        name: null,
        message: null,
      }
    }
  },

  methods: {

    ...mapActions({
        "addLoggedUserInStore": "Auth/loginUserInStore",
    }),

    login(){

      const datas = this.addLoggedUserInStore(this.user)

     datas.then((datas) => {
     
      if(datas != undefined && (datas.status || datas.code >= 300)){
        this.alert.message = datas.message
        this.alert.name = "AlertDanger"
        this.$refs.alert.open = true;
        this.$refs.alert.showBtnClose = false 

        setTimeout(()=>{
          if(this.$refs.alert.open){
            this.$refs.alert.open = false;
          }
        
        }, 10000)
          
      }
      

    })

    
      
    },

    isGoodFormat(e){
      const val = e.target.value
      const pattern = e.target.getAttribute('pattern')
      
      this.goodFormat = formValidate.formatVerify(pattern, val)
    }
  },

  created(){
    // this.alert.name = "AlertSuccess"
    // this.alert.message = "test"
  },

  mixins: [formValidate]
 
}
</script>
