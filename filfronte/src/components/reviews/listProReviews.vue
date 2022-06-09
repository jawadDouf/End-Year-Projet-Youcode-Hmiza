<template>
<div :class="reviewStyle.listContainer">

<productReview v-for="review in reviews" :review="review"/>
</div>


 




</template>
<script setup>
import axios from "axios"
import { ref } from "vue";
import { onMounted } from "vue";
import productReview from "../reviews/productReview.vue"
import reviewStyle from "../../modulescss/reviews/review.scss"
const props = defineProps({
    id : Number
})
let reviews = ref([])


onMounted(
    axios.get("http://localhost/filrouge/ReviewApi/getProductReviews/" + props.id)
          .then(response => response.data.result.forEach(element => {
               reviews.value.push(element)
          }))
)









</script>