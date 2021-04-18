<template>
    <div class="col-8 offset-2" >
        <div class="card mt-4">
            <div class="card-header">
                <img src="/images/raven.png" id="logo" class="mx-auto d-block">
            </div>
            <div class="card-body">

                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Nombre</span>
                    </div>
                    <input type="text" class="form-control" v-model="name">
                </div>

                <div class="input-group mt-3" >
                    <div class="input-group-prepend">
                        <span class="input-group-text">Apellido</span>
                    </div>
                    <input type="text" class="form-control" v-model="surname">
                </div>

                <div class="input-group mt-3" >
                    <div class="input-group-prepend">
                        <span class="input-group-text">Email</span>
                    </div>
                    <input type="text" class="form-control" v-model="email">
                </div>

                <div class="input-group mt-3" >
                    <div class="input-group-prepend">
                        <span class="input-group-text">Content</span>
                    </div>
                    <textarea class="form-control" name="" id="" cols="30" rows="10" v-model="content"></textarea>                
                </div>

                <button @click="saveContact()" class="btn btn-primary mt-4 btn-lg mx-auto d-block">Enviar</button>

            </div>
        </div>
    </div>
</template>

<script>
export default {
    data(){
        return{
            name:'',
            surname: '',
            email: '',
            content: ''
        }
    },
    methods:{
        saveContact(){
            console.log(this.name)
            console.log(this.surname)
            console.log(this.email)
            console.log(this.content)
        }
    },
    created(){

    }
    
}
</script>

<style scoped>
img{
    width: 200px;
    height: 200px;
}
</style>