<template>
  <div :class="product.container">
  <div :class="product.image">
  <img :src="oneProduct.produit_img" alt="" >
  </div>
  <div :class="product.infos">
  <h3 > {{ oneProduct.produit_nom }}</h3>
  <div :class="product.categories">
  <span :class="product.span1">{{oneProduct.produit_categorie}}</span>
  <span :class="product.span2">{{oneProduct.produit_souscategorie}}</span>
  <span :class="product.span3">{{oneProduct.produit_souscategorie2 }}</span>
  </div>
  <p>{{ oneProduct.produit_description}}</p>
  <!-- <p :class="product.message">Click on learn more to check prices and ratings</p> -->
  <!-- <div :class="product.infosContainer">
   
  </div> -->
  <router-link :to ="{ name:'oneProductView',params : {id : oneProduct.produit_id , oneProduct : oneProduct}}">
   <span :class="product.span4">
  Learn More >>
    </span>     
  </router-link>
  
  </div>
  </div>
  
</template>

<script setup>
import { onMounted } from "vue";
import product from "../../modulescss/products/product.scss"
const props = defineProps({
  oneProduct: Object
})

onMounted({
  
})
</script>

<style>

</style>