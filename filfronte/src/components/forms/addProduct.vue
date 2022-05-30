<template>

<div @click="$emit('event')" :class="addForm.overlay">


</div>
<div :class="addForm.formContainer">
<h2>Add a Product</h2>
<form @submit.prevent="" :class="addForm.form">
<div :class="addForm.searchInput">
  <input type="text" list="products" @focus="getProduct" id="input"
 placeholder="Choose Or Enter Product">
   <datalist id="products">
      <option :class="addForm.option" v-for="product in $store.state.products" :value="product.produit_nom">{{ product[nom] }}</option>
      
  </datalist>
</div>
<div :class="addForm.price">
  <input type="number"   placeholder="Enter a Price">
</div>
<button :class="addForm.submitButton">Add Product</button>
</form>

</div>






</template>
<script setup>
import addForm from "../../modulescss/forms/addForm.scss"
import { useStore } from "vuex";
const store = useStore()


function getProduct(){
    store.dispatch('getProducts',"d");
    
}
function addExtraInputs(){
    console.log("inputt")
    // document.getElementById("input").value="";
}

</script>