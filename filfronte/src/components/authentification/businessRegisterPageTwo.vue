<template>
  <h1>Basic Informations</h1>
  <form :class="bregister2.container_form" enctype="">
       <div :class="bregister2.container_form_field">
       <label :class="bregister2.label">Logo:</label>
       <input :class="bregister2.input" type="file" @change="sendImage($event)" required/>
       </div>
       <div :class="bregister2.container_form_field">
       <label :class="bregister2.label">City</label>
       <select  v-model="business.business_location" name="Cities"  :class="bregister2.input">         
         <option v-for="city in cities"  >{{ city }}</option>
       </select>
       </div>
       <div :class="bregister2.container_form_field">
       <label :class="bregister2.label">Business Name</label>
       <input v-model="business.business_nom" :class="bregister2.input"  type="text"  required>
       </div>
       <div :class="bregister2.container_form_field">
        <label :class="bregister2.label">Adresss</label>
       <input v-model="business.business_adresse" :class="bregister2.input" type="text"  required>
       </div>
       <div :class="bregister2.container_form_field">
        <button @click.prevent="$store.commit('modifyBusinessSecond',business)" :class="bregister2.button">Next</button>
        <div  :class="bregister2.registration">
        <p :class="bregister2.register">Wanna back ?</p>
        <a @click="$store.commit('changeAuth',-2)" :class="bregister2.register">Back</a>
        </div>
       </div>       
  </form>




</template>
<script setup>
import { onMounted } from "vue";
import axios from "axios";
import { ref } from "vue";
import bregister2 from "../../modulescss/authentification/pageTwoBR.scss"
import {useStore} from "vuex"
const store = useStore()

let cities = ref([])
let business = ref({
    business_nom : ref(null),
    business_location : ref(null),
    business_adresse : ref(null)
})
function sendImage(event){
   let img = event.target.files[0];
   store.commit('modifyBusinessImg',img)
}
onMounted(
  ()=>{
      axios.post('https://countriesnow.space/api/v0.1/countries/cities', {
        country: "Morocco"
      }).then(response => response.data.data.forEach(element => {
           cities.value.push(element)
      }))

  }
)


</script>
<style>





</style>