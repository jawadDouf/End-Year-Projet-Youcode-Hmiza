<template>
<div :class="reviewStyle.container">
<div :class="reviewStyle.user">
 <img :src="user.img" alt="">
 <div :class="reviewStyle.userInfos">
 <h3 @click="goToProfile(user.id)">{{ user.nom }} {{ user.prenom }}</h3>
 <p>{{ review.published_at }}</p>
 </div>
</div>
<div :class="reviewStyle.product">
  <img :src="review.produit_img2"  style="width:150px;height:auto"   alt="">
 <div :class="reviewStyle.productInfos">
   <p>
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
   <p @click="supprimer(review.review_id,$event)"><span><fa :class="reviewStyle.star" :icon="['fas','trash-can']"/></span><span>Delete</span></p>
</div>
</div>

  <updateform v-if="updateForm" :review="review" @event="updateForm = !updateForm" />







</template>
<script setup>
import axios from "axios";
import { onMounted } from "vue";
import reviewStyle from "../../modulescss/reviews/review.scss"
import { useRouter, useRoute } from 'vue-router'
import updateform from "../forms/updateForm"
import { ref } from "vue";
import Swal from 'sweetalert2'
const emit = defineEmits(['event'])
const route = useRoute()
const router = useRouter()
let updateForm = ref(false)

let addCond = ref(false)
let externLink = localStorage.getItem('externLink')
const props = defineProps({
    review : Object
})
var user = ref({
    nom : ref(null),
    prenom : ref(null),
    img : ref(null),
    id : ref(null)
})
var business = ref({
    business_id : ref(null)
})
function goToProfile(id){
localStorage.setItem("externLink",2)
localStorage.setItem("externId",id)
router.push({ name: 'profileView' })
}
async function supprimer(id){
          await axios.post('http://localhost/filrouge/reviewApi/delete/' + id)
        .then(response => {
                console.log(response.data)
        }    
        )

        emit('event')
      // event.target.parentElement.parentElement.parentElement.remove();
}
onMounted(
       ()=>{
        if(localStorage.getItem("externLink")){
           axios
        .get('http://localhost/filrouge/utilisateureApi/getOneUser/' +  props.review.utilisateur_id)
        .then(response => {
                user.value.nom = response.data.nom
                user.value.prenom = response.data.prenom
                user.value.img = response.data.img
                user.value.id = response.data.id
        }    
        )
        }else{
          axios
        .get('http://localhost/filrouge/utilisateureApi/getOneUser/' + props.review.utilisateur_id)
        .then(response => {
                user.value.nom = response.data.nom
                user.value.prenom = response.data.prenom
                user.value.img = response.data.img
                user.value.id = response.data.id
        }    
        )
        }
       
   
   }
   

)










</script>