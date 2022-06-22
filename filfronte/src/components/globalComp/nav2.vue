<template>
<div :class="index.nav">
 
 <img :class="index.img" src="../../assets/Group3.png" alt="">
 
 <div :class="index.ul">
    <p><router-link to="/" :class="index.links">Home</router-link></p>
    <p><router-link to="/productsView" :class="index.links">Products</router-link></p>
    <p><router-link to="/businessesView" :class="index.links">Businesses</router-link></p>
    <p @click="goToProfile()">Profile</p>
    <p :class="index.links">About</p>
 </div>
 
  <div :class="index.buttonAuth_container">
  
    <button v-if="$store.state.navSwitcher" :class="index.buttonAuth" @click="logout">Logout</button>
    <Button v-if="!$store.state.navSwitcher" :class="index.buttonAuth"><router-link to="/AuthView" :class="index.links2">Login</router-link></Button>
  </div> 
  <div :class="index.burgerKing">
    <div :class="index.line"></div>
    <div  :class="index.line"></div>
    <div :class="index.line"></div>
  </div> 
 </div>









</template>
<script setup>
import { computed } from "@vue/reactivity";
import index from "../../modulescss/products/index.scss"
import {useStore} from "vuex"
import { onMounted, ref } from "vue";
import { metaProperty } from "@babel/types";
import { useRouter, useRoute } from 'vue-router'
const route = useRoute()
const router = useRouter()

const store = useStore()
var tosearch = ref("d")
var userId = localStorage.getItem('id')
let actor = ref(localStorage.getItem('user'))
onMounted(
    ()=>{
    
    }
)
function logout(){
    localStorage.removeItem('id');
    localStorage.removeItem('user');
    store.state.navSwitcher = undefined;
    router.push({name: 'AuthView'})

}
function goToProfile(){
if(!localStorage.getItem('id')){
router.push({ name: 'AuthView' })
}else{
localStorage.removeItem("externLink")
router.push({ name: 'profileView' })  
}

}
</script>
<style>






</style>