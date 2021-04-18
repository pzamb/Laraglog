<template>
    <div>
        <h1>{{category.title}}</h1>
        <post-list-default :posts="posts"></post-list-default>
    </div>
</template>
<script>
import PostListDefault from './../components/PostListDefaultComponent.vue'
export default {
    name:'PostList',
    components:{PostListDefault},
    data(){
        return{
            postSelected:'',
            posts:[],
            category:''
        }
    },
    methods:{
        getPosts(){
            fetch("/api/post/"+this.$route.params.category_id+"/category")
            .then(response => response.json())
            .then(json => {
                this.posts = json.data.posts.data
                this.category = json.data.category
            });
        }
    },
    created(){
        this.getPosts();
    }
}
</script>
<style scoped>

</style>