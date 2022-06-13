<template>
   <BusinessProfileHeader />
   <profileHeader :headerElements=headerElements />
   <productsList v-if="$store.state.blockPage == 1"/>
   <reviewsListBus v-if="$store.state.blockPage == 2"/>
   
   




</template>
<script setup>
import profileHeader from "../blocks/profileHeader";
import productsList from "../blocks/productsList"
import reviewsListBus from "../reviews/reviewsListBus"
import BusinessProfileHeader from "@/components/profile/businessProfileHeader.vue";
var headerElements = ["Products","Latest Reviews"]





</script>