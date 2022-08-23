<template>
  <!-- <div v-if="!isAuthenticated">
    
  </div> -->
  <div>
    Login view
  </div>
</template>
<script >

//import useStore from 'store'
import SplitBackground from './components/SplitBackground.vue'
import LoginForm from './components/LoginForm.vue'
import WelcomeLabel from './components/WelcomeLabel.vue'

export default {
  name: 'Login',
  components: {
    SplitBackground,
    LoginForm,
    WelcomeLabel,
  },

}
</script>
