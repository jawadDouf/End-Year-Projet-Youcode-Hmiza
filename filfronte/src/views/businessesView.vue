<template>
<div :class="businessStyle.navcontainer">
 <div :class="businessStyle.filter">
 <div :class="businessStyle.categories">
 <button @click="shower1 = !shower1" :class="businessStyle.filterButton">Filter<span>
 <fa :icon="['fas','filter']" :class="businessStyle.filterIcon"/>
 </span></button>
 <div  :class="businessStyle.list" v-if="shower1">
 <button v-for="el in filter.typeofElement" :class="businessStyle.filterSecondaryButton1" @click="filter2(el)">{{ el }}</button>
 </div>
 </div>
  <div :class="businessStyle.categories">
  <button :class="businessStyle.filterSecondaryButton" @click="shower2=!shower2" id="filter2">Categorie<span>
 <fa :icon="['fas','caret-down']" :class="businessStyle.filterSecondaryIcon"/>
 </span></button>
  <div v-if="shower2" :class="businessStyle.list2">
    <button v-for="el in filter[tofilterwith]"  :class="businessStyle.filterSecondaryButton3"  @click="filter3(el)">{{ el }}</button>
 </div>
 
 </div>
 <div :class="businessStyle.categories">
 <button @click="shower3 = !shower3" :class="businessStyle.filterButton">Location<span>
 <fa :icon="['fa','location-dot']" :class="businessStyle.filterIcon"/>
 </span></button>
 <div  :class="businessStyle.list3" v-if="shower3">
 <button v-for="city in cities" :class="businessStyle.filterSecondaryButton2" @click="filter4(city)" id="filter">{{ city }}</button>
 </div>
 </div>
 </div>
 
<div :class="businessStyle.searchBar">
    <input type="text" v-model="searchText" placeholder="Search For Businessses" @keyup="search(searchText)"/>
 </div>
</div>
 <div :class="businessStyle.bigContainer">
 <businesseCardVue v-if="tofilterwith === undefined" v-for="business in businesses" :business="business"/>
  <businesseCardVue  v-for="business in businesses.filter(bus => bus.business_profession === tofilterwith || bus.business_sousprofession === tofilterwith || bus.business_location === location)" :business="business"/>
 </div>







</template>
<script setup>
import axios from "axios"
import { onBeforeMount, onMounted } from "vue";
import businessStyle from "../modulescss/businesses/business.scss"
import businesseCardVue from "@/components/blocks/businesseCard.vue";


import { ref } from "vue";
var shower1 = ref(false)
var shower2 = ref(false)
var shower3 = ref(false)
let businesses = ref([])
var tofilterwith = ref(undefined)
var location = ref(undefined)
var searchText = ref("")
let cities = ref([])
onBeforeMount(
     ()=>{
      axios.post('https://countriesnow.space/api/v0.1/countries/cities', {
        country: "Morocco"
      }).then(response => response.data.data.forEach(element => {
           cities.value.push(element)
      }))

  }
)
onMounted(
    () => {
        axios
        .get("http://localhost/filrouge/BusinessApi/getAllBusinessess")
        .then( response => response.data.forEach(element => {
            businesses.value.push(element)
        }))     
    }
)
var filter = {
    "typeofElement" : [
      "Service",
      "Products"
    ],
    "Service" :[
      "Medcine",
      "Coiffure"
    ],
    "Products" : [
      "Tech",
      "Food",
      "Clothes"
    ],
    "Technologie" : [
      "Phone",
      "Tablet",
      "Smart Watch",
      "Speaker"
    ],
}
function filter2(el){
  shower1.value = !shower1.value
  document.getElementById("filter2").innerHTML = el
     tofilterwith.value = el
     console.log(filter[tofilterwith])
}
function filter3(el){
  shower2.value = !shower2.value
//   document.getElementById("filter3").innerHTML = el
  tofilterwith.value = el
}
function filter4(city){
 console.log("im'in")
 shower3.value = !shower3.value
  document.getElementById("filter").innerHTML = city
  location.value = city
}

async function search(searchText){
    businesses.value = ref([])
    console.log("element")
    let searchTextFormated =  searchText.replace(/ /g,"_");
     await axios.post('http://localhost/filrouge/BusinessApi/businessesSearch/' + searchTextFormated).then(response => response.data.forEach(element => {
         
          businesses.value.push(element)
          
      }))

  
}
</script>