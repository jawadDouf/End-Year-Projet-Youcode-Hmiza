<template>

<div @click="$emit('event')" :class="addForm.overlay">


</div>
<div :class="addForm.formContainer">
<h2>Add a Product</h2>
<form @submit.prevent="addProduct" :class="addForm.form" id="form" v-if="formChanging">
<div :class="addForm.searchInput">
   <div>

    
   </div>
  <input type="text" list="products" v-model="inputValue"  id="input"
   placeholder="Choose Or Enter Product" @keyup="getProduct"
   >
   <input type="file"  :class="addForm.secInput" @change="sendImage($event)" />
   <ul>
      <li v-for="product in $store.state.products" @click="choosePro(product)">{{ product.produit_nom }}</li>
      <li :class="addForm.addNewli" id="addNew" @click="addForms">Add new product</li>
   </ul>
   <!-- <datalist id="products">
      <option :class="addForm.option" v-for="product in $store.state.products" :value="product.produit_nom">{{ product[nom] }}</option>
  </datalist> -->
</div>
<div :class="addForm.price">

  <input type="number" v-model="price"  placeholder="Enter a Price">
</div>
<button :class="addForm.submitButton">Add Product</button>
</form>
<form  @submit.prevent="addProductBusiness" v-if="!formChanging" :class="addForm.form2">
   <div :class="addForm.block">
   <input type="text" v-model="inputValue" :class="addForm.input" placeholder="Enter name of the product" />
   <input type="file"  @change="sendImage($event)" :class="addForm.input" />
   <input type="number" placeholder="Enter Price" v-model="price" :class="addForm.input" /> 
   </div>  
   <div :class="addForm.block">
      <select  name="Profession Categorie:" v-model="categorie" value="choose The main Categorie" :class="addForm.input">
      <option value="" disabled selected>choose The main Categorie</option>
        <option>Services</option>
        <option>Products</option>
      </select>
      <select  name="Profession Categorie:" v-model="categorie2"  :class="addForm.input">
        <option value="" disabled selected>choose The sub Categorie</option>
        <option v-for="option in options[categorie]" >{{ option }}</option>
      </select>
      <select  name="Profession Categorie:" v-model="categorie3"  :class="addForm.input">
      <option value="" disabled selected>choose The last Categorie</option>
        <option v-for="option in options[categorie2]" >{{ option }}</option>
      </select>
   </div>  
   <div :class="addForm.block">
   <textarea type="text" rows="4" cols="1000" :class="addForm.input" v-model="description"/>
   </div>  
   <button :class="addForm.submitButton2">Add Product</button>




</form>

</div>






</template>
<script setup>
import axios from "axios"
import addForm from "../../modulescss/forms/addForm.scss"
import { useStore } from "vuex";
import { ref } from "vue";
const store = useStore()
let formChanging = ref(true)
let inputValue = ref("")
let price = ref()
let productId = ref()
let image = ref("")
let categorie = ref("")
let categorie2 = ref("")
let categorie3 = ref("")
let description = ref("")
var options = {
   "Service" :[
      "Medcine",
      "Coiffure"
    ],
    "Products" : [
      "Technologie",
      "Food",
      "Clothes"
    ],
    "Technologie" : [
      "Phone",
      "Tablette",
      "Watch",
      "Speaker"
    ]
    }
function sendImage(event){
    image.value = event.target.files[0]
   
}
function getProduct(){
   
    store.dispatch('getProducts',inputValue.value);
    if(inputValue.value.length > 0){
      console.log("length is :" + store.state.products.length)
      document.getElementById("addNew").style.display = "block"
    }
}
function addExtraInputs(){
    console.log("inputt")
    // document.getElementById("input").value="";
}
function choosePro(product){    
  document.getElementById("addNew").style.display = "none"
  
  inputValue.value = product.produit_nom
  productId.value = product.produit_id
  store.state.products = []
   
}
function addProduct(){
    var formData = new FormData()
    console.log(image.value)
    formData.append('produit_id',productId.value)
    formData.append('business_id',localStorage.getItem('id'))
    formData.append('produit_prix',price.value)
    formData.append('produit_img2',image.value)
     axios.post('http://localhost/filrouge/Produit_BusinessApi/addproduit_business', formData)
          .then(function (response) {
            console.log(formData),
            console.log(response)
          })
          .catch(function (response) {
            console.log(response);
          });
     price.value = ref("") 
     image.value = ref("") 
     inputValue.value = ref("") 
}
function addForms(){
   formChanging.value = !formChanging.value
}
function addProductBusiness(){
  var formData = new FormData()
  
  formData.append('business_id',localStorage.getItem('id'))
  formData.append('produit_id',localStorage.getItem('lastId'))
  formData.append('produit_prix',price.value)
  formData.append('produit_img2',image.value)
  formData.append('produit_nom',inputValue.value)
  formData.append('produit_description',description.value)
  formData.append('produit_categorie',categorie.value)
  formData.append('produit_souscategorie',categorie2.value)
  formData.append('produit_souscategorie2',categorie3.value)
  axios.post('http://localhost/filrouge/produitApi/addproduit', formData)
          .then(function (response) {
            console.log(formData),
            console.log(response)
          })
          .catch(function (response) {
            console.log(response);
          });
}
</script>