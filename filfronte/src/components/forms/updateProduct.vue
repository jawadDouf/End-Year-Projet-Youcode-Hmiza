<template>
     <div @click="$emit('event')" :class="form.overlay"></div>
      <div :class="form.container">
        <form :class="form.form" @submit.prevent="updateForm">
         <div :class="form.title">
              <h3>Update Product</h3>
              <p @click="$emit('event')"> &#10060;</p> 
         </div>
         <div :class="form.field">
            <label for="Image">Produit Img</label>
            <input  type="File" name="image" :class="form.input" @change="sendImage($event)" />
         </div>
         <div :class="form.field">
            <label for="prix">Prix</label>
            <input v-model="prix" :class="form.price" type="number" name="prix" />
         </div>
        
         <div :class="form.submitField">
          <p @click="$emit('event')">Cancel</p>
          <button>Update Product</button>  
         </div>
        
        </form>

      </div>
</template>
<script setup>
import axios from "axios"
import form from "../../modulescss/forms/ultimeForm.scss"
import { ref } from "vue";

const props = defineProps({
    oneProduct :Object
})
let prix = ref()
let image = ref("")



function sendImage(event){
    image.value = event.target.files[0]  
}

function updateForm(){
    var formData = new FormData()
    console.log(image.value)
    console.log(props.oneProduct.id)
    formData.append('produit_id',props.oneProduct.id)
    formData.append('produit_prix',prix.value)
    formData.append('produit_img2',image.value)
            console.log(formData)
     axios.post('http://localhost/filrouge/Produit_BusinessApi/updateProduit', formData)
          .then(function (response) {
            console.log(formData),
            console.log(response)
          })
          .catch(function (response) {
            console.log(response);
          });
     prix.value = ref() 
     image.value = ref("") 
    
}

</script>