<template>
<div :class="profileInfos.container">
<div :class="profileInfos.icons">
    <fa :icon="['fab','facebook']" :class="profileInfos.icon"/>
    <fa :icon="['fa','envelope']" :class="profileInfos.icon"/>
    <fa :icon="['fab','instagram']" :class="profileInfos.icon"/>
</div>
<div :class="profileInfos.imgContainer">
<img :src="user.img" alt="profile Image"/>
</div>
<div :class="profileInfos.infosContainer">
<h3>{{user.nom}} {{ user.prenom }}</h3>
<p :class="profileInfos.paragraph">{{user.description}}</p>
<p  :class="profileInfos.locationPar"> <fa :icon="['fa','envelope']" :class="profileInfos.location"/> {{ user.email}}</p>
<!-- <p :class="profileInfos.locationPar"><fa :icon="['fa','location-dot']" :class="profileInfos.location"/><span>{{user.user_adresse}},{{user.user_location}},Morrocco</span></p> -->
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
let user = ref("")
onMounted(
 ()=>{
    if(localStorage.getItem("externLink")){
        axios
            .get('http://localhost/folderr/utilisateureApi/getOneUser/' + localStorage.getItem("externId"))
            .then(response => (
                user.value = response.data
            )  
            )

    }else{
         axios
            .get('http://localhost/folderr/utilisateureApi/getOneUser/' + localStorage.getItem('id'))
            .then(response => (
                user.value = response.data
            )  
            )
    }
     
 }

)





</script>