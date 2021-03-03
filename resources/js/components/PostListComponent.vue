<template>
    <div>
        <div class="card mt-4" v-for="post in posts" :key="post.title">
            <img :src="'/images/' + post.image" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{post.title}}</h5>
                <p class="card-text">{{post.content}}</p>
                <a href="#" class="btn btn-primary"  @click="postClick(post)">Ver POST</a>
            </div>
        </div>
        <post-modal :post="postSelected"></post-modal>
    </div>
</template>
<script>
import PostModal from './../components/PostModalComponent.vue'
export default {
    name:'PostList',
    components:{PostModal},
    methods:{
        postClick(post){
            this.postSelected=post; 
        }
    },
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
    }
}
</script>
<style scoped>

</style>