<template>

 <div :class="block.list">
  <div v-if="productsList" :class="block.items">
  <table :class="block.table">
  <tr>
    <th :class="block.table_titles">Logo</th>
    <th :class="block.table_titles">Name</th>
    <th :class="block.table_titles">Dropping Date</th>
    <th :class="block.table_titles">Reviews N
        <span @click="sort2"><fa :icon="['fas','angle-down']" :class="block.icon"/></span>
    </th>
    <th :class="block.table_titles">
    Note
    <span @click="sort"><fa :icon="['fas','angle-down']" :class="block.icon"/></span>
    </th>
    <th :class="block.table_titles">Prix
    <span @click="sort2"><fa :icon="['fas','angle-down']" :class="block.icon"/></span>
    </th>
    <th :class="block.table_titles"></th>
  </tr>
     <oneItem v-for="oneProduct in product"  :oneItem="oneProduct" 
     v-if="$store.state.blockPage == 1"
     />
     <oneItem v-for="oneProduct in product2"  :oneItem="oneProduct" 
     v-if="$store.state.blockPage == 2"
     
     />
     
     </table>
    </div>
    </div>
 


</template>
<script setup>
import axios from "axios"
import block from "../../modulescss/blocks/block.scss"
import oneItem from "./oneItem.vue";
import { onMounted, ref } from "vue";
import profileHeader from "./profileHeader.vue";
const props = defineProps({
    product : Array,
    mainProduct : Object
})
let produitToSearchWith = ref("")
let product2 = ref([])
var productsList = ref(true)
function sort(){
    props.product.sort( function( a , b){
  if(a.produit_note > b.produit_note) return -1;
  if(a.produit_note < b.produit_note) return 1;
            return 0;
})
  }
function sort2(){
    props.product.sort( function( a , b){
            if(a.produit_prix > b.produit_prix) return -1;
            if(a.produit_prix < b.produit_prix) return 1;
            return 0;
})
  }

onMounted(
  async ()=>{
    produitToSearchWith = props.mainProduct.produit_nom.replace(/ /g,"_");
     await axios
        .get('http://localhost/hmizaapi/produitApi/produitsSearch/' + produitToSearchWith)
        .then(response => ( response.data.forEach(element => {     
           product2.value.push(element);
    })))
     
       
  }

)    

</script>
<style>



</style>