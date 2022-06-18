<template>
<div :class="profileInfos.container">
<div :class="profileInfos.icons">
    <fa :icon="['fab','facebook']" :class="profileInfos.icon"/>
    <fa :icon="['fa','envelope']" :class="profileInfos.icon"/>
    <fa :icon="['fab','instagram']" :class="profileInfos.icon"/>
</div>
<div :class="profileInfos.imgContainer">
<img src="../../assets/picCoveLogin.jpg" alt="profile Image"/>
</div>
<div :class="profileInfos.infosContainer">
<h3>{{ business.business_nom}}</h3>
<p>{{ business.business_description}}</p>
<p :class="profileInfos.locationPar"><fa :icon="['fa','location-dot']" :class="profileInfos.location"/><span>{{business.business_adresse}},{{business.business_location}},Morrocco</span></p>
<div :class="profileInfos.icons2">
    <fa :icon="['fab','facebook']" :class="profileInfos.icon"/>
    <fa :icon="['fa','envelope']" :class="profileInfos.icon"/>
    <fa :icon="['fab','instagram']" :class="profileInfos.icon"/>
</div>
</div>
       
</div>










</template>
<script setup>
import axios from "axios";
import profileInfos from "../../modulescss/profile/busProfile.scss"
import { ref } from "vue";
import { onMounted } from "vue"
let business = ref("")
let externId = localStorage.getItem("externId")
onMounted(
 ()=>{
      if(localStorage.getItem("externLink")){
        axios
        .get('http://localhost/folderr/BusinessApi/getbusiness/' + localStorage.getItem('externId'))
        .then(response => (
            business.value = response.data
        )  
        )
      }
    else{
    axios
        .get('http://localhost/folderr/BusinessApi/getbusiness/' + localStorage.getItem('id'))
        .then(response => (
            business.value = response.data
        )  
        )

    }
     
 }

)






</script>