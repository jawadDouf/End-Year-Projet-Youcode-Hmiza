<template>

<div :class="reviewStyle.listContainer" >

<productReview v-if="$store.state.blockPage == 1 && $store.state.bringCond === false" v-for="review in reviews" :review="review"/>
<productReview v-if="$store.state.blockPage == 2 && $store.state.bringCond === false" v-for="review in reviews.sort(function(a, b){return b.note - a.note})" :review="review"/>
<productReview v-if="$store.state.blockPage == 3 && $store.state.bringCond === false" v-for="review in reviews.sort(function(a, b){return a.note - b.note})" :review="review"/> 
<ultimeFormVue :id="id" v-if="$store.state.bringCond" @event="$store.commit('modifybringEl',false)" @event2="getProductReviews"/>
</div>




 




</template>
<script setup>
import axios from "axios"
import { ref } from "vue";
import { onMounted  } from "vue";
import productReview from "../reviews/productReview.vue"
import ultimeFormVue from '@/components/forms/ultimeForm.vue';
import reviewStyle from "../../modulescss/reviews/review.scss"
import {useStore} from "vuex"
const store = useStore()
const emit = defineEmits(['event3'])
const props = defineProps({
    id : Number,
   
})
let reviews = ref([])

async function getProductReviews(){
    reviews.value = []
   await axios.get("http://localhost/filrouge/ReviewApi/getProductReviews/" + props.id)
          .then(response => response.data.result.forEach(element => {
               reviews.value.push(element)
          }))
     emit('event3')
       }
function addNewReview(){
       if(props.oneReview){
        console.log("IIIIII")
        console.log(props.oneReview)
        props.oneReview.forEach(element => {
            reviews.value.push(element);
        });
       }
           
    
}
onMounted(
     getProductReviews()   
    
     
   
    
     
)








</script>