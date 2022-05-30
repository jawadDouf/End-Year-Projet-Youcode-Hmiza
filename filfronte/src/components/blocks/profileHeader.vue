<template>
 <div :class="header.profile_elements">
    <p :class="header.profile_element" id="Stores" @click="storesGenerator">{{ headerElements[0] }}</p>
    <p :class="header.profile_element" id="Reviews" @click="reviewsGenerator">{{ headerElements[1] }}</p>
    <p :class="header.profile_element">{{ headerElements[2] }}</p>
 </div>
 









</template>
<script setup>
import header from "../../modulescss/blocks/blockHeader.scss"
import { onMounted, ref } from "vue";
import {useStore} from "vuex"
const props = defineProps({
  headerElements : Array
})
const store = useStore()
var infosList = ref(false)
var productsList = ref(true)

function storesGenerator(){
      productsList.value = !productsList.value

      if(productsList.value == true){
        document.getElementById("Stores").style.borderBottom = "solid 3px hsla(225, 50%, 35%, 1)" 
        document.getElementById("Reviews").style.borderBottom = "none"             
      }else {
        document.getElementById("Stores").style.borderBottom = "none"   
      }
      store.commit('changeBlockPage',1)
}
function reviewsGenerator(){
     infosList.value = !infosList.value
     productsList.value = false
      if(infosList.value == true){
        document.getElementById("Reviews").style.borderBottom = "solid 3px hsla(225, 50%, 35%, 1)"
        document.getElementById("Stores").style.borderBottom = "none"        
      }else {
        document.getElementById("Reviews").style.borderBottom = "none"   
      }
      store.commit('changeBlockPage',3)
}

onMounted(
  ()=>{
      document.getElementById("Stores").style.borderBottom = "solid 3px hsla(225, 50%, 35%, 1)" 
  }
)




</script>