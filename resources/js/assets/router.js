import {createWebHistory, createRouter} from 'vue-router';
import PostList from './../components/PostListComponent.vue'
import Example from './../components/ExampleComponent.vue'

const history = createWebHistory();
const router = createRouter({
    history,
    routes:[
        {
            path: '/',
            name:'PostList',
            component: PostList
        },
        {
            path: '/example',
            name:'example',
            component: Example
        }       
    ]
})

export default router;