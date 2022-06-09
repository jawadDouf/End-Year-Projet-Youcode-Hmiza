<template>
   <BusinessProfileHeader />
   <profileHeader :headerElements=headerElements />
   <productsList v-if="$store.state.blockPage == 1"/>
   
   




</template>
<script setup>
import profileHeader from "../components/blocks/profileHeader";
import productsList from "../components/blocks/productsList"
import BusinessProfileHeader from "@/components/profile/businessProfileHeader.vue";
var headerElements = ["Products","Reviews","Recomended Stores"]





</script>