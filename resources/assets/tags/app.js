import {createApp} from 'vue'
import index from './components/index'
import store from "./store"
import mixins from "../mixins"

createApp({})
    .component('index', index)
    .use(store)
    .mixin(mixins)
    .mount('#app')
