<template>
    <div class="row">
        <div class="col-md-4"  v-for="category in categories" :key="category.id">
            <div class="card mt-3">
                <router-link class="btn btn-success" :to="{name: 'post-category', params: {category_id: category.id}}">
                    <img src="/images/1614447772.jpg" class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">{{category.title}}</h5>
                        <p class="card-text">{{category.content}}</p>
                        <button class="btn btn-primary mr-2"  @click="postClick(post)">Ver POST</button>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>

export default {
    name:'PostList',
    props:['posts'],
    components:{},
    data(){
        return{
            categories : ""
        }
    },
    methods:{
        getCategories(){
            fetch('/api/category/all/')
            .then(response => response.json())
            .then(json => this.categories = json.data)
        }
    },
    created(){
        this.getCategories();
    }
}
</script>
<style scoped>

</style>