<template>
   <tr :class="item.tr">
  <td :class="item.td"><img :class="item.img" src="../../assets/logo.png" alt=""></td>
  <td :class="item.td" @click="goToProfile(oneItem.business_id)">
  {{ oneItem.business_nom }}
  </td>
  <td :class="item.td">{{ oneItem.published_at }}</td>
  <td :class="item.td" v-if="$store.state.blockPage == 1">{{ review?.reviewsNumber }}</td>
  <td :class="item.td" v-if="$store.state.blockPage == 2">{{ review2 }}</td>
  <td :class="item.td">{{ oneItem.produit_note}}/10</td>
  <td :class="item.td">{{ oneItem.produit_prix }}$</td>
  <td :class="item.td"><button :class="item.button">
  <router-link :class="item.linkk" :to ="{ name:'oneBusProView',params : {id : oneItem.id , oneProduct:oneProduct}}">
  More Infos
  </router-link>
  </button></td>
   </tr>
  
  
</template>
<script setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import item from "../../modulescss/blocks/oneItem.scss"
import { useRouter, useRoute } from 'vue-router'
import {useStore} from "vuex"
  
const store = useStore()

// var review = ref(undefined)

const props = defineProps({
    oneItem : Object,
    mainProduct : Object
})

const route = useRouter()
var review = ref(undefined)
var review2 = ref(1)
onMounted(
    async ()=>{
      if(store.state.blockPage == 1){
       review.value = await axios
        .get('http://localhost/filrouge/reviewApi/getProductReviews/' + props.oneItem.id)
        .then( response => response.data); 
      }else if(store.state.blockPage == 2){
        
        review2.value = await axios
        .get('http://localhost/hmizaApi/reviewApi/getProductReviews/' + props.oneItem.id)
        .then( response => response.data
       ); 
        
      }
      
  }
)
function goToProfile(id){
localStorage.setItem("externLink",1)
localStorage.setItem("externId",id)
route.push({ name: 'profileView', params: { id: id} })
}
</script>

