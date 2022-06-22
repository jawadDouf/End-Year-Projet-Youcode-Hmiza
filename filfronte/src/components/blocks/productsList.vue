<template>
<div :class="productsList.container">
  <ListProduct v-for="oneProduct in businessProducts" :oneProduct="oneProduct"/>
  <div :class="productsList.add" @click="addCond = !addCond" v-if="!user">
  <fa :icon="['fas','plus']" :class="productsList.icon" /> 
</div>
</div>

<addProduct :businessProducts="businessProducts" v-if="(addCond)" @event="addCond = !addCond" @event2="getLast" />
{{ user }}






</template>
<script setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import productsList from "../../modulescss/products/productsList.scss"
import ListProduct from "../products/listProduct.vue";
import addProduct from "../../components/forms/addProduct.vue"
// import { response } from "express";
let businessProducts = ref([])
let addCond = ref(false)
let lastProduct = ref("")
let user = localStorage.getItem('externLink')
async function getProducts(){
      
       if(localStorage.getItem("externLink")){
      await axios
        .get('http://localhost/filrouge/Produit_BusinessApi/getproduitsofAbusiness/' + localStorage.getItem('externId'))
        .then(response => (response.data.forEach(element => {
               businessProducts.value.push(element)
        })))   

 }else{
       await axios
        .get('http://localhost/filrouge/Produit_BusinessApi/getproduitsofAbusiness/' + localStorage.getItem('id'))
        .then(response => (response.data.forEach(element => {
               
               businessProducts.value.push(element)

        })))      
       }
     
 }
onMounted(
   getProducts()  
)
function getLast(){
        
       console.log("businessProducts.value")
   axios
        .get('http://localhost/filrouge/Produit_BusinessApi/getlastproduitsofAbusiness/' + localStorage.getItem('id'))
        .then(response => {
              console.log(response.data)
             businessProducts.value.push(response.data[0])
             console.log(response.data)
        }
               
        )
}

async function getProducts2(){
        businessProducts.value = ref([])
       await axios
        .get('http://localhost/filrouge/Produit_BusinessApi/getproduitsofAbusiness/' + localStorage.getItem('id'))
        .then(response => (response.data.forEach(element => {
               businessProducts.value.push(element)

        }))) 
        
}



</script>