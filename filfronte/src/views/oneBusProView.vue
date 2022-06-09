<template>
 

<div :class="one.cantainer">
  <div :class="one.container_img"> 
  <img :class="one.img"  :src="oneProduct.produit_img2" alt="mainImage" >
  </div>
  <div :class="one.container_infos"> 
  <p :class="one.p1">In publishing and graphic design and graphic design</p>
  <h2 :class="one.h2">{{ oneProduct.produit_nom }}</h2>
  <p :class="one.p">{{ oneProduct.produit_description }}</p>
  <div :class="one.spans">
  <span :class="one.span1">{{oneProduct.produit_categorie}}</span>
  <span :class="one.span2">Technologie</span>
  <span :class="one.span3">Phone</span>
  </div>
  
  <h3 :class="one.h3"><span :class="one.spans2">Rating Range :</span> {{oneProduct.produit_note}}/10</h3>
  
  <h3 :class="one.h3"><span :class="one.spans2">Price Review :</span> {{oneProduct.produit_prix }}$</h3>

  </div> 
 </div>
   <profileHeader :headerElements=headerElements />
   <reviewsList :id="id"/>





</template>

<script setup>
import axios from 'axios'
import { ref } from 'vue'
import one from "../modulescss/blocks/oneProduct.scss"
import { onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router'
import profileHeader from "../components/blocks/profileHeader";
import reviewsList from "../components/reviews/listProReviews.vue"
const route = useRoute()
let id = route.params.id
let oneProduct = ref("");
var headerElements = ["Reviews","Best Reviews","Worst Reviews"]


onMounted(
    () =>{
     axios.get("http://localhost/filrouge/Produit_BusinessApi/getoneproduct/" + id)
          .then(response => {
              oneProduct.value = response.data 
          }   
          )
     
          
    }
)






</script>