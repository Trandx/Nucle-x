import { createApp } from 'vue'
import App from './App.vue'

// router module
import router from './router';

// store module
import store from './store';

// import fontawesome
import '@fortawesome/fontawesome-free/css/all.css'

//import '@fortawesome/fontawesome-free/js/all.js'

// import tailwind css
import './assets/css/tailwind.css'


// import vueform css

import '@vueform/multiselect/themes/default.css';

import './assets/css/formCss.css'

//import './assets/tailwind.css'

createApp(App).use(store).use(store).use(router).mount('#app')
