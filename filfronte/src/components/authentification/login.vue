<template>
  <h1>Login</h1>
  <form :class="login.container_form" enctype="">
       <div :class="login.container_form_email">
       <label :class="login.label">EMAIL:</label>
       <input v-model="email" :class="login.input" type="text" required/>
       </div>
       <div :class="login.container_form_password">
       <label :class="login.label">mot De Passe:</label>
       <input v-model="password" :class="login.input"  type="password"  required>
       </div>
        <div :class="login.container_form_checkbox"> 
        <input :class="login.checkbox" type="checkbox" />
        <label :class="login.label">Forgot mot De Passe</label>
        </div>
       <div :class="login.container_form_submit">
        <button  @click.prevent="loginn(email,password)" :class="login.button">Login</button>
        <div :class="login.registration">
        <p :class="login.register">No Account ?</p>
        <a @click="$store.commit('changeAuth',2)" :class="login.register" >Register</a>
        </div>
       </div>       
  </form>
  

  
</template>

<script setup>
import axios from "axios";
import login from "../../modulescss/authentification/login.scss"
import { useRouter, useRoute } from 'vue-router'
import { useStore } from "vuex";
import { ref } from "vue";
const route = useRoute()
const router = useRouter()
     var email = ref(null)
     var password = ref(null)
const store = useStore()
function loginn(email,password){
      var formData = new FormData();
      formData.append('email',email)
      formData.append('password',password)
     axios.post('http://localhost/folderr/utilisateureApi/login', formData)
          .then(function (response){
            if(response.data.id){
              localStorage.setItem('id',response.data.id); 
              localStorage.setItem('user',2)
             
              store.state.navSwitcher = localStorage.getItem('id');
               router.push({name: 'profileView'})
            }
          })
          .catch(function (response) {
            console.log(response);
          });
    }

</script>

<style lang="scss">



</style>