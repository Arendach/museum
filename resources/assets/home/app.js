import {createApp} from 'vue'
import app from './components/app.vue'

export const eventBus = createApp(app)

const application = createApp({})

application
    .component('app', app)
    .mount('#app')
