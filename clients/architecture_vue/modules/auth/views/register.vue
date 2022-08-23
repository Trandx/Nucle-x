<template>
  <!-- <div v-if="!isAuthenticated">
    
  </div> -->
  <div>
    Register view
  </div>
</template>
<script >

//import useStore from 'store'
import RegisterForm from './components/RegisterForm.vue'
import SplitBackground from './components/SplitBackground.vue'
import WelcomeLabel from './components/WelcomeLabel.vue'

export default {
  components: {
    RegisterForm,
    SplitBackground,
    WelcomeLabel,
  },

}
</script>
