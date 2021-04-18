<template>
    <div class="col-8 offset-2">
        <div class="card">
            <div class="card-header">
                <h3 class="font-weight-bold mt-2">Contáctame</h3>
            </div>
            <div class="card-body">
                <form @submit.prevent="onSubmit">
                    <base-input :validator="v$.form.name" label="Nombre" v-model="v$.form.name.$model"></base-input>
                    <base-input :validator="v$.form.surname" label="Apellido" v-model="v$.form.surname.$model"></base-input>
                    <base-input :validator="v$.form.email" label="Email" type="text" v-model="v$.form.email.$model"></base-input>
                    <base-input :validator="v$.form.phone" label="Teléfono" mask="(+34) ###-###-###" v-model="v$.form.phone.$model"></base-input>
                    <div class="form-group">
                        <textarea v-model="v$.form.content.$model" class="form-control" :class="{'is-invalid':v$.form.content.$error, 'is-valid':!v$.form.content.$invalid }" rows="3"></textarea>
                    </div>
                    <el-button type="danger" @click="resetForm" icon="el-icon-refresh-left"></el-button>
                    <el-button native-type="submit" type="info" :disabled="formValid" class="ml-2" icon="el-icon-message">ENVIAR</el-button>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
import useValidate from '@vuelidate/core'
import {required, email,minLength} from "@vuelidate/validators"
import BaseInput from './BaseInput'
export default {
    components:{BaseInput},
    validations(){
        return{
            form:{
                name:{required},
                surname : {required},
                email : {required,email},
                phone: {
                        required,
                        minLength: minLength(17)
                    },
                content: {required}
            }
        }
    },
    data(){
        return{
            v$ : useValidate(),
            form:{
                name :'',
                surname : '',
                email : '',
                phone: '',
                content: ''
            },
        }
    },
    methods:{
        onSubmit(){
            if(!this.formValid)
            {
                axios.post('/api/contact',{
                    name : this.v$.form.name.$model,
                    surname : this.v$.form.surname.$model,
                    email : this.v$.form.email.$model,
                    phone : this.v$.form.phone.$model,
                    message : this.v$.form.content.$model
                }).then(function(response){
                    console.log(response.data)
                })

                this.resetForm()
                this.created()
            }
        },
        resetForm(){
            this.v$.form.name.$model = ""
            this.v$.form.surname.$model = ""
            this.v$.form.email.$model = ""
            this.v$.form.phone.$model = ""
            this.v$.form.content.$model = ""
            this.v$.$reset()
            this.reseted()
        },
        created() {
            this.$notify({
                title: 'Éxito',
                message: 'Contacto Creado Correctamente',
                type: 'success'
            });
        },
        reseted(){
            this.$notify({
                title: 'Éxito',
                message: 'Los campos han sido limpiados',
                type: 'info'
            });
        }
    },
    computed : {
        formValid(){
            return this.v$.$invalid
        }
    }
}
</script>
