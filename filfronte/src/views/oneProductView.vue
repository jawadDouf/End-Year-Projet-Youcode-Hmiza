<template>
  

  <div :class="one.cantainer">
  <div :class="one.container_img"> 
  <img :class="one.img"  :src="product[0]?.produit_img2" alt="mainImage" >
  </div>
  <div :class="one.container_infos"> 
  <p :class="one.p1">In publishing and graphic design and graphic design</p>
  <h2 :class="one.h2">{{ mainProduct.produit_nom }}</h2>
  <p :class="one.p">{{ mainProduct.produit_description }}</p>
  <div :class="one.spans">
  <span :class="one.span1">{{mainProduct.produit_categorie}}</span>
  <span :class="one.span2">{{mainProduct.produit_souscategorie}}</span>
  <span :class="one.span3">{{mainProduct.produit_souscategorie2}}</span>
  </div>
  
  <h3 :class="one.h3"><span :class="one.spans2">Rating Range :</span>{{ bottomProduct?.produit_note }}/10 => {{ topProduct?.produit_note}}/10</h3>
  
  <h3 :class="one.h3"><span :class="one.spans2">Price Review :</span>{{ cheapestProduct?.produit_prix }}$ => {{ expensiveProduct?.produit_prix}}$</h3>
 
  </div> 
 </div>
  <div>
  <profileHeader :headerElements=headerElements />
  <block :product="product" v-if="$store.state.blockPage == 1"/>
  <block  v-if="$store.state.blockPage == 2" :mainProduct="mainProduct"/>
  </div>
  
   
  

</template>
<script setup>
import { ref } from "vue";
import block from "../components/blocks/parentBlock.vue"
import index from "../modulescss/products/index.scss"
import profileHeader from "../components/blocks/profileHeader";
import one from "../modulescss/blocks/oneProduct.scss"
import two from "../modulescss/products/product.scss"
import axios from 'axios';
import { useRouter, useRoute } from 'vue-router'
import {useStore} from "vuex"
  

import { onMounted } from "vue";
var headerElements = ["Local Stores","Professional Stores"]
const route = useRoute()
const store = useStore()
let id = route.params.id
var product = ref([])
let mainProduct = ref("")
var topProduct = ref(undefined)
var expensiveProduct = ref(undefined)
var bottomProduct = ref(undefined)
var cheapestProduct = ref(undefined)
let stableElement = ref(undefined)
var min = ref(0)
var max = ref(11)
var exp = ref(10000000000000)
var cheap = ref(0)
let produitName = ref("")
onMounted(
  async ()=>{
       await axios
        .get('http://localhost/filrouge/Produit_BusinessApi/getproduitsbusiness/' + id)
        .then(response => ( response.data.produits.forEach(element => {     
          if(response.data.length == 1){
            stableElement.value = element
          }else{
           if(element.produit_note > min.value){
            console.log("im in")
            min.value = element.produit_note
            topProduct.value = element
          }
          if(element.produit_note < max.value){
            console.log(max.value)
            max.value = element.produit_note
            bottomProduct.value = element
          }
          if(element.produit_prix > cheap.value){
            cheap.value = element.produit_cheap
            cheapestProduct.value = element
          }
          if(element.produit_prix < exp.value){
            exp.value = element.produit_prix
            expensiveProduct.value = element
          } 
          } 
          product.value.push(element);
        }),
         mainProduct.value = response.data.produit 
        )
        )  
  })
  
 


  
         
  
  





</script>
<style>


</style>