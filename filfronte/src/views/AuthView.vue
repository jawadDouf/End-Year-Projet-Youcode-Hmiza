<template>
   <div :class="$style.container">
   <div :class="$style.overlay"></div>
   <div :class="$style.bigContainer">
   <BusinessRegisterPageFour v-if="$store.state.authCond == -5"/>
   <BusinessRegisterPageThree  v-if="$store.state.authCond == -4"/>
   <BusinessRegisterPageTwo  v-if="$store.state.authCond == -3"/>
   <businessRegisterPageOne v-if="$store.state.authCond == -2"/>
   <businessLoginVue  v-if="$store.state.authCond == -1"/>
   <mainPageVue v-if="$store.state.authCond == 0" />
   <Login v-if="$store.state.authCond == 1" />
   <Register v-else-if="$store.state.authCond == 2" /> 
   <AddingImage v-else-if="$store.state.authCond == 3" />
   </div>
   </div>
</template>

<script setup>
import Login from "../components/authentification/login.vue"
import Register from "../components/authentification/register.vue"
import AddingImage from "../components/authentification/addingImage"
import mainPageVue from "@/components/authentification/mainPage.vue"
import businessLoginVue from "@/components/authentification/businessLogin.vue"
import businessRegisterPageOne from "@/components/authentification/businessRegisterPageOne.vue"
import BusinessRegisterPageTwo from "@/components/authentification/businessRegisterPageTwo.vue"
import BusinessRegisterPageThree from "@/components/authentification/businessRegisterPageThree.vue"
import BusinessRegisterPageFour from "@/components/authentification/businessRegisterPageFour.vue"
import {ref} from 'vue'
</script>

<style lang="scss"  module>
@import "@/sass/variables.scss";
@import "@/sass/mexins.scss";
@import "@/sass/mediaquerise.scss";
.bigContainer{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    width: 350px;
    height: 450px;
    box-shadow: black 0px 0px 10px;
    @include flex();
    color: white;
    background-color: hsla(0, 0%, 0%, 0);
    margin-top: 40px;
}
.container{
  height:100vh;
  width:100vw;
  background: url("@/assets/loginPic.webp") ;
  background-position: bottom;
  background-repeat: no-repeat;
  background-size: cover;
  background-attachment: fixed;
}
.overlay{
  height:100vh;
  width:100vw;
  background-color: hsla(0, 0%, 0%, 0.7);
}
.copyright{
  text-align: center;
  
}
</style>