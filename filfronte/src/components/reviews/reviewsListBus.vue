<template>
<div :class="reviewsList.container">
<reviewBusVue  v-for="review in reviews" :review="review" />
</div>







</template>
<script setup>
import reviewsList from "../../modulescss/reviews/reviewsList.scss"
import axios from 'axios';
import { onMounted } from 'vue';
import reviewBusVue from '../reviews/reviewBusVue.vue';
import {ref} from 'vue'
let reviews = ref([])



onMounted(
   ()=>{
     if(localStorage.getItem("externLink")){
        axios
        .get('http://localhost/filrouge/ReviewApi/getLatestReviews/' + localStorage.getItem('externId'))
        .then(response => (response.data.forEach(element => {
             reviews.value.push(element)
        })))  
     }else{
        axios
        .get('http://localhost/filrouge/ReviewApi/getLatestReviews/' + localStorage.getItem('id'))
        .then(response => (response.data.forEach(element => {
             reviews.value.push(element)
        })))    
     }
       
   }
)




</script>