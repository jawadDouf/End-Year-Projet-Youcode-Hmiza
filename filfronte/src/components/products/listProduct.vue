<template>
  
  <div :class="listProduct.container" >
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
     <div :class="listProduct.footer" >
         <button v-if="externLink" @click.prevent="updateFormCond = !updateFormCond">Update</button>
         <button><router-link :class="listProduct.linkk" :to ="{ name:'oneBusProView',params : {id : oneProduct.id , oneProduct:oneProduct}}">
         See More
         </router-link></button>
         <button v-if="externLink" @click.prevent="dlt(oneProduct.id,$event)">Delete</button>
     </div> 
     
  </div>
  <updateProductVue v-if="updateFormCond === true" :oneProduct="oneProduct" @event="updateFormCond = !updateFormCond"/>

</template>
<script setup>
import axios from "axios";
import listProduct from "../../modulescss/products/listProduct.scss"
import updateProductVue from "../forms/updateProduct.vue";
import { useRouter, useRoute } from 'vue-router'
import { ref } from "vue";
let user = localStorage.getItem('externId')
var updateFormCond = ref(false)
const router = useRouter()
const props = defineProps({
    oneProduct : Object
})
function met(){
  
  console.log(updateFormCond.value)
}
function dlt(id,event){
     axios
     .post('http://localhost/filrouge/Produit_BusinessApi/delete/' + id)
     .then(response => console.log(response.data))
      event.target.parentElement.parentElement.remove();
}

function getToProduct(id){

router.push({  path: '/businessProfileView/' + id })
}





</script>