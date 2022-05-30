<template>
  
  <div :class="listProduct.container">
     <div :class="listProduct.imgContainer">
     <img :src="oneProduct.produit_img2" :alt="oneProduct.nom">
     </div>
      
      <div :class="listProduct.container_infos">
      <h3>{{ oneProduct.produit_nom}}</h3>
      <p>{{oneProduct.produit_description}}</p>
      <div :class="listProduct.container_numbers">
      <p>
      <span :class="listProduct.title">
      rating: 
      </span>
      <span>
      {{oneProduct.produit_note}}/10
      </span>
      
      </p>
      <p>
      <span :class="listProduct.title">
      price:
      </span>
      <span>
      {{oneProduct.produit_prix}}$
      </span>
      </p>
      <p>
      <span :class="listProduct.title">
      reviews: 
      </span>
      <span>
      30
      </span>
      </p>
      
      </div>
      
      </div>
     <div :class="listProduct.footer">
         <button>Update</button>
         <button>See More</button>
         <button>Delete</button>
     </div> 
  </div>


</template>
<script setup>
import listProduct from "../../modulescss/products/listProduct.scss"
const props = defineProps({
    oneProduct : Object
})









</script>