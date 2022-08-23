<template>
  <!-- <div v-if="!isAuthenticated">
    
  </div> -->
  <div>
    <login-form />
  </div>
</template>
<script >

//import useStore from 'store'

import LoginForm from './components/LoginForm.vue'

export default {
  name: 'Login',
  components: {
    LoginForm,
  },

}
</script>
