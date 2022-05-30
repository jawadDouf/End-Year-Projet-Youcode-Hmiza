<template>
<div :class="index.nav">
 
 <img :class="index.img" src="../../assets/Group3.png" alt="">
 
 <div :class="index.ul">
 <ul>
    <li><router-link to="/" :class="index.links">Acceuil</router-link></li>
    <li><router-link to="/productsView" :class="index.links">Produits</router-link></li>
    <li><router-link to="/businessProfileView" :class="index.links">Profile</router-link></li>
    <li :class="index.links">About</li>
  </ul>  
 
 </div>
 
  <div :class="index.searchBox">
            <input :class="index.searchInput" type="text" name="" v-model="tosearch" placeholder="Search" id="input" @keyup="$store.dispatch('getProducts',tosearch)" >    
    <fa :icon="['fas','search']" :class="index.material_icons">
                    search
    </fa>           
    </div>
    <div :class="index.buttonAuth_container">
    <a href="" v-if="userId" :class="index.buttonAuth" @click="logout">Logout</a>
    <Button v-if="!userId" :class="index.buttonAuth">Login</Button>
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
    localStorage.removeItem('id')
     router.push({name: 'AuthView'})

}

</script>
<style>






</style>