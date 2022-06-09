<template>
  

  <div :class="one.cantainer">
  <div :class="one.container_img"> 
  <img :class="one.img"  :src="stableElement?.produit_img2" alt="mainImage" style="width:330px;height:360px">
  </div>
  <div :class="one.container_infos"> 
  <p :class="one.p1">In publishing and graphic design and graphic design</p>
  <h2 :class="one.h2">Iphone 2020 S5 JAPAN STEVY DUDE UAYEUZ</h2>
  <p :class="one.p">{{ topProduct?.produit_description }}</p>
  <div :class="one.spans">
  <span :class="one.span1">{{topProduct?.produit_categorie}}</span>
  <span :class="one.span2">Technologie</span>
  <span :class="one.span3">Phone</span>
  </div>
  
  <h3 :class="one.h3"><span :class="one.spans2">Rating Range :</span>{{ bottomProduct?.produit_note }}/10 => {{ topProduct?.produit_note}}/10</h3>
  
  <h3 :class="one.h3"><span :class="one.spans2">Price Review :</span>{{ cheapestProduct?.produit_prix }}$ => {{ expensiveProduct?.produit_prix}}$</h3>

  </div> 
 </div>
  <div>
  <block :product="product"/>
  </div>
  
   
  

</template>
<script setup>
import { ref } from "vue";
import block from "../components/blocks/parentBlock.vue"
import index from "../modulescss/products/index.scss"
import one from "../modulescss/blocks/oneProduct.scss"
import two from "../modulescss/products/product.scss"
import axios from 'axios';
import { useRouter, useRoute } from 'vue-router'
import { onMounted } from "vue";

const route = useRoute()
let id = route.params.id
var product = ref([])
var topProduct = ref(undefined)
var expensiveProduct = ref(undefined)
var bottomProduct = ref(undefined)
var cheapestProduct = ref(undefined)
let stableElement = ref(undefined)
var min = ref(0)
var max = ref(11)
var exp = ref(10000000000000)
var cheap = ref(0)
onMounted(
  async ()=>{
     await axios
        .get('http://localhost/folderr/Produit_BusinessApi/getproduitsbusiness/' + id)
        .then(response => ( response.data.forEach(element => {      
          if(response.data.length === 1){
            stableElement.value = element
          }else{
           if(element.produit_note > min.value){
            min.value = element.produit_note
            topProduct.value = element
            stableElement.value = element
          }else if(element.produit_note < max.value){
            max.value = element.produit_note
            bottomProduct.value = element
          }
          if(element.produit_prix > cheap.value){
            cheap.value = element.produit_cheap
            cheapestProduct.value = element
          }else if(element.produit_prix < exp.value){
            exp.value = element.produit_prix
            expensiveProduct.value = element
          } 
          }  
          product.value.push(element);
        }))
        )
       
  }
  
 

)
  
         
  
  





</script>
<style>


</style>