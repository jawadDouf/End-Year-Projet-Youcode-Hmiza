<template>

 <div :class="businessCard.container" >
     <div :class="businessCard.imgContainer">
     <img :src="business.business_profileImage" alt="business.nom">
     </div>
      <div :class="businessCard.container_infos">
      <h3>{{business.business_nom}}</h3>
      <p>{{ business.business_description }}</p>
      <div :class="businessCard.categories">
       <span :class="businessCard.span1">{{business.business_profession}}</span>
       <span :class="businessCard.span2">{{business.business_sousprofession}}</span>
     </div>
    <p :class="businessCard.locationPar"><fa :icon="['fa','location-dot']" :class="businessCard.location"/><span>{{business.business_adresse}},{{business.business_location}},Morrocco</span></p>
    </div>  
     
     <div :class="businessCard.footer" >
         <button @click="goToProfile(business.business_id)">
         See More
         </button>
     </div> 
     
  </div>








</template>
<script setup>
import axios from "axios"
import { onMounted } from "vue";
import businessCard from "../../modulescss/businesses/businessCard.scss"
import { ref } from "vue";
import { useRouter, useRoute } from 'vue-router'

const route = useRouter()
const prop = defineProps({
    business : Object
})
let businesses = ref([])
onMounted(

    () => {
        axios
        .get("http://localhost/filrouge/BusinessApi/getAllBusinessess")
        .then( response => response.data.forEach(element => {
            businesses.value.push(element)
        }))     
    }
)


function goToProfile(id){
localStorage.setItem("externLink",1)
localStorage.setItem("externId",id)
route.push({ name: 'profileView', params: { id: id} })
}







</script>