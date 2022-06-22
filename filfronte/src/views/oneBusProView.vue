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
  <span :class="one.span2">{{oneProduct.produit_souscategorie}}</span>
  <span :class="one.span3">{{oneProduct.produit_souscategorie2}}</span>
  </div>
  
  <h3 :class="one.h3"><span :class="one.spans2">Rating :</span> {{oneProduct.produit_note}}/10</h3>
  
  <h3 :class="one.h3"><span :class="one.spans2">Price :</span> {{oneProduct.produit_prix }}$</h3>
  <h3 :class="one.h3"><span :class="one.spans2">Store Location :</span> <span @click="goToProfile(oneProduct.business_id)" :class="one.businessName">{{oneProduct.business_nom }}</span></h3>
  <h3 :class="one.h3"><span :class="one.spans2">Store :</span> <span >{{oneProduct.business_adresse }},{{oneProduct.business_location}}</span></h3>
 <button @click="$store.commit('modifybringEl',true)" v-if="actor == 2">Add Review</button>
 <button  v-if="!actor" @click="mockingUser()">Add Review</button>
  </div> 
 </div>
   <profileHeader :headerElements=headerElements />
   <reviewsList :id="id" @event3="getProductBus()"/>
   




</template>

<script setup>
import axios from 'axios'
import { ref } from 'vue'
import one from "../modulescss/blocks/oneProduct.scss"
import { onMounted } from 'vue';
import { useRouter, useRoute } from 'vue-router'
import {useStore} from "vuex"

import profileHeader from "../components/blocks/profileHeader";
import reviewsList from "../components/reviews/listProReviews.vue"
import ultimeFormVue from '@/components/forms/ultimeForm.vue';
const store = useStore()
const route = useRoute()
const router = useRouter()
let id = route.params.id
let oneProduct = ref("");
var headerElements = ["Reviews","Best Reviews","Worst Reviews"]
let actor = ref(localStorage.getItem('user'))
var userId = localStorage.getItem('id')
async function getProductBus(){
  
   await  axios.get("http://localhost/filrouge/Produit_BusinessApi/getoneproduct/" + id)
          .then(response => {
              oneProduct.value = response.data     
          }   
          )
    
}
onMounted(
    getProductBus()
    
),
function getLatestReview(){
  console.log("im'in")
  console.log(id)
  axios.get("http://localhost/filrouge/ReviewApi/getLastReview/" + id)
          .then(response => {
              oneReview.value = response.data 
              console.log("uu",response.data)
          }   
          )
}
function goToProfile(id){
localStorage.setItem("externLink",1)
localStorage.setItem("externId",id)
router.push({ name: 'profileView', params: { id: id} })
}
function mockingUser(){
router.push({ name: 'AuthView' })
}



</script>