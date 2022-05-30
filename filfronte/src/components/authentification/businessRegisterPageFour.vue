<template>

    <h1>Final Step</h1>
     <form :class="bregister3.container_form">
     <div :class="bregister3.container_form_email">
       <label :class="bregister3.label">Store Profession:</label>
       <textarea v-model="description" :class="bregister3.input"></textarea>      
    </div>

     <div :class="bregister3.container_form_submit">
        <button  :class="bregister3.button" @click.prevent="$store.dispatch('addBusiness',description)">Register</button>
        <div :class="bregister3.registration">
        <p :class="bregister3.register">Wanna Back ?</p>
        <a @click="$store.commit('changeAuth',-4)" :class="bregister3.register">Back</a>
        </div>
     </div>
     </form>

     
</template>
<script setup>
import { ref } from "vue";
import bregister3 from "../../modulescss/authentification/pageThreeBR.scss"
let description = ref(null)





</script>
<style>






</style>