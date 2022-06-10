<template>
     <div @click="$emit('event')" :class="form.overlay"></div>
      <div :class="form.container">
        <form :class="form.form">
         <div :class="form.title">
              <h3>Add A Review</h3>
              <p @click="$emit('event')"> &#10060;</p> 
         </div>
         <div :class="form.field">
            <label for="title">Title</label>
            <input type="text" name="title">
         </div>
         <div :class="form.field">
            <label for="description">Description</label>
            <textarea type="text" name="description" />
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
          <button>Add Review</button>  
         </div>
        
        </form>

      </div>









</template>
<script setup>
import form from "../../modulescss/forms/ultimeForm.scss"
import { ref } from "vue"

let inputValue = ref()








</script>