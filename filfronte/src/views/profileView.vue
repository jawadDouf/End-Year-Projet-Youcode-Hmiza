<template>

   <busProfile v-if="actor == 1"/>
   <userProfile v-if="actor == 2"/>










</template>
<script setup>
import busProfile from "../components/profile/businessProfileView.vue"
import userProfile from "../components/profile/userProfileVue.vue"
import store from "@/store";
import { ref } from "vue"

let actor = ref(localStorage.getItem('user'))





</script>