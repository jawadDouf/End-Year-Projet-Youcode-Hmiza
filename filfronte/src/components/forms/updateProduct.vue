<template>
<div @click="$emit('event')" :class="addForm.overlay">
  

</div>
 <div :class="addForm.formContainer">
    <h2>Update a Product</h2>
    <form @submit.prevent="" :class="addForm.form">
          
    </form>
</div>







</template>
<script setup>
import addForm from "../../modulescss/forms/addForm.scss"
 const props = defineProps({
     oneProduct : Object
 })










</script>