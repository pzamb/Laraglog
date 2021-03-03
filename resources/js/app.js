/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



import { createApp } from 'vue'
import PostListComponent from './components/PostListComponent.vue'
import PostModal from './components/PostModalComponent.vue'


const App = {
    components:{
        PostListComponent,PostModal
    }
}

createApp(App).mount('#app')