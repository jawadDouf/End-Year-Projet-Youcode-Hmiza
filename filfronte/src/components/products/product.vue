<template>
  <div :class="product.container">
  <div :class="product.image">
  <img src="../../../../backend/public/Img/coverFirstImage.png" alt="">
  </div>
  <div :class="product.infos">
  <h3> {{ oneProduct.produit_nom }}</h3>
  <div :class="product.categories">
  <span :class="product.span1">Product</span>
  <span :class="product.span2">Technologie</span>
  <span :class="product.span3">Phone</span>
  </div>
  <div :class="product.infosContainer">
   
  </div>
  <router-link :to ="{ name:'oneProductView',params : {id : oneProduct.produit_id , oneProduct : oneProduct}}">
   <span :class="product.span4">
  Learn More >>
    </span>     
  </router-link>
  
  </div>
  </div>
  
</template>

<script setup>
import product from "../../modulescss/products/product.scss"
const props = defineProps({
  oneProduct: Object
})
</script>

<style>

</style>