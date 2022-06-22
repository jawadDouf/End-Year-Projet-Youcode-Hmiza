<template>
     <div @click="$emit('event')" :class="form.overlay"></div>
      <div :class="form.container">
        <form :class="form.form" @submit.prevent="addReview">
         <div :class="form.title">
              <h3>Add A Review</h3>
              <p @click="$emit('event')"> &#10060;</p> 
         </div>
         <div :class="form.field">
            <label for="title">Title</label>
            <input v-model="title" type="text" :class="form.input" name="title">
         </div>
         <div :class="form.field">
            <label for="description">Description</label>
            <textarea v-model="description" type="text" :class="form.input" name="description" />
         </div>
         <div :class="form.field">
         <label for="">Rating</label>
         <input type="range" v-model="inputValue"  min="0" max="10" list="number" :class="form.input" />{{inputValue}}
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
          <button>Add Review</button>  
         </div>
        
        </form>

      </div>









</template>
<script setup>
import form from "../../modulescss/forms/ultimeForm.scss"
import { onMounted, ref } from "vue"
import axios from "axios";
// import { response } from "express";
const emit = defineEmits(['event','event2'])
const props = defineProps({
   id : Number
})
let inputValue = ref()
let title = ref("")
let description = ref("")
let oneReview = ref("")


function addReview(){
      var formData = new FormData()
      formData.append('titre',title.value)
      formData.append('description',description.value)
      formData.append('note',inputValue.value)
      formData.append('utilisateur_id',localStorage.getItem('id'))
      formData.append('produit_business_id',props.id)
      axios.post("http://localhost/filrouge/ReviewApi/addReview",formData)
      .then(
         response => console.log(response.data)
      )
      
      .then(()=>{
      inputValue.value = "",
      title.value = " ",
      description.value = " "
         
      })
      emit('event')
      emit('event2')
   }




</script>