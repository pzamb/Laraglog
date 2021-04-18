<template>
    <div>
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
            posts:[]
        }
    },
    methods:{
        getPosts(){
            fetch('/api/post').then(response => response.json())
            .then(json => this.posts = json.data.data)
        }
    },
    created(){
        this.getPosts();
    }
}
</script>
<style scoped>

</style>