import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap"
import "../src/assets/fonts/Montserrat/stylesheet.css"

import { createApp } from 'vue'
import { VueHeadMixin, createHead } from '@unhead/vue'

import App from './App.vue'
import router from './router'

const head = createHead()

createApp(App)
.use(router)
.use(head)
.mixin(VueHeadMixin)
.mount('#app');
