<template>
   <BusinessProfileHeader />
   <profileHeader :headerElements=headerElements />
   <productsList v-if="$store.state.blockPage == 1"  />
   <reviewsListBus v-if="$store.state.blockPage == 2"/>
   
   




</template>
<script setup>
import profileHeader from "../blocks/profileHeader.vue";
import productsList from "../blocks/productsList.vue"
import reviewsListBus from "../reviews/reviewsListBus.vue"
import BusinessProfileHeader from "@/components/profile/businessProfileHeader.vue";
import { onMounted, ref } from "vue";
var headerElements = ref(["Products","Latest Reviews"])
if(localStorage.getItem('externId') && localStorage.getItem('externLink')){
  headerElements = ref(["Products"])
}

const props = defineProps({
   user : Number
})




</script>