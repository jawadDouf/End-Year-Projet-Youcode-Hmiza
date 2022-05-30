<template>
  <div :class="mainPage.userInterface" @click="$store.commit('changeAuth',1)">
      <fa :class="mainPage.icon" :icon="['fa','user']" />
      <h2>Utilis. Compte</h2>
      
  </div>
  <div :class="mainPage.boInterface" @click="$store.commit('changeAuth',-1)">
      <fa :class="mainPage.icon" :icon="['fa','user-tie']" />
      <h2>Busin. Compte</h2>
  </div>




</template>
<script setup>
import mainPage from "../../modulescss/authentification/mainPage.scss"




</script>
<style>





</style>