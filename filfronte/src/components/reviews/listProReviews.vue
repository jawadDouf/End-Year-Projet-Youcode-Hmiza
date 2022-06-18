<template>

<div :class="reviewStyle.listContainer" >


<productReview v-if="$store.state.blockPage == 1" v-for="review in reviews" :review="review"/>
<productReview v-if="$store.state.blockPage == 2" v-for="review in reviews.sort(function(a, b){return b.note - a.note})" :review="review"/>
<productReview v-if="$store.state.blockPage == 3" v-for="review in reviews.sort(function(a, b){return a.note - b.note})" :review="review"/>    
</div>




 




</template>
<script setup>
import axios from "axios"
import { ref } from "vue";
import { onMounted } from "vue";
import productReview from "../reviews/productReview.vue"
import reviewStyle from "../../modulescss/reviews/review.scss"
const props = defineProps({
    id : Number,
    oneReview : Object
})
let reviews = ref([])

async function getProductReviews(){
   await axios.get("http://localhost/filrouge/ReviewApi/getProductReviews/" + props.id)
          .then(response => response.data.result.forEach(element => {
               reviews.value.push(element)
          }))
}

function addNewReview(){
    if(props.oneReview){
        console.log(props.oneReview)
        reviews.value.push(props.oneReview)    
    } 
}
onMounted(
    getProductReviews(),
    addNewReview()

    
)








</script>