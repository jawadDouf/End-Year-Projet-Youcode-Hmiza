<template>
     <div @click="$emit('event')" :class="form.overlay"></div>
      <div :class="form.container">
        <form :class="form.form" @submit.prevent="updateReview">
         <div :class="form.title">
              <h3>Add A Review</h3>
              <p @click="$emit('event')"> &#10060;</p> 
         </div>
         <div :class="form.field">
            <label for="title">Title</label>
            <input v-model="title" type="text" name="title">
         </div>
         <div :class="form.field">
            <label for="description">Description</label>
            <textarea v-model="description" type="text" name="description" />
         </div>
         <div :class="form.field">
         <label for="">Rating</label>
         <input type="range" v-model="inputValue"  min="0" max="10" list="number" />{{inputValue}}
            <datalist id="number">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            </datalist>    
         </div>
         <div :class="form.submitField">
          <p @click="$emit('event')">Cancel</p>
          <button>update Review</button>  
         </div>
        
        </form>

      </div>









</template>
<script setup>
import form from "../../modulescss/forms/ultimeForm.scss"
import { onMounted, ref } from "vue"
import axios from "axios";
// import { response } from "express";
const props = defineProps({
   review : Object
})
let inputValue = ref(props.review.note)
let title = ref(props.review.titre)
let description = ref(props.review.description)

onMounted(
         axios.get("http://localhost/filrouge/ReviewApi/getProductReviews",props.review.review_id)
      .then(
         response => console.log(response.data)
      )


)


function updateReview(){
      var formData = new FormData()
      formData.append('id',props.review.review_id)
      formData.append('titre',title.value)
      formData.append('description',description.value)
      formData.append('note',inputValue.value)
      axios.post("http://localhost/filrouge/ReviewApi/updateReview",formData)
      .then(
         response => console.log(response.data)
      ).then(()=>{
      inputValue.value = "",
      title.value = " ",
      description.value = " "  
      })
      
   }




</script>