<template>
<div :class="productsList.container">
  <ListProduct v-for="oneProduct in businessProducts" :oneProduct="oneProduct"/>
  <div :class="productsList.add" @click="addCond = !addCond">
  <fa :icon="['fas','plus']" :class="productsList.icon" /> 
</div>
</div>

<addProduct v-if="addCond" @event="addCond = !addCond" />







</template>
<script setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import productsList from "../../modulescss/products/productsList.scss"
import ListProduct from "../products/listProduct.vue";
import addProduct from "../../components/forms/addProduct"
let businessProducts = ref([])
let addCond = ref(false)
onMounted(
 ()=>{
     axios
        .get('http://localhost/folderr/Produit_BusinessApi/getproduitsofAbusiness/' + localStorage.getItem('id'))
        .then(response => (response.data.forEach(element => {
               businessProducts.value.push(element)
        })))
 }

)






</script>