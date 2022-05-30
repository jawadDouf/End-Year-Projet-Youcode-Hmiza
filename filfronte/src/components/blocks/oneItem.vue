<template>
   <tr :class="item.tr">
  <td :class="item.td"><img :class="item.img" src="../../assets/logo.png" alt=""></td>
  <td :class="item.td">{{ oneItem.business_nom}}</td>
  <td :class="item.td">{{ oneItem.published_at }}</td>
  <td :class="item.td">{{ review?.reviewsNumber }}</td>
  <td :class="item.td">{{ oneItem.produit_note}}/10</td>
  <td :class="item.td">{{ oneItem.produit_prix }}$</td>
  <td :class="item.td"><button :class="item.button">More Infos</button></td>
   </tr>
  
</template>
<script setup>
import axios from "axios";
import { onMounted } from "vue";
import { ref } from "vue";
import item from "../../modulescss/blocks/oneItem.scss"
// var review = ref(undefined)
const props = defineProps({
    oneItem : Object
    
})
var review = ref(undefined)
onMounted(
    async ()=>{
      review.value = await axios
        .get('http://localhost/folderr/reviewApi/getProductReviews/' + props.oneItem.id)
        .then( response => response.data);
  }
)
</script>

