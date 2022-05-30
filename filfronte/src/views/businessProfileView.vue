<template>
   <profileHeader :headerElements=headerElements />
   <productsList v-if="$store.state.blockPage == 1"/>
   





</template>
<script setup>
import profile from "../modulescss/profile/busProfile.scss"
import profileHeader from "../components/blocks/profileHeader";
import productsList from "../components/blocks/productsList"
var headerElements = ["Products","Reviews","Recomended Stores"]





</script>