<template>
<div :class="reviewStyle.container">
<div :class="reviewStyle.user">
 <img :src="user.img" alt="">
 <div :class="reviewStyle.userInfos">
 <h3>{{ user.nom }} {{ user.prenom }}</h3>
 <p>{{ review.published_at }}</p>
 </div>
</div>
<div :class="reviewStyle.product">
  <img :src="review.produit_img2"  style="width:150px;height:auto"   alt="">
 <div :class="reviewStyle.productInfos">
   <p>
   <span :class="reviewStyle.product_title">Store :</span><span :class="reviewStyle.product_answer"></span>
   </p>
   <p>
   <span :class="reviewStyle.product_title">Price :</span><span :class="reviewStyle.product_answer">{{review.produit_prix}}$</span> 
   </p>
   <p>
   <span :class="reviewStyle.product_title">Rating :</span><span :class="reviewStyle.product_answer">{{review.produit_note}}/10</span>
   </p>
 </div>
</div>
<hr :class="reviewStyle.line">
<div :class="reviewStyle.reviewHeader">
<div :class="reviewStyle.title">
<h3>{{ review.titre }}</h3>
<p>Review Title</p>
</div>
<p>
<span><fa :class="reviewStyle.star" :icon="['fas','star']"/></span>
<span :class="reviewStyle.note">{{review.note}}</span>
<span :class="reviewStyle.achra">/10</span>
</p>
</div>
<p :class="reviewStyle.body">{{ review.description }}</p>
<div :class="reviewStyle.footer" v-if="!externLink">
   <p @click="updateForm = !updateForm"><span><fa :class="reviewStyle.star" :icon="['fas','file-pen']"/></span><span>Update</span></p>
   <p @click="dlt(review.review_id,$event)"><span><fa :class="reviewStyle.star" :icon="['fas','trash-can']"/></span><span>Delete</span></p>
</div>
</div>
  <updateform v-if="updateForm" :review="review" @event="updateForm = !updateForm" />







</template>
<script setup>
import axios from "axios";
import { onMounted } from "vue";
import reviewStyle from "../../modulescss/reviews/review.scss"
import updateform from "../forms/updateForm.vue"
import { ref } from "vue";
let updateForm = ref(false)
let addCond = ref(false)
const props = defineProps({
    review : Object,
    id :Number
})
var user = ref({
    nom : ref(null),
    prenom : ref(null),
    img : ref(null),
})
var business = ref({
    business_id : ref(null)
})
let externLink = localStorage.getItem('externLink')
function dlt(id,event){
        
   axios
        .post('http://localhost/filrouge/reviewApi/delete/' + id)
        .then(response => {
                console.log(response.data)
        }    
        )
              event.target.parentElement.parentElement.parentElement.remove();

}
onMounted(
       ()=>{
        if(localStorage.getItem("externLink")){
         axios
        .get('http://localhost/folderr/utilisateureApi/getOneUser/' + localStorage.getItem("externId"))
        .then(response => {
                user.value.nom = response.data.nom
                user.value.prenom = response.data.prenom
                user.value.img = response.data.img
        }    
        ) 
        }else{
         axios
        .get('http://localhost/folderr/utilisateureApi/getOneUser/' + localStorage.getItem('id'))
        .then(response => {
                user.value.nom = response.data.nom
                user.value.prenom = response.data.prenom
                user.value.img = response.data.img
        }    
        ) 
        
       
   
   }}
   

),


function dlt(id){
   let formdata = new FormData()
   formdata.append('id',id)
   axios
        .post('http://localhost/filrouge/reviewApi/delete' + id)
        .then(response => {
                console.log(response.data)
        }    
        )
}







</script>