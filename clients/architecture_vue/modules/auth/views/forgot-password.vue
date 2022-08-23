<template>
  <!-- <div v-if="!isAuthenticated">
  
  </div> -->
    <div>
      Forgot password view
    </div>
</template>
<script >

//import useStore from 'store'
import SplitBackground from './components/SplitBackground.vue'
import FortgotPasswordForm from './components/ForgotPasswordForm.vue'
import WelcomeLabel from './components/WelcomeLabel.vue'

export default {
  name: 'ForgotPassword',
  components: {
    SplitBackground,
    FortgotPasswordForm,
    WelcomeLabel,
  },

}
</script>
