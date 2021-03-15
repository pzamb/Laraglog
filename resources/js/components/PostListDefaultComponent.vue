<template>
    <div>
        <div class="card mt-4 mb-5" v-for="post in posts" :key="post.title">
            <img :src="'/images/' + post.imagen" class="card-img-top" >
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>
                <button class="btn btn-primary mr-2"  @click="postClick(post)">Ver POST</button>
                <router-link  class="btn btn-success" :to="{ name:'detail', params:{id: post.id}}">VER</router-link>
            </div>
        </div>
        <post-modal @closeModalPost="closeModalPost" :post="postSelected"></post-modal>
        
    </div>
</template>
<script>

import PostModal from './../components/PostModalComponent.vue'

export default {
    name:'PostList',
    props:['posts'],
    components:{PostModal},
    data(){
        return{
            postSelected:''
        }
    },
    methods:{
        postClick(post){
            this.postSelected=post;
        },
         closeModalPost: function() {
            this.postSelected = "";
        }
    }
}
</script>
<style scoped>

</style>