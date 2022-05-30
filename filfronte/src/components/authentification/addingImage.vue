<template>
  <h1>Ajouter une image</h1>
  <img id="blah" src="#" alt="your image" :class="$style.img"/>
  <label :class="$style.imageLabel"> Enter Your File
    <input type="file" size="60" id="imgInp" :class="$style.imageInput" @change="displayImg($event)">
  </label> 
  <div :class="$style.finalStep">
    <button @click.prevent="$store.dispatch('addUser')">Register</button>
    <p @click="$store.commit('changeAuth',2)">Back</p>

  </div>

</template>

<script setup>
import {useStore} from "vuex"
const store = useStore()

function displayImg(event){
  const imgInp = document.getElementById("imgInp")   
  let img = event.target.files[0];
  store.commit('modifyImg',img)
  const [file] = imgInp.files
  if (file) {
    var blah = document.getElementById("blah")
    blah.src = URL.createObjectURL(file)
  }     
    }   
 

</script>

<style lang="scss" module>
@import "@/sass/variables.scss";
@import "@/sass/mexins.scss";
@import "@/sass/mediaquerise.scss";
.imageLabel{
    padding: 10px;
    padding-block: 6px;
    padding-inline: 30px;
    margin-inline:10px;
    color: white;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: 700;
    font-weight: 1.5;
    font-family: $primary-font;
    cursor: pointer;
    display: table;
     }
.imageInput {
     @include input;
}
.img{
  width: 150px;
  height: auto;
  border-radius: 50%;

}
.finalStep{

  @include flex($direction:row);
  gap:20px;
  padding-block: 30px;
button{
 @include button($border-radius:0px);
 background-color:#4c41c0;
}
p{
  cursor: pointer;
}
}
</style>
