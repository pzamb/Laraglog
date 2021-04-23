<template>
    <div class="form-group">
        <label>{{label}}</label>
        <input v-if="mask"
        :type="type" 
        class="form-control"
        :value="modelValue"
        :class="{'is-invalid':validator.$error, 'is-valid':!validator.$invalid }"
        v-maska="mask"
        @input="$emit('update:modelValue', $event.target.value)"
        >

        <input v-else
        :type="type" 
        class="form-control"
        :value="modelValue"
        :class="{'is-invalid':validator.$error, 'is-valid':!validator.$invalid  }"
        @input="$emit('update:modelValue', $event.target.value)"
        >
        
    </div>
</template>
<script>
import { maska } from 'maska'

export default {
    directives: { maska },
    props: {
        label:{
            type:String,
            required : false 
        },
        type:{
            type:String,
            default: 'text',
            validator(value){
                return ['text','email','password'].includes(value)
            }
        },
        mask:{
            type:String,
            required: false
        },
        modelValue:{
            type:String,
            required : true
        },
        validator:{
            type: Object,
            required: true
        }
    },
    emits: ['update:modelValue']
}
</script>