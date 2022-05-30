<template>
<div :class="reviewsList.container">
<reviewVue v-for="review in reviews" :review="review" />
</div>







</template>
<script setup>
import reviewsList from "../../modulescss/reviews/reviewsList.scss"
import axios from 'axios';
import { onMounted } from 'vue';
import reviewVue from './review.vue';
import {ref} from 'vue'
let reviews = ref([])



onMounted(
   ()=>{
       axios
        .get('http://localhost/folderr/ReviewApi/getUserReviews/' + localStorage.getItem('id'))
        .then(response => (response.data.result.forEach(element => {
             reviews.value.push(element)
           
           
        })))
   }
)




</script>