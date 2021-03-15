import {createWebHistory, createRouter} from 'vue-router';
import PostList from './../components/PostListComponent.vue'
import PostDetail from './../components/PostDetailComponent.vue'
import PostCategory from './../components/PostCategoryComponent.vue'

import CategoryList from './../components/CategoryListDefaultComponent.vue'

import Contact from './../components/ContactComponent.vue'



const history = createWebHistory();
const router = createRouter({
    history,
    routes:[
        {
            path: '/',
            component: PostList, 
            name: 'list'
        },
        {
            path: '/detail/:id',
            name:'detail',
            component: PostDetail, 
            props:true
        },
        {
            path: '/post-category/:category_id',
            name:'post-category',
            component: PostCategory, 
            props:true
        },
        {
            path: '/contact',
            name:'contact',
            component: Contact,
        },
        {
            path: '/categories',
            name:'list-category',
            component: CategoryList,
        }
    ]
})

export default router;