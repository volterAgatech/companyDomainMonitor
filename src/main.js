import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import "../src/assets/fonts/Montserrat/stylesheet.css"

import { createApp } from 'vue'
import { VueHeadMixin, createHead } from '@unhead/vue'

import App from './App.vue'
import router from './router'
import axios from 'axios'
import VueAxios from 'vue-axios'
const head = createHead()

createApp(App)
.use(router)
.use(head)
.mixin(VueHeadMixin)
.use(VueAxios, axios)
.mount('#app');
