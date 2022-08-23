<template>
<!-- <div>
 <div class="bg-primary">
    <router-link to="/" >Home</router-link> |
    <router-link to="/about" >About</router-link>
  </div>
 
   
    
  
</div> -->
<router-view/>
</template>

<script>

import custom from './assets/js/custom'

  export default {
    name: 'App',
    componet: {

    },
    data (){
     // console.log(this.$i18n.t("views.about.title"))
      return {
        
      }
    },

    mounted() {
      custom.modal() // gestion des modals
      custom.default()
    }
  }
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /*text-align: center;*/
  color: #2c3e50;
}

#nav {
  padding: 30px;
}

#nav a {
  font-weight: bold;
  color: #2c3e50;
}

#nav a.router-link-exact-active {
  color: #42b983;
}
</style>
