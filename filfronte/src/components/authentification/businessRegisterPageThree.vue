<template>

  <h1>Profession</h1>
  <form :class="bregister3.container_form" enctype="">
       <div :class="bregister3.container_form_email">
       <label :class="bregister3.label">Store Profession:</label>
       <select v-model="vvv" name="Store Profession:" value="Store Profession" id="selected1" :class="bregister3.input">         
              <option>Products</option>
              <option>Service</option>
       </select>
       </div>
       <div :class="bregister3.container_form_password">
       <label :class="bregister3.label">Categorie of the chosen profession</label>
        <select v-model="business.business_sousprofession" name="Profession Categorie:" value="Profession Categorie" id="selected2" :class="bregister3.input">
        <option v-for="option in options[vvv]" >{{ option }}</option>
        </select>
        
       </div>
       <div :class="bregister3.container_form_submit">
        <button  :class="bregister3.button" @click.prevent="$store.commit('modifyBusinessThird',business)">Next</button>
        <div :class="bregister3.registration">
        <p :class="bregister3.register">Wanna Back ?</p>
        <a @click="$store.commit('changeAuth',-3)" :class="bregister3.register">Back</a>
        </div>
       </div>  
       
         
  </form>





</template>
<script setup>
import { onMounted } from "vue";
import { ref } from "vue";
import bregister3 from "../../modulescss/authentification/pageThreeBR.scss"
var options = {
   "Service" :[
      "Medcine",
      "Coiffure"
    ],
    "Products" : [
      "Technologie",
      "Food",
      "Clothes"
    ]
}
var vvv = ref(undefined)
let business = ref({
      business_profession : ref(vvv),
      business_sousprofession : ref(null)
})
    



</script>
<style>








</style>