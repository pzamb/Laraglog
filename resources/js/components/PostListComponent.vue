<template>
    <div>
        <router-link to="/example">ComponenteEx</router-link>
        <div class="card mt-4" v-for="post in posts" :key="post.title">
            <img :src="'/images/' + post.image" class="card-img-top" >
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>
                <button class="btn btn-primary"  @click="postClick(post)">Ver POST</button>
            </div>
        </div>
        <post-modal @closeModalPost="closeModalPost" :post="postSelected"></post-modal>
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
            posts:
            [{
                    title: 'Título 1',
                    image:'1614272168.jpg',
                    content:'Contendio post múmero tal'
                },
                {
                    title: 'Título 2',
                    image:'1614272168.jpg',
                    content:'Contendio post múmero tal'
                },
                {
                    title: 'Título 3',
                    image:'1614272168.jpg',
                    content:'Contendio post múmero tal'
                },
                {
                    title: 'Título 4',
                    image:'1614272168.jpg',
                    content:'Contendio post múmero tal'
            }]
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