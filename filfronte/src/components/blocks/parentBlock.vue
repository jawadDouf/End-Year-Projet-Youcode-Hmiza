<template>
 <profileHeader :headerElements=headerElements />
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
     />
     </table>
    </div>
    </div>
 


</template>
<script setup>
import block from "../../modulescss/blocks/block.scss"
import oneItem from "./oneItem.vue";
import { ref } from "vue";
import profileHeader from "./profileHeader.vue";
const props = defineProps({
    product : Array,
})
var productsList = ref(true)
var headerElements = ["Stores","Reviews","More Infos"]
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

      

</script>
<style>



</style>