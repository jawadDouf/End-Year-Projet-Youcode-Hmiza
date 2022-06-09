<template>
 <!-- <div :class="index.nav">
 <img :class="index.img" src="../assets/Group3.png" alt="">
 <ul :class="index.ul">
    <li>Acceuil</li>
    <li>Produits</li>
    <li>Profile</li>
    <li>About</li>
  </ul>   -->
    <!-- <li><button :class="index.button">   
    Register
    </button></li> -->
   
           <!-- <div :class="index.searchBox">

            <input :class="index.searchInput" type="text" name="" placeholder="Search" v-model="variable"> -->
            
            <!-- <button :class="index.searchButton" href="#"> -->
                <!-- <fa :icon="['fas','search']" :class="index.material_icons">
                    search
                </fa> -->
            <!-- </button> -->
        <!-- </div>
 </div> -->

 <div :class="index.filter">
 <div :class="index.categories">
 <button @click="shower1 = !shower1" :class="index.filterButton">Filter <span>
 <fa :icon="['fas','filter']" :class="index.filterIcon"/>
 </span></button>
 <div v-if="shower1" :class="index.list">
 <button v-for="el in filter.typeofElement" :class="index.filterSecondaryButton1"  @click="filter2(el)">{{ el }}</button>
 </div>
 </div>
 
 <div :class="index.categories">
  <button :class="index.filterSecondaryButton" @click="shower2=!shower2" id="filter2">Categorie<span>
 <fa :icon="['fas','caret-down']" :class="index.filterSecondaryIcon"/>
 </span></button>
  <div v-if="shower2" :class="index.list">
    <button v-for="el in filter[tofilterwith]"  :class="index.filterSecondaryButton1"  @click="filter3(el)">{{ el }}</button>
 </div>
 
 </div>


<div :class="index.categories">
<button :class="index.filterSecondaryButton" @click="shower3=!shower3" id="filter3">Sub-Categorie<span>
 <fa :icon="['fas','caret-down']" :class="index.filterSecondaryIcon"/>
 </span></button>
 <div v-if="shower3" :class="index.list">
    <button v-for="el in filter[tofilterwith]"  @click="filter3(el)" :class="index.filterSecondaryButton1">{{ el }}</button>
 </div>

</div>
 
 </div>
 <section  :class="index.products"> 
 
 <Product v-if="tofilterwith === undefined" v-for="p in $store.state.products" :oneProduct="p"/>
 <Product v-for="p in $store.state.products.filter(pro => pro.produit_categorie === tofilterwith || pro.produit_souscategorie === tofilterwith || pro.produit_souscategorie2 === tofilterwith)"  :oneProduct="p"/>

 
 
 </section>
  
  
</template>

<script setup>
import index from "../modulescss/products/index.scss"
import {useStore} from "vuex"
import { ref } from "vue";
import axios from 'axios';
import { onMounted } from "vue";
import Product from "../components/products/product.vue";
var variable = ref(undefined)
var shower1 = ref(false)
var shower2 = ref(false)
var shower3 = ref(false)
var tofilterwith = ref(undefined)
var filter = {
    "typeofElement" : [
      "Service",
      "Product"
    ],
    "Service" :[
      "Medcine",
      "Coiffure"
    ],
    "Product" : [
      "Technologie",
      "Food",
      "Clothes"
    ],
    "Technologie" : [
      "Phone",
      "Tablet",
      "Smart Watch",
      "Speaker"
    ],

}

const store = useStore()
onMounted(
  () => {
         store.dispatch('getProducts');
         
})

function filter2(el){
  shower1.value = !shower1.value
  document.getElementById("filter2").innerHTML = el
  tofilterwith.value = el
  console.log(filter[tofilterwith])
}
function filter3(el){
  shower2.value = !shower2.value
  document.getElementById("filter3").innerHTML = el
  tofilterwith.value = el
}
// var searchIcon = document.getElementsByClassName("search-box__icon")[0];


// searchIcon.addEventListener("click", activateSearch);






  
</script>
<style lang="scss">


</style>