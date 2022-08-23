<template>
  <div>
    <Header></Header>
    <Main></Main>
    <Footer></Footer>
  </div>
</template>


<script>
//import HelloWorld from './components/HelloWorld.vue'

import Header from '../components/Header'
import Main from '../components/Main'
import Footer from '../components/Footer'

export default {
  name: 'MainView',
  components: {
    Header,
    Main,
    Footer
  }
}
</script>

<style scoped>

</style>