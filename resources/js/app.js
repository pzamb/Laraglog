require('./bootstrap');
import  {createApp}  from "vue"
import router from './assets/router.js'
import PostModal from './components/PostModalComponent.vue'

createApp({
    components:{PostModal}
}).use(router).mount('#app')