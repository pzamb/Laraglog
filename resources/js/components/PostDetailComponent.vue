<template>
    <div>
        <div v-if="post">
            <div class="card mt-4">
                <img :src="'/images/'+post.image.image" class="card-img-top" >
                <div class="card-body">
                    <h5 class="card-title">{{post.title}}</h5>
                    <p class="card-text">{{post.content}}</p>
                    <router-link class="btn btn-success" :to="{ name:'post-category', params:{category_id: post.category.id}}">{{post.category.title}}</router-link>
                </div>
            </div>
        </div>
        <div v-else>
            <h1>Post no existe</h1>
        </div>
    </div>
</template>
<script>
import PostModal from './../components/PostModalComponent.vue'
export default {
    name:'PostList',
    components:{PostModal},
     data(){
        return{
            postSelected:'',
            post:''
        }
    },
    methods:{
        getPost(){
            fetch('/api/post/'+this.$route.params.id).then(response => response.json())
            .then(json => this.post = json.data)
        },
         closeModalPost: function() {
            this.postSelected = "";
        }
    },
    created(){
        this.getPost();
    }
}
</script>
<style scoped>

</style>