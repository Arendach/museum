import {createApp} from 'vue'
import app from './components/app.vue'

export const eventBus = createApp(app)

createApp(app).mount('#app')
