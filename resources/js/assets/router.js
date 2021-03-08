import {createWebHistory, createRouter} from 'vue-router';
import PostList from './../components/PostListComponent.vue'
import PostDetail from './../components/PostDetailComponent.vue'
import PostCategory from './../components/PostCategoryComponent.vue'


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
        }
    ]
})

export default router;