/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');



import { createApp } from 'vue' 

createApp({
    data(){
        return{
            message: "Hello Vue!",
            posts:['Título 1','Título 2','Título 3','Título 4','Título 5'],
            nombre:"PEDRO"
        }
    }
}).mount('#app')
