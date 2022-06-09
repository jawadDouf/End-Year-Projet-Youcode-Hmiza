<template>
<div :class="index.nav">
 
 <img :class="index.img" src="../../assets/Group3.png" alt="">
 
 <div :class="index.ul">
    <p><router-link to="/" :class="index.links">Acceuil</router-link></p>
    <p><router-link to="/productsView" :class="index.links">Produits</router-link></p>
    <p><router-link to="/businessProfileView" :class="index.links">Profile</router-link></p>
    <p :class="index.links">About</p>
 </div>
 <div :class="index.searchBox">
    <input :class="index.searchInput" type="text" name="" v-model="tosearch" placeholder="Search" id="input" @keyup="$store.dispatch('getProducts',tosearch)" >    
    <fa :icon="['fas','search']" :class="index.material_icons">search</fa>           
  </div>
  <div :class="index.buttonAuth_container">
    <button  v-if="$store.state.navSwitcher" :class="index.buttonAuth" @click="logout">Logout</button>
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
onMounted(
    ()=>{
    
    }
)
function logout(){
    localStorage.removeItem('id');
    store.state.navSwitcher = undefined;

     router.push({name: 'AuthView'})

}

</script>
<style>






</style>