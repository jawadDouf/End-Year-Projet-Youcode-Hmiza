<template>
<h1 :class="register.container_title" >Register</h1>
      <form :class="register.container_form" enctype="multipart/form-data">
       <!-- nom et prenom -->   
       <div :class="register.field">
      <!-- email -->
        <label :class="register.label">EMAIL:</label>
        <input v-model="business.business_email" :class="register.input"  type="email" required />
      </div>
       <!-- motDePasse -->
       <div :class="bregister.fields">
       <label :class="register.label">mot De Passe:</label>
       <input v-model="business.business_password" :class="register.input"  type="password"  required>    
       </div>
       <div :class="bregister.fields">
       <label :class="register.label">Confirm mot De Passe:</label>
       <input  v-model="business.confirm_password"  :class="register.input" type="password" required>    
       </div>  
       <!-- button -->
       <div :class="bregister.fields">
        <button @click.prevent="$store.commit('modifyFirst',business)" :class="register.button">Next</button>
        <div :class="register.login">
         <p :class="register.par">Already Registered?</p>
         <a :class="register.a" @click.prevent="$store.commit('changeAuth',-1)">Login</a>
        </div>
       </div>
    </form>
</template>
<script setup>
import bregister from "../../modulescss/authentification/pageOneBR.scss"
import register from "../../modulescss/authentification/register.scss"
import { ref } from "vue";
let business = ref({
     business_email : ref(undefined),
     business_password : ref(undefined),
     confirm_password : ref(undefined)
     
})





</script>
<style>






</style>