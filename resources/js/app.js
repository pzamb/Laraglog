require('./bootstrap');
import  {createApp}  from "vue"
import router from './assets/router.js'
import PostModal from './components/PostModalComponent.vue'

//paquetes
import ElementPlus from 'element-plus';
import 'element-plus/lib/theme-chalk/index.css';

const app = createApp({
    components:{PostModal}
})
app.use(router)
app.use(ElementPlus)
app.mount('#app')