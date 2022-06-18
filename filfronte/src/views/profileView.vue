<template>
   
   
    <div v-if="!user">
      <busProfile v-if="actor == 1"/>
      <userProfile v-if="actor == 2"/>
    </div>
    <div v-if="user">
     <busProfile v-if="user == 1" />
     <userProfile v-if="user == 2" />
    </div>
    
   

    










</template>
<script setup>
import busProfile from "../components/profile/businessProfileView.vue"
import userProfile from "../components/profile/userProfileVue.vue"
import { useRouter, useRoute } from 'vue-router'

import store from "@/store";

import { ref } from "vue"
const route = useRoute()
let externLink = ref(localStorage.getItem('externLink'))
let actor = ref(localStorage.getItem('user'))
let user = localStorage.getItem('externLink')




</script>