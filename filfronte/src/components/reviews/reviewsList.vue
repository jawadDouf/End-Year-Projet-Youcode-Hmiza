<template>
<div :class="reviewsList.container">
<reviewVue v-if="$store.state.blockPage === 1" v-for="review in reviews" :review="review" />
<reviewVue v-if="$store.state.blockPage === 2" v-for="review in reviews.sort(function(a, b){return b.produit_note - a.produit_note})" :review="review" />
<reviewVue v-if="$store.state.blockPage === 3" v-for="review in reviews.sort(function(a, b){return a.produit_note - b.produit_note})" :review="review" />
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
        .get('http://localhost/filrouge/ReviewApi/getUserReviews/' + localStorage.getItem('id'))
        .then(response => (response.data.result.forEach(element => {
             reviews.value.push(element)
        })))
   }
)




</script>