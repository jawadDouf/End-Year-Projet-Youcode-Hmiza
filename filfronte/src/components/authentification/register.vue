<template>
      <h1 :class="register.container_title" >Register</h1>
      <form :class="register.container_form" enctype="multipart/form-data">
       <!-- nom et prenom -->   
       <div :class="register.field">
       <label :class="register.label">nom:</label>
       <input v-model="user.nom" :class="register.input"  type="text"   required>    
       </div>
       <div>
       <label :class="register.label">prenom:</label>
       <input v-model="user.prenom" :class="register.input"  type="text"  required>    
       </div>
       <div :class="register.field">
      <!-- email -->
        <label :class="register.label">EMAIL:</label>
        <input v-model="user.email" :class="register.input"  type="email" required />
      </div>
       <!-- motDePasse -->
       <div :class="register.field">
       <label :class="register.label">mot De Passe:</label>
       <input v-model="user.password" :class="register.input"  type="password"  required>    
       </div>
       <div :class="register.field">
       <label :class="register.label">Confirm mot De Passe:</label>
       <input v-model="user.confirm_password" :class="register.input" type="password" required>    
       </div>  
       <!-- button -->
       <div :class="register.field">
        <button @click.prevent="$store.commit('modifyUser',user)"  :class="register.button">Next</button>
        <div :class="register.login">
         <p :class="register.par">Already Registered?</p>
         <a :class="register.a" @click.prevent="$store.commit('changeAuth',1)">Back</a>
        </div>
       </div>
    </form>

   
</template>

<script setup>
import { ref } from "vue";
import register from "../../modulescss/authentification/register.scss"
      var user = ref({
      nom : ref(null),
      prenom :ref(null),
      email : ref(null),
      password : ref(null),
      confirm_password : ref(null)
    })

</script>

<style>

</style>